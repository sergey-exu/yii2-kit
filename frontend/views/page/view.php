<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\page\models\Page */

$this->title = $model->page_title;

?>
<div class="page-view">
    <h1><?= Html::encode($model->page_title) ?></h1>
    <div><?= Html::decode($model->page_content) ?></div>
</div>
