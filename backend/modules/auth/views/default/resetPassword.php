<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
?>

<div class="login-box site-reset-password">
    <div class="login-logo">Reset password</div>
    <p class="login-box-msg">Please choose your new password:</p>

    <div class="login-box-body">
        <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->