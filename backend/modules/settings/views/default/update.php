<?php
use yii\helpers\Html;


$this->title = Yii::t('backend', 'Update Settings');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>

<div class="settings-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
