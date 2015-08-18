<?php

use yii\db\Schema;
use yii\db\Migration;

class m150625_135251_create_page_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
 
        $this->createTable('{{%page}}', [
            'id' => Schema::TYPE_PK,
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'page_title' => Schema::TYPE_STRING . ' NOT NULL',
            'page_content' => Schema::TYPE_TEXT,
            
            'meta_title' => Schema::TYPE_STRING . '(128) NOT NULL',
            'meta_description' => Schema::TYPE_STRING . '(256) NOT NULL',
            'alias' => Schema::TYPE_STRING . '(128) NOT NULL',
        ], $tableOptions);
        
        $this->insert('{{%page}}', [
            'page_title' => 'Главная страница',
            'page_content' => 'Главная страница',
            'meta_title' => 'Главная страница',
            'meta_description' => 'Главная страница',
            'alias' => 'main',
        ]);
        
        $this->insert('{{%page}}', [
            'page_title' => 'Тестовая страница',
            'page_content' => 'Тестовая страница',
            'meta_title' => 'Тестовая страница',
            'meta_description' => 'Тестовая страница',
            'alias' => 'test-page',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%page}}');
    }

}
