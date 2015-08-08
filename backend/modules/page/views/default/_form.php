<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;

?>

<div class="box box-primary">
    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-md-8">
                    <?= $form->field($model, 'page_title')->textInput(['maxlength' => true]) ?>
                    <?php 
                        echo $form->field($model, 'page_content')->widget(Widget::className(), [
                            'settings' => [
                                'lang' => 'ru',
                                'minHeight' => 400
                            ]
                        ]);
                    ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'meta_description')->textarea(['rows' => 4]) ?>
                    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
                
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
