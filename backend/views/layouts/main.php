<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\widgets\Menu;
use kartik\growl\Growl;
//use yii\helpers\ArrayHelper;


/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="skin-blue">
    <?php $this->beginBody() ?>

    <div class="wrapper">

        <header class="main-header">
          <nav class="navbar navbar-static-top">
            <div class="container-fluid">
              <div class="navbar-header">
                
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                  <span class="sr-only">Toggle navigation</span>
                </a>
                
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                  <i class="fa fa-bars"></i>
                </button>
              </div>
            
              
            
            
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <!--li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li-->
                <li><?= HTML::a('Перейти на сайт', Url::to('/', true), ['target' => '_blank']) ?></li>
                <!--li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li-->
              </ul>
              <!--form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
                </div>
              </form-->
              <ul class="nav navbar-nav navbar-right">
                <li><?= Html::a(Yii::t('backend', 'Logout') . ' ('.Yii::$app->user->identity->username.')', ['/auth/default/logout'], ['data-method' => 'post']) ?></li>
                <!--li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </li-->
              </ul>
            </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        </header>
        
        <div class="main-sidebar">
          <!-- Inner sidebar -->
          <div class="sidebar">
            <!-- user panel (Optional) -->
            <!--div class="user-panel">
              <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
              </div>
              <div class="pull-left info">
                <p>User Name</p>
        
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
            </div><!-- /.user-panel -->
        
            <?php echo Menu::widget([
                'options'=>['class'=>'sidebar-menu'],
                'linkTemplate' => '<a href="{url}">{icon}<span>{label}</span>{right-icon}{badge}</a>',
                'submenuTemplate'=>"\n<ul class=\"treeview-menu\">\n{items}\n</ul>\n",
                'activateParents'=>true,
                'encodeLabels' => false,
                'items' => [
                  [
                    'label'=>Yii::t('backend', 'Navigation'),
                    'options' => ['class' => 'header']
                  ],
                  [
                    'label'=>Yii::t('backend', 'Statistics'),
                    'icon'=>'<i class="fa fa-pie-chart"></i>',
                    'url'=>['/dashboard/default/index'],
                  ],
                  [
                    'label' => 'Разделы',
                    'options' => ['class' => 'header']
                  ],
                  [
                    'label'=>Yii::t('backend', 'Pages'),
                    'icon'=>'<i class="fa fa-files-o"></i>',
                    'url'=>['/page/default/index'],
                  ],
                  [
                    'label'=>Yii::t('backend', 'News'),
                    'icon'=>'<i class="fa fa-list"></i>',
                    'url'=>['/news/default/index'],
                  ],
                  [
                    'label'=>Yii::t('backend', 'Banners'),
                    'icon'=>'<i class="fa fa-cube"></i>',
                    'url'=>['/banner/default/index'],
                  ],
                  [
                    'label'=>Yii::t('backend', 'Menu'),
                    'icon'=>'<i class="fa fa-bars"></i>',
                    'url'=>['/menu/default/index'],
                  ],
                  [
                    'label'=>Yii::t('backend', 'File Manager'),
                    'icon'=>'<i class="fa fa-floppy-o"></i>',
                    'url'=>['/file-manager/index']
                  ],
                  [
                    'label'=>Yii::t('backend', 'System'),
                    'url' => '#',
                    'icon'=>'<i class="fa fa-cogs"></i>',
                    'options'=>['class'=>'treeview'],
                    'items'=>[
                      [
                        'label'=>Yii::t('backend', 'Users'),
                        'icon'=>'<i class="fa fa-angle-double-right"></i>',
                        'url'=>['/user/default/index'],
                      ],
                      [
                        'label'=>Yii::t('backend', 'Settings'),
                        'icon'=>'<i class="fa fa-angle-double-right"></i>',
                        'url'=>['/settings/default/index'],
                      ],
                      [
                        'label'=>Yii::t('backend', 'Logs'),
                        'url'=>['/log/default/index'],
                        'icon'=>'<i class="fa fa-angle-double-right"></i>',
                        'badge'=>\backend\modules\log\models\SystemLog::find()->count(),
                        'badgeBgClass'=>'label-danger',
                      ],
                    ],
                  ],
                  //['label' => 'Login', 'url' => ['site/login'], 'visible' => !Yii::$app->user->isGuest],
                ],
            ]);
            
            ?>
        
          </div><!-- /.sidebar -->
        </div><!-- /.main-sidebar -->

        <aside class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?php echo $this->title ?>
                    <?php if (isset($this->params['subtitle'])): ?>
                        <small><?php echo $this->params['subtitle'] ?></small>
                    <?php endif; ?>
                </h1>

                <?php echo Breadcrumbs::widget([
                    'tag'=>'ol',
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php /*if (Yii::$app->session->hasFlash('alert')):?>
                    <?php echo \yii\bootstrap\Alert::widget([
                        'body'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
                        'options'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
                    ])?>
                <?php endif; */?>
                
                <?= $content ?>
                
            </section><!-- /.content -->
        </aside><!-- /.right-side -->


    </div>
    
    
    
    
    <?php 
      //yii2 widget growl from krajee
      foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
            <?php
            echo Growl::widget([
                'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
                'title' => (!empty($message['title'])) ? Html::encode($message['title']) : 'Title Not Set!',
                'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
                'body' => (!empty($message['message'])) ? Html::encode($message['message']) : 'Message Not Set!',
                'showSeparator' => true,
                'delay' => 1, //This delay is how long before the message shows
                'pluginOptions' => [
                    'showProgressbar' => true,
                    'delay' => (!empty($message['duration'])) ? $message['duration'] : 3000, //This delay is how long the message shows for
                    'placement' => [
                        'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'top',
                        'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'right',
                    ]
                ]
            ]);
            ?>
        <?php endforeach; ?>


    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
