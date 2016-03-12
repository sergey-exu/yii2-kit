<?php

use yii\db\Schema;
use yii\db\Migration;

class m150819_131010_create_banner_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('banner', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'link' => $this->string(512)->notNull(),
            'status' => $this->string(512)->notNull(),
            'img' => $this->string(32)->notNull(),
            'description' => $this->text(),
            'type' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('banner');
    }

}
