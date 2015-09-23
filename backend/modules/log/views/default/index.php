<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\log\models\SystemLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'System Logs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">

    <p>
        <?= Html::a(Yii::t('backend', 'Clear'), false, ['class' => 'btn btn-danger', 'data-method'=>'delete']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'level',
                'filter'=>[
                    \yii\log\Logger::LEVEL_ERROR => 'error',
                    \yii\log\Logger::LEVEL_WARNING => 'warning',
                    \yii\log\Logger::LEVEL_INFO => 'info',
                    \yii\log\Logger::LEVEL_TRACE => 'trace',
                    \yii\log\Logger::LEVEL_PROFILE_BEGIN => 'profile begin',
                    \yii\log\Logger::LEVEL_PROFILE_END => 'profile end'
                ],
                'value'=>function ($model) {
                    return \yii\log\Logger::getLevelName($model->level);
                }
            ],
            'category',
            'prefix:ntext',
            'log_time:datetime',
            // 'message:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {delete}',
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
