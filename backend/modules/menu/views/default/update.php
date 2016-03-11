<?php

use yii\helpers\Html;


$this->title = Yii::t('backend', 'Update menu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Menu'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="box box-primary">
    <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    </div>
</div>