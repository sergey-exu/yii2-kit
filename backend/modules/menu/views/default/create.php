<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\menu\models\Menu */

$this->title = Yii::t('backend', 'Create Menu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Menu'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    </div>
</div>
