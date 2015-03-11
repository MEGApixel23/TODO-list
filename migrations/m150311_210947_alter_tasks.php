<?php

use yii\db\Schema;
use yii\db\Migration;

class m150311_210947_alter_tasks extends Migration
{
    private $table = '{{%tasks}}';
    private $column = '{{%done}}';
    private $index = 'index_done';

    public function up()
    {
        $this->addColumn(
            $this->table, $this->column, Schema::TYPE_BOOLEAN . ' NOT NULL DEFAULT 0'
        );
        $this->createIndex($this->index, $this->table, $this->column);

        return true;
    }

    public function down()
    {
        $this->dropIndex($this->index, $this->table);
        $this->dropColumn($this->table, $this->column);

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
