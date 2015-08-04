<?php

use yii\helpers\Html;

$this->title = 'Update Banner';
$this->params['breadcrumbs'][] = ['label' => 'Banners', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="banner-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
