<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\banner\models\BannerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banner-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'link') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'type') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
