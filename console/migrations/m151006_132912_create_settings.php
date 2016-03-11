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
            'id' => $this->primaryKey(),
            'type' => $this->string()->defaultValue('string'),
            'section' => $this->string(),
            'key' => $this->string(),
            'value' => $this->text(),
            'created' => $this->integer(),
            'modified' => $this->integer(),
        ], $tableOptions);
        
        $this->insert('{{%settings}}', [
            'type' => 'string',
            'section' => 'analitycs',
            'key' => 'gaTrackingId',
            'value' => 'UA-66634666-1',
        ]);
        
        $this->insert('{{%settings}}', [
            'type' => 'string',
            'section' => 'metrika',
            'key' => 'counter',
            'value' => '21869497',
        ]);
        
        $this->insert('{{%settings}}', [
            'type' => 'string',
            'section' => 'metrika',
            'key' => 'token',
            'value' => '36a00bef64db456aa4eb41cad2203c31',
        ]);
    }

    public function down()
    {
        //echo "m151006_132912_create_settings cannot be reverted.\n";
        //return false;
        $this->dropTable('{{%settings}}');
    }

}


    