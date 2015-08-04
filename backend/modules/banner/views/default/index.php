<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\banner\models\BannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
    
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
        <p>
            <?= Html::a('Create Banner', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
    
                //'id',
                'name',
                'link',
                //'img',
                'status',
                'content:ntext',
                //'type',
    
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template'=>'{update} {delete}'
                ],
            ],
        ]); ?>

    </div>
</div>
