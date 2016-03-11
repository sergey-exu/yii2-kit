<?php

use yii\helpers\Html;

$this->title = $model->meta_title;
$this->registerMetaTag(['name' => 'description', 'content' => $model->meta_description]);
?>

<div class="page-main">
    <?= Html::decode($model->content) ?>
</div>
