<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class FancyBox extends AssetBundle
{
    public $sourcePath = '@bower/bower-asset/fancybox/source';
    
    public $css = [
        'jquery.fancybox.css'
    ];
    
    public $js = [
        'jquery.fancybox.pack.js'
    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}