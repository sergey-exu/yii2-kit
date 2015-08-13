<?php
use yii\helpers\Html;
?>

<div class="news-date"><?= Yii::$app->formatter->asDate($model->publish_at, 'dd.MM.yyyy') ?></div>
<div><?= Html::a(Html::encode($model->summary), ['/news/view', 'alias' => $model->alias]); ?></div>


