<?php
use yii\helpers\Html;

$this->title = Yii::t('backend', 'Create Settings');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="setting-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>