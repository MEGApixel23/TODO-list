<?php

use yii\db\Schema;
use yii\db\Migration;

class m150311_204920_create_tasks extends Migration
{
    private $table = '{{%tasks}}';

    public function up()
    {
        $this->createTable($this->table, [
            'id' => Schema::TYPE_PK,
            'project_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'text' => Schema::TYPE_TEXT . ' NOT NULL',
            'timestamp_create' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'timestamp_update' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'deleted' => Schema::TYPE_BOOLEAN . ' NOT NULL DEFAULT 0',
            'priority' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0'
        ]);

        $this->createIndex('index_deleted', $this->table, '{{%deleted}}');
        $this->createIndex('index_priority', $this->table, '{{%priority}}');
        $this->addForeignKey(
            'fk_project_id', $this->table, '{{%project_id}}', '{{%projects}}', 'id',
            'CASCADE', 'CASCADE'
        );

        return true;
    }

    public function down()
    {
        $this->dropTable($this->table);

        return true;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
