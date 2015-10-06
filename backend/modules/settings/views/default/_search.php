<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="settings-search">

    <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]);
    ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'section') ?>

    <?= $form->field($model, 'key') ?>

    <?= $form->field($model, 'value') ?>

    <div class="form-group">
        <?= Html::submitButton(Module::t('settings', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Module::t('settings', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
