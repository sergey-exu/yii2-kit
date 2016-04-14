<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\banner\models\Banner;

/* @var $this yii\web\View */
/* @var $model backend\modules\banner\models\Banner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'type')->dropDownlist(Banner::getTypeArray()) ?>
                <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'img')->fileInput() ?>
                <?php if(!$model->isNewRecord) : ?>
                    <img src="<?= '/storage/banner/' . $model->img ?>" />
                <?php endif; ?>
                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            </div>
        </div>
    
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    
        <?php ActiveForm::end(); ?>

    </div>
</div>
