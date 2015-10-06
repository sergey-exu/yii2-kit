<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="box box-primary">
    <div class="box-body">

        <?php $form = ActiveForm::begin(); ?>
        
        <div class="row">
            <div class="col-lg-4 col-md-6">
    
                <?= $form->field($model, 'section')->textInput(['maxlength' => 255]) ?>
            
                <?= $form->field($model, 'key')->textInput(['maxlength' => 255]) ?>
            
                <?= $form->field($model, 'value')->textarea(['rows' => 6]) ?>
            
                <?=
                $form->field($model, 'type')->dropDownList(
                    [
                        'string' => 'string',
                        'integer' => 'integer',
                        'boolean' => 'boolean',
                        'float' => 'float',
                        'array' => 'array',
                        'object' => 'object',
                        'null' => 'null'
                    ]
                )->hint(Yii::t('backend', 'Change at your own risk')) ?>
                
            </div>
        </div>
            
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
                
        <?php ActiveForm::end(); ?>

    </div>
</div>
