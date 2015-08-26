<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model backend\models\Page */

$this->title = Yii::t('backend', 'Update Page');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="page-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
