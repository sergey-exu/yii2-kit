<?php
namespace backend\modules\dashboard\assets;

use yii\web\AssetBundle;

class MetrikaAsset extends AssetBundle
{
    public $sourcePath = '@backend/modules/dashboard';
    public $jsOptions = ['position' => \yii\web\View::POS_END];
    public $js = [
        'js/metrika.js'
    ];
    public $depends = [
        'backend\assets\AppAsset', //указываем в зависимостях "общий" ассет-бандл
    ];
}