<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\menu\models\Menu */

$this->title = Yii::t('backend', 'Update') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Menu'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="box box-primary">
    <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    </div>
</div>