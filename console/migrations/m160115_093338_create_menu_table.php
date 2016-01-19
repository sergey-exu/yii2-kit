<?php

use yii\db\Schema;
use yii\db\Migration;

class m160115_093338_create_menu_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('menu', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'data' => $this->text(),
        ], $tableOptions);
        
        $this->insert('menu', [
            'name' => 'main',
            'data' => '[{"id":1},{"id":2,"children":[{"id":3},{"id":4},{"id":9},{"id":10}]},{"id":5,"children":[{"id":6},{"id":7},{"id":8}]}]',
        ]);
        
    }

    public function down()
    {
        $this->dropTable('menu');
    }

}
