<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Page */

$this->title = 'Update Page';
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="page-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
