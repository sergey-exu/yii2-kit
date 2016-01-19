<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = Yii::t('backend', 'Menu');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
    <div class="box-body">

    <p>
        <?= Html::a(Yii::t('backend', 'Create Menu'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'data',
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}',
                'contentOptions' => ['class' => 'actionColumn'],
                'buttonOptions' => [
                    'class' => 'btn btn-sm btn-default',
                    'style' => 'padding:1px 10px;',
                ],
            ],
        ],
    ]); ?>

    </div>
</div>
