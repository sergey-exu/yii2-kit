<?php

use yii\helpers\Html;

$this->title = $model->title;
$this->registerMetaTag(['name' => 'description', 'content' => $model->meta_description]);
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="news-view">
    <h1><?= Html::encode($model->title) ?></h1>
    <div><p><?= Html::encode($model->summary) ?></p></div>
    <div><?= Html::decode($model->text) ?></div>
</div>