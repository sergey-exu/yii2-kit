<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('backend', 'Request password reset');

?>

<div class="login-box site-request-password-reset">
    <div class="login-logo"><?= Yii::t('backend', 'Password reset') ?></div>
    <p class="login-box-msg"><?= Yii::t('backend', 'Please fill out your email.') ?><br/><?= Yii::t('backend', 'A link to reset password will be sent there.') ?></p>
    <div class="login-box-body">
        
        <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
            <?= $form->field($model, 'email') ?>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('backend', 'Request password reset'), ['class' => 'btn btn-primary btn-block btn-flat']) ?>
            </div>
            <div style="color:#999;margin:1em 0">
                <i class="fa fa-long-arrow-left fa-fw"></i> <?= Yii::t('backend', 'back to') . Html::a(Yii::t('backend', 'login page'), ['/auth/default/login']) ?>.
            </div>
        <?php ActiveForm::end(); ?>
        
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->


