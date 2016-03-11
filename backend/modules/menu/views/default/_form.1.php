<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\assets\Nestable;
use yii\web\View;

Nestable::register($this);
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <b>Структура меню</b>
    <div class="dd" id="nestable">
        <ol class="dd-list">            
            <?php 
                $menuObj = json_decode($model->data);
                foreach ($menuObj as $value) {
                    echo '<li class="dd-item" data-id="' . $value->id . '" data-name="' . $value->name . '">
                            <a id="delete" class="pull-right" style="padding:4px 10px 4px 5px;"><i class="fa fa-times"></i></a>
                            <a href="#" class="pull-right" style="padding:4px 5px;"><i class="fa fa-pencil"></i></a>
                            <div class="dd-handle">' . $value->name . '</div>';
                        if(isset($value->children)) {
                            echo '<ol class="dd-list">';
                                foreach ($value->children as $child) {
                                    echo '<li class="dd-item" data-id="' . $child->id . '" data-name="' . $child->name . '">
                                            <a id="delete" href="#" class="pull-right" style="padding:4px 10px 4px 5px;"><i class="fa fa-times"></i></a>
                                            <a href="#" class="pull-right" style="padding:4px 5px;"><i class="fa fa-pencil"></i></a>
                                            <div class="dd-handle">' . $child->name . '</div>
                                        </li>';
                                }
                            echo '</ol>';
                        }
                    echo '</li>';
                }
            ?>
        </ol>
    </div>



    <?= $form->field($model, 'data')->textInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php $this->registerJs("
  $(document).ready(function(){

    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            console.log('JSON browser support required for this demo.');
        }
    };

    // activate Nestable
    $('#nestable').nestable({
        maxDepth:2
    }).on('change', updateOutput);

    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#menu-data')));
    
    
    
    $('li a#delete').click(function(){
        if (confirm('Удалить пункт меню?')) {
            parentP = $(this).parent().parent().children().length - 1;
            parent_li = $(this).parent().parent().parent();
            
            if(!parentP) {
                $(this).parent().parent().remove();
                parent_li.children('[data-action]').remove();
            } else {
                $(this).parent().remove();    
            }
            
            updateOutput($('#nestable').data('output', $('#menu-data')));
        }
    });

});

", View::POS_END); ?>



