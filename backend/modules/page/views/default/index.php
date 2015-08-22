<?php

use yii\helpers\Html;
use yii\grid\GridView;
use Yii;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
        <p>
            <?= Html::a(Yii::t('backend', 'Create Page'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
    
                //'id',
                'created_at:date',
                //'updated_at:datetime',
                'page_title',
                //'page_content:ntext',
                // 'meta_title',
                // 'meta_description',
                 'alias',
    
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template'=>'{update} {delete}',
                    'contentOptions' => ['class' => 'actionColumn'],
                    'buttonOptions' => [
                        'class' => 'btn btn-xs btn-default'
                    ],
                    /*
                    'buttons' => [
                        'delete' => function ($url, $model, $key) {
                            $options = array_merge([
                                'title' => Yii::t('yii', 'Delete'),
                                'aria-label' => Yii::t('yii', 'Delete'),
                                'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                'data-method' => 'post',
                                'data-pjax' => '0',
                                'class' => 'btn-danger',
                            ], $this->buttonOptions);
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                        },
                    ],
                    */
                ],
            ],
        ]); ?>
        
    </div>
</div>
