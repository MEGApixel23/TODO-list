<?php

use yii\db\Schema;
use yii\db\Migration;

class m150311_202613_create_projects extends Migration
{
    private $table = '{{%projects}}';

    public function up()
    {
        $this->createTable($this->table, [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'timestamp_create' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'timestamp_update' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'deleted' => Schema::TYPE_BOOLEAN . ' NOT NULL DEFAULT 0',
            'priority' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0'
        ]);

        $this->createIndex('index_deleted', $this->table, '{{%deleted}}');
        $this->createIndex('index_priority', $this->table, '{{%priority}}');

        return true;
    }

    public function down()
    {
        $this->dropTable($this->table);

        return true;
    }
}
