<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>

<div class="login-box">
  <div class="login-logo">Hi</div>
  <div class="login-box-body">
    
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
        </div>
        <div style="color:#999;margin:1em 0">
            If you forgot your password you can <?= Html::a('reset it', ['/auth/default/request-password-reset']) ?>.
        </div>
    <?php ActiveForm::end(); ?>
    
  </div><!-- /.login-box-body -->
</div><!-- /.login-box -->