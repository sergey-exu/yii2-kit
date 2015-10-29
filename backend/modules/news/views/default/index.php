<?php

use yii\helpers\Html;
use yii\grid\GridView;
//use Yii;
use yii\helpers\Url;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'News');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
        <p>
            <?= Html::a(Yii::t('backend', 'Create News'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',
                'title',
                //'summary:ntext',
                //'text:ntext',
                //'updated_at:date',
                // 'meta_title',
                // 'meta_description',
                [
                    'attribute' => 'alias',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::a($model->alias, Url::to('/news/' .$model->alias . '/', true), ['target'=>'_blank']);
                    }
                ], 
                [
                    'attribute' => 'created_at',
                    'format'=> ['date', 'php:d.m.Y'],
                    'filter' => DatePicker::widget([
                                'model' => $searchModel, 
                                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                'attribute' => 'created_at',
                                'pickerButton' => false,
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'todayHighlight' => true,
                                ]
                    ]),
                    'contentOptions' => ['style' => 'white-space: nowrap; width: 170px;'],
                ],
                [
                    'attribute' => 'publish_at',
                    'format'=> ['date', 'php:d.m.Y'],
                    'filter' => DatePicker::widget([
                                'model' => $searchModel, 
                                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                'attribute' => 'publish_at',
                                'pickerButton' => false,
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'todayHighlight' => true,
                                ]
                    ]),
                    'contentOptions' => ['style' => 'white-space: nowrap; width: 170px;'],
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
