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
 
        $this->createTable('page', [
            'id' => Schema::TYPE_PK,
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'content' => Schema::TYPE_TEXT,
            
            'meta_title' => Schema::TYPE_STRING . '(128) NOT NULL',
            'meta_description' => Schema::TYPE_STRING . '(256) NOT NULL',
            'alias' => Schema::TYPE_STRING . '(128) NOT NULL',
        ], $tableOptions);
        
        $this->insert('page', [
            'title' => 'Главная страница',
            'content' => 'Главная страница',
            'meta_title' => 'Главная страница',
            'meta_description' => 'Главная страница',
            'alias' => 'main',
        ]);
        
        $this->insert('page', [
            'title' => 'Тестовая страница',
            'content' => 'Текст тестовой страницы',
            'meta_title' => 'meta заголовок тестовой страницы',
            'meta_description' => 'meta описание тестовой страницы',
            'alias' => 'test-page',
        ]);
        
        $this->insert('page', [
            'title' => 'Тестовая страница 2',
            'content' => 'Текст тестовой страницы 2',
            'meta_title' => 'meta 2 тестовая страница',
            'meta_description' => 'meta описание тестовой страницы 2',
            'alias' => 'test-page-2',
        ]);
    }

    public function down()
    {
        $this->dropTable('page');
    }

}
