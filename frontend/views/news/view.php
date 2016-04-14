<?php

use yii\helpers\Html;

$this->title = $model->meta_title;
$this->registerMetaTag(['name' => 'description', 'content' => $model->meta_description]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->title;
?>

<div class="news-title-meta">
    <div class="news-meta">
        <span class="news-meta-date"><?= Yii::$app->formatter->asDate($model->publish_at, 'dd.MM.yyyy') ?></span>
    </div>
</div>
<div class="news-view">
    <h1><?= Html::encode($model->title) ?></h1>
    <div>
        <p><?= Html::encode($model->summary) ?></p>
        <?= Html::decode($model->text) ?>
    </div>
</div>