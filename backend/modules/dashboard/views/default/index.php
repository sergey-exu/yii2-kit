<?php
/* @var $this yii\web\View */
use yii\web\View;
use backend\assets\ChartJsAsset;
use backend\modules\dashboard\assets\MetrikaAsset;

ChartJsAsset::register($this);
MetrikaAsset::register($this);

$this->title = 'Статистика';

?>

<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-line-chart"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Визиты</span>
        <span class="info-box-number" id="visits">-</span>
      </div>
    </div>
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fa fa-eye"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Просмотры</span>
        <span class="info-box-number" id="page_views">-</span>
      </div>
    </div>
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix visible-sm-block"></div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Посетители</span>
        <span class="info-box-number" id="visitors">-</span>
      </div>
    </div>
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Новые посетители</span>
        <span class="info-box-number" id="new_visitors">-</span>
      </div>
    </div>
  </div>
  <!-- /.col -->
</div>
    
<div class="row">
  <div class="col-md-7">
    
    <!-- AREA CHART -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Трафик: посещаемость за 14 дней</h3>
      </div>
      <div class="box-body">
        <div class="chart chartLine">
          <canvas height="180" width="100%" id="areaChartLine" style="height: 180px; width: 100%;"></canvas>
          <i class="fa fa-spinner fa-pulse fa-2x" id='loader' style="position: absolute; left: 50%; top: 40%;"></i>
        </div><!-- /.chart-responsive -->
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>

  <div class="col-md-5">
    <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Источники: сводка за 14 дней</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row chartPie">
                    <i class="fa fa-spinner fa-pulse fa-2x" id='loader' style="position: absolute; left: 45%; top: 50%;"></i>
                    <div class="col-md-5">
                      <div class="chart" style="padding: 12px 0;">
                        <canvas id="pieChart" height="155" width="100%" style="width: 100%; height: 155px;"></canvas>
                      </div>
                    </div><!-- /.col -->
                    <div class="col-md-7">
                      <div id="doughnut-legend"></div>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
                <!--div class="box-footer no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="#">United States of America <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                    <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a></li>
                    <li><a href="#">China <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
                     <li><a href="#">Usentiy <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
                  </ul>
                </div><!-- /.footer -->
              </div>
  </div>
</div>