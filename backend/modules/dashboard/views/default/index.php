<?php
/* @var $this yii\web\View */
use yii\web\View;
use backend\assets\ChartJsAsset;

$this->title = 'Статистика';
?>

<div class="row">
  <div class="col-md-12">
    <!-- AREA CHART -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Трафик: посещаемость</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        
          <div class="row">
            <div class="col-md-8">
              <div class="chart chartLine">
                <canvas height="180" width="1072" id="areaChartLine" style="height: 180px; width: 1072px;"></canvas>
                <i class="fa fa-spinner fa-pulse fa-2x" id='loader' style="position: absolute; left: 50%; top: 40%;"></i>
              </div><!-- /.chart-responsive -->
            </div><!-- /.col -->
            <div class="col-md-4">
              <div class="progress-group" id="visits">
                <span class="progress-text">Визиты</span>
                <span class="progress-number"><b></b>/1000</span>
                <div class="progress sm">
                  <div class="progress-bar progress-bar-aqua"></div>
                </div>
              </div><!-- /.progress-group -->
              <div class="progress-group" id="page_views">
                <span class="progress-text">Просмотры</span>
                <span class="progress-number"><b></b>/1000</span>
                <div class="progress sm">
                  <div class="progress-bar progress-bar-red"></div>
                </div>
              </div><!-- /.progress-group -->
              <div class="progress-group" id="visitors">
                <span class="progress-text">Посетители</span>
                <span class="progress-number"><b></b>/1000</span>
                <div class="progress sm">
                  <div class="progress-bar progress-bar-green"></div>
                </div>
              </div><!-- /.progress-group -->
              <div class="progress-group" id="new_visitors">
                <span class="progress-text">Новые посетители</span>
                <span class="progress-number"><b></b>/500</span>
                <div class="progress sm">
                  <div class="progress-bar progress-bar-yellow"></div>
                </div>
              </div><!-- /.progress-group -->
            </div><!-- /.col -->
          </div>
          
      </div><!-- /.box-body -->
      
    </div><!-- /.box -->
  </div>
</div>

<div class="row">
  <div class="col-lg-4 col-md-6">
    <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Источники: сводка</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row chartPie">
                    <i class="fa fa-spinner fa-pulse fa-2x" id='loader' style="position: absolute; left: 50%; top: 50%;"></i>
                    <div class="col-md-6">
                      <div class="chart">
                        <canvas id="pieChart" height="155" width="186" style="width: 186px; height: 155px;"></canvas>
                      </div>
                    </div><!-- /.col -->
                    <div class="col-md-6">
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




<?php ChartJsAsset::register($this); ?>



<?php $this->registerJsFile('/backend/js/aa.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>