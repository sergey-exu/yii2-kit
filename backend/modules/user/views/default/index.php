<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\user\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
        <p>
            <?= Html::a(Yii::t('backend', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],
                [
                    //'attribute' => '#',
                    'contentOptions' => ['style' => 'width:50px;'],
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::img('/backend/images/user-avatar.gif', ['alt'=>'avatar', 'style' => 'border-radius: 100px;']);
                    }
                ],
                //'id',
                'username',
                //'auth_key',
                //'password_hash',
                //'password_reset_token',
                'email:email',
                'status',
                'created_at:date',
                //'updated_at:date',
    
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
