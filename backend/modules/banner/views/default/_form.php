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
            <div class="col-md-8">
    
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            
                <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
                
                <?php echo $form->field($model, 'type')->dropDownlist([
                    Banner::BANNER_PARTNER => 'Партнер',
                    Banner::BANNER_SUPPORT => 'Поддержка'
                    ]);
            	?>
            
                <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
            
                <?= $form->field($model, 'img')->fileInput() ?>
                
                <?php if(!$model->isNewRecord) : ?>
                    <img src="http://myhome23.ru/img/partner/<?= $model->img ?>" />
                <?php endif; ?>
            
                <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
            
            </div>
        </div>
        
    
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    
        <?php ActiveForm::end(); ?>

    </div>
</div>
