<?php
use yii\helpers\Html;
?>
<div>
    <div class="news-date"><?= Yii::$app->formatter->asDate($model->publish_at, 'dd.MM.yyyy') ?></div>
    <div><?= Html::a(Html::encode($model->title), ['/news/view', 'alias' => $model->alias]); ?></div>
    <div><?= $model->summary ?></div>
</div>


