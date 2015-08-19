<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;


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
              <a href="/backend" class="navbar-brand">Admin panel</a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>
            
              
            
            
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
              <!--ul class="nav navbar-nav">
                <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
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
                </li>
              </ul>
              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
                </div>
              </form-->
              <ul class="nav navbar-nav navbar-right">
                <li><?= Html::a(Yii::t('common', 'Logout') . ' ('.Yii::$app->user->identity->username.')', ['/auth/default/logout'], ['data-method' => 'post']) ?></li>
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
        
            
        
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
              <li class="header">Разделы</li>
              <!--li class="active"><a href="#"><span>Link</span></a></li-->
              <li><?= Html::a('<i class="fa fa-files-o"></i>'.Yii::t('backend', 'Pages'), ['/page/default/index']) ?></li>
              <li><?= Html::a('<i class="fa fa-file-text"></i>'.Yii::t('backend', 'News'), ['/news/default/index']) ?></li>
              <li><?= Html::a('Banners', ['#']) ?></li>
              <li><?= Html::a('<i class="fa fa-user"></i>'.Yii::t('backend', 'Users'), ['/user/default/index']) ?></li>
              <!--li class="treeview">
                <a href="#"><span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="#">Link in level 2</a></li>
                  <li><a href="#">Link in level 2</a></li>
                </ul>
              </li-->
            </ul><!-- /.sidebar-menu -->
        
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
                <?php if (Yii::$app->session->hasFlash('alert')):?>
                    <?php echo \yii\bootstrap\Alert::widget([
                        'body'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
                        'options'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
                    ])?>
                <?php endif; ?>
                
                <?= $content ?>
                
            </section><!-- /.content -->
        </aside><!-- /.right-side -->


    </div>


    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
