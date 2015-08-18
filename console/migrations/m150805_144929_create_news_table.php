<?php

use yii\db\Schema;
use yii\db\Migration;

class m150805_144929_create_news_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
 
        $this->createTable('{{%news}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . '(256) NOT NULL',
            'summary' => Schema::TYPE_TEXT,
            'text' => Schema::TYPE_TEXT,
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'publish_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'meta_title' => Schema::TYPE_STRING . '(128) NOT NULL',
            'meta_description' => Schema::TYPE_STRING . '(256) NOT NULL',
            'alias' => Schema::TYPE_STRING . '(128) NOT NULL',
        ], $tableOptions);
        
        $this->insert('{{%news}}', [
            'title' => 'Тестовая новость',
            'summary' => 'Тестовая новость',
            'text' => 'Тестовая новость',
            'meta_title' => 'Тестовая новость',
            'meta_description' => 'Тестовая новость',
            'alias' => 'test-news',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%news}}');
    }
    
}
