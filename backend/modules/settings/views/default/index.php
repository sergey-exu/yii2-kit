<?php
use yii\helpers\Html;
use yii\grid\GridView;
use backend\modules\settings\models\Settings;
use yii\helpers\ArrayHelper;
//use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var pheme\settings\models\SettingSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('backend', 'Settings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">

    <p>
        <?= Html::a(Yii::t('backend', 'Create Settings'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php //Pjax::begin(); ?>
    <?= GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                //'id',
                //'type',
                [
                    'attribute' => 'section',
                    'filter' => ArrayHelper::map(
                        Settings::find()->select('section')->distinct()->where(['<>', 'section', ''])->all(),
                        'section',
                        'section'
                    ),
                ],
                'key',
                'value:ntext',
                [
                    'class' => 'yii\grid\ActionColumn',
                    //'template'=>'{update} {delete}',
                    'template'=>'{update}',
                    'contentOptions' => ['class' => 'actionColumn-one-btn'],
                    'buttonOptions' => [
                        'class' => 'btn btn-sm btn-default',
                        'style' => 'padding:1px 10px;',
                    ],
                ],
            ],
        ]); 
    ?>
    <?php //Pjax::end(); ?>

    </div>
</div>
