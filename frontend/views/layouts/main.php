<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

use yii\widgets\Menu;

use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use frontend\widgets\GoogleAnalytics;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

use frontend\assets\FancyBox;
FancyBox::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="/favicon.ico">
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'My Company',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            
            if ($menuItems = \backend\modules\menu\models\Menu::find()->where(['name' => 'main'])->one()) {
                $menuItems = json_decode($menuItems['data'], true);
                
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => $menuItems,
                ]);    
            } else Yii::error('Не найдены настройки основного меню (mane "main")');
                
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        
        
        
        
        
        <br/><Br/><br/>
        
        
        
    <?php 
    
    /*
    echo Nav::widget([
        'items' => [
            [
                'label' => 'Home',
                'url' => ['site/index'],
                'linkOptions' => [],
            ],
            [
                'label' => 'Dropdown',
                'items' => [
                     ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
                     '<li class="divider"></li>',
                     '<li class="dropdown-header">Dropdown Header</li>',
                     ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
                ],
            ],
            [
                'label' => 'Login',
                'url' => ['site/login'],
                //'visible' => Yii::$app->user->isGuest
            ],
        ],
        //'options' => ['class' =>'nav-pills'], // set this to nav-tab to get tab-styled navigation
    ]);
    
    */
    
    
    /*
    echo Menu::widget([
        'items' => [
            ['label' => 'Home', 'url' => ['site/index']],
            // 'Products' menu item will be selected as long as the route is 'product/index'
            ['label' => 'Products', 'url' => ['product/index'], 'items' => [
                ['label' => 'New Arrivals', 'url' => ['product/index', 'tag' => 'new']],
                ['label' => 'Most Popular'],
            ]],
            //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
        ],
    ]);
    */
    
    
    /*
    
    $menu_data = \backend\modules\menu\models\Menu::find()->where(['name' => 'main'])->one();
    
    $menuObj = json_decode($menu_data['data']);
    
    foreach ($menuObj as $value) {
        echo '<li>' . $value->id .' - '. $value->name;
            if(isset($value->children)) {
                echo '<ol>';
                    foreach ($value->children as $child) {
                        echo '<li>' . $child->id .' - '. $child->name . '</li>';
                    }
                echo '</ol>';
            }
        echo '</li>';
    }
    */
    
    /*
    
    foreach ($menuObj as $value) {
        echo '<li>';
            
            echo isset($value->href) ? "1" : "2";
            
            
        echo '</li>';
    }
    
    */
    
    
    
    
    
    
    
    
    
    ?>
        
        
         <?php /* foreach(\backend\modules\banner\models\Banner::find()->orderBy('id ASC')->all() as $data): ?>
	        <div class="swiper-slide">
	            <?php if ($data->link) :?>
                    <a href="<?= $data->link ?>" target="_blank"><img src="/images/<?= $data->img ?>" class="bn_border" alt="<?= $data->name ?>" /></a>
                <?php else :?>    
                    <img src="/images/<?= $data->img ?>" class="bn_border"  alt="<?= $data->name ?>" />
                <?php endif; ?>
            </div>
        <?php endforeach; */?>
        
        
        
        
        
        
        
        
        
        </div>
    </div>
    
    
    

    

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
    
    <?= GoogleAnalytics::widget(['trackingId' => Yii::$app->settings->get('analitycs.gaTrackingId')]); ?>
</body>
</html>
<?php $this->endPage() ?>
