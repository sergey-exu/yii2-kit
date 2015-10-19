<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget as Imperavi;
use kartik\date\DatePicker;
use yii\helpers\Url;

?>

<div class="box box-primary">
    <div class="box-body">
    
        <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-md-8">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'summary')->textarea(['rows' => 6]) ?>
                    <?php 
                        echo $form->field($model, 'text')->widget(Imperavi::className(), [
                            'settings' => [
                                'lang' => 'ru',
                                'replaceDivs' => false,
                                'minHeight' => 400,
                                'imageUpload' => Url::to(['/news/default/image-upload']),
                                'fileUpload' => Url::to(['/news/default/file-upload']),
                                'plugins' => [
                                    'table'
                                ]
                            ]
                        ]);
                    ?>
                    
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'meta_title')->textInput() ?>
                    <?= $form->field($model, 'meta_description')->textarea(['rows' => 4]) ?>
                    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
                    <div class="form-group">
                        <?php
                            echo '<label class="control-label">'. Yii::t('backend', 'Publish date') .'</label>';
                            echo DatePicker::widget([
                                'model' => $model, 
                                'attribute' => 'publish_at',
                                'options' => ['placeholder' => Yii::$app->formatter->asDate('now', 'dd.MM.yyyy')],
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'todayHighlight' => true,
                                ]
                            ]);
                        ?>
                    </div>
                </div>
            </div>
    
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    
        <?php ActiveForm::end(); ?>
    </div>
</div>


