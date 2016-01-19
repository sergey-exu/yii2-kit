<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\menu\models\Menu */

$this->title = Yii::t('backend', 'Create Menu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
