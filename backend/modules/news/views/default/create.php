<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\News */

$this->title = Yii::t('backend', 'Create News');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
