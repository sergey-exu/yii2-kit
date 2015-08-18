<?php

use yii\helpers\Html;

$this->title = $model->page_title;
$this->registerMetaTag(['name' => 'description', 'content' => $model->meta_description]);
?>

<div class="page-main">
    <?= Html::decode($model->page_content) ?>
</div>
