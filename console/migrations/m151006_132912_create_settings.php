<?php

use yii\db\Schema;
use yii\db\Migration;

class m151006_132912_create_settings extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%settings}}', [
            'id' => Schema::TYPE_PK,
            'type' => Schema::TYPE_STRING,
            'section' => Schema::TYPE_STRING,
            'key' => Schema::TYPE_STRING,
            'value' => Schema::TYPE_TEXT,
            'created' => Schema::TYPE_DATETIME,
            'modified' => Schema::TYPE_DATETIME,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m151006_132912_create_settings cannot be reverted.\n";
        return false;
    }

}


    