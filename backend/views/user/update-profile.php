 
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\component\Helper;

?>
 <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="pull-left header active"><a href="#revenue-chart" data-toggle="tab">Update Profile</a></li>
              <li class="pull-left header"><a href="#sales-chart" data-toggle="tab">Change Password</a></li>
              <!-- <li class="pull-left header"><i class="fa fa-user">Profile</i></li> -->
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative">
                
                
                 <?php $form = ActiveForm::begin(); ?>
  <div class="box-body">
  <?php echo $form->errorSummary($model);?>
      <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
      <!-- <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?> -->

      <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'mobile')->textInput() ?>
   
      <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

     
      <div class="form-group">
          <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
      </div>
  </div>
    <?php ActiveForm::end(); ?>


            </div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative">
              <?=$this->render('change-password',['model'=>$changepass])?>  

                  

              </div>
              
            </div>
            <div class="alert alert-success" style="display: none;" id="sucess">
                              <strong>Success!</strong> Indicates a successful or positive action.
                            </div>
<?php
$js =<<<JS
    $("body").on("click",'#changepassword',function(ev){
      ev.preventDefault();

      var obj = $(this);
      $.ajax({
        type:'post',
        url:obj.data('aurl'),
        data:$("body #change-password").serialize(),
        dataType:'json',
        success:function(res){
            if(res.success==1){
              $("body #change-password")[0].reset();
              
                        var alert_div=$("#sucess");
                        alert_div.addClass(res.flash_class);
                        alert_div.html(res.flash_message);
                        alert_div.show();
                         setInterval(function() {
                          alert_div.hide();
                       
                             
                        }, 5000);

            }else{
                $("body .change-password-ajax").html(res.data);
              }
          }
        })

    });

JS;
$this->registerJS($js);
?>