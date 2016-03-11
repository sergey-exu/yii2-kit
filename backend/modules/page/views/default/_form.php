<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget as Imperavi;
use yii\helpers\Url;
?>

<div class="box box-primary">
    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-md-8">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                    <?php 
                        echo $form->field($model, 'content')->widget(Imperavi::className(), [
                            'settings' => [
                                'lang' => 'ru',
                                'replaceDivs' => false,
                                'minHeight' => 400,
                                'imageUpload' => Url::to(['/page/default/image-upload']),
                                'fileUpload' => Url::to(['/page/default/file-upload']),
                                'plugins' => [
                                    'table'
                                ]
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
                <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
