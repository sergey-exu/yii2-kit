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
    
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
        <p>
            <?= Html::a(Yii::t('backend', 'Create Banner'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
    
                'name',
                [
                    'attribute' => 'img',
                    'format' => 'raw',
                    'value' => function ($model, $key, $index, $column) {
                        return Html::img(Yii::$app->params['domainName'] . '/images/' . $model->img, ['width' => '130px']);
                    }
                ],
                //'link',
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
                        'class' => 'btn btn-xs btn-default'
                    ],
                ],
            ],
        ]); ?>

    </div>
</div>
