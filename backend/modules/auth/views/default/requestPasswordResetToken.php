<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';

?>

<div class="login-box site-request-password-reset">
    <div class="login-logo">Password reset</div>
    <p class="login-box-msg">Please fill out your email.<br/>A link to reset password will be sent there.</p>
    <div class="login-box-body">
        
        <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
            <?= $form->field($model, 'email') ?>
            <div class="form-group">
                <?= Html::submitButton('Request password reset', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
            </div>
            <div style="color:#999;margin:1em 0">
                <i class="fa fa-long-arrow-left fa-fw"></i> back to <?= Html::a('login page', ['/user/default/login']) ?>.
            </div>
        <?php ActiveForm::end(); ?>
        
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->


