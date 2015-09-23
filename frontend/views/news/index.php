<?php

use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = Yii::t('backend', 'News');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'layout' => '{items}{pager}',
        'itemView' => '_view',
        'pager' => [
            'options' => ['class' => 'pagination pagination-sm']
            ],
    ]) ?>
</div>