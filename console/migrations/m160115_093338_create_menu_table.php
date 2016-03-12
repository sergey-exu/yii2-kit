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
            'data' => '[
    {
        "label" : "Main",
        "url" : "/"
    },
    {
        "label" : "Page",
        "items" : [
            {
                "label" : "test page",
                "url" : {
                    "0":"page/view",
                    "alias":"test-page"
                }
            },
            {
                "label" : "test page 2 (blank)",
                "url" : {
                    "0":"page/view",
                    "alias":"test-page-2"
                },
                "linkOptions": {"target":"_blank"}
            }
        ]
    },
    {
        "label":"News",
        "url":{
            "0":"/news/index"
        }
    }
]',
        ]);
        
    }

    public function down()
    {
        $this->dropTable('menu');
    }

}
