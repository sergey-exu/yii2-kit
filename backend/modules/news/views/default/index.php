<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
        <p>
            <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
    
                //'id',
                'created_at:date',
                'title',
                'summary:ntext',
                //'text:ntext',
                // 'updated_at',
                // 'publish_at',
                // 'meta_title',
                // 'meta_description',
                'alias',
    
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template'=>'{update} {delete}'
                ],
            ],
        ]); ?>
        
    </div>
</div>
