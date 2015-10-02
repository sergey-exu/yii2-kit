<?php
namespace backend\assets;
use yii\web\AssetBundle;

class ChartJsAsset extends AssetBundle
{
    public $sourcePath = '@bower/chartjs';

    public function init()
    {
        $this->js = YII_DEBUG ? ['Chart.js'] : ['Chart.min.js'];
    }
}