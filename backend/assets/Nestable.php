<?php

namespace backend\assets;

use yii\web\AssetBundle;

class Nestable extends AssetBundle
{
    public $sourcePath = '@bower/bower-asset/nestable2';
    
    public $css = [
        'jquery.nestable.css'
    ];
    
    public $js = [
        'jquery.nestable.js'
    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}