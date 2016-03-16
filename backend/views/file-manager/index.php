<?php
use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
use yii\web\JsExpression;
//mihaildev\elfinder\Assets::noConflict($this);

$this->title = Yii::t('backend', 'File Manager')
?>

<div class="row">
    <div class="col-xs-12">
        <?php 
        
            echo ElFinder::widget([
                'language'         => 'ru',
                'controller'       => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
                'filter'           => ['image', 'application'],    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
                //'callbackFunction' => new JsExpression('function(file, id){}') // id - id виджета
                'frameOptions' => ['style'=>'min-height: 500px; width: 100%; border: 0'],
            ]);

            
        ?>
    </div>
</div>


