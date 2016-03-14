<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\modules\banner\models\Banner;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\banner\models\BannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend' ,'Banners');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
    
        <p>
            <?= Html::a(Yii::t('backend', 'Create Banner'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'img',
                    'format' => 'raw',
                    'value' => function ($model, $key, $index, $column) {
                        return Html::img('/storage/banner/' . $model->img, ['width' => '130px']);
                    },
                    'contentOptions' => ['style' => 'width:160px;'],
                ],
                'name',
                'link',
                'status',
                //'description:ntext',
                [
                    'attribute' => 'type',
                    'filter' => Banner::getTypeArray(),
                    /*
                    'value' => function ($model, $key, $index, $column) {
                        return $model->getTypeName();
                    }
                    */
                    'value' => 'TypeName', //тоже самое что и код выше
                ],
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