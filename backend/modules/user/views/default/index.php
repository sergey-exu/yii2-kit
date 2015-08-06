<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
        <p>
            <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
    
                //'id',
                'created_at:date',
                'username',
                'email',
                
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template'=>'{update} {delete}'
                ],
            ],
        ]); ?>
        
    </div>
</div>
