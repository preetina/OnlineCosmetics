<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\component\Helper;


/* @var $this yii\web\View */
/* @var $model common\models\product */

// $this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">

    <div class="box-header with-border">
              <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <section class="content">
    <!-- <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->
<div class="men">
    <div class="container">
      <div class="col-md-9 single_top">
        <div class="single_left">
          <div class="labout span_1_of_a1">
            <div class="flexslider">
                      <ul class="slides">
                         <img src="<?=Yii::$app->urlManagerBackend->baseUrl.'/product/'.$model->image;?>" alt="image" width="300" height="300" class="img-responsive zoom-img">
                       



                     </ul> 

                  </div>
                  <div class="clearfix"></div>  
        </div>
        <div class="cont1 span_2_of_a1 simpleCart_shelfItem">
                <h1><?=$model->name?></h1>
                <p class="availability">Availability: <span class="color"><?=$model->stock_count; ?></span></p>
                <div class="price_single">
                  <span class="reducedfrom" data-price="<?=Helper::getPrice($model);?>">Price:<?=Helper::getCurrency($model);?> <?=Helper::getPrice($model);?></span>
                  <span class="discountamount" data-discount="<?=Helper::getDiscountPrice($model);?>"><?=Helper::getDiscountPrice($model);?></span>
                </div>
                <h2 class="quick">Quick Overview:</h2>
                <p class="quick_desc"> <?=$model->short_detail;?></p>
                
                
                <div class="quantity_box">
                    <ul class="product-qty">
                       <span>Quantity:</span>
                       <select id="product_qty">
                         <option>1</option>
                         <option>2</option>
                         <option>3</option>
                         <option>4</option>
                         <option>5</option>
                         <option>6</option>
                         <option>7</option>
                         <option>8</option>
                         <option>9</option>
                         <option>10</option>

                       </select>
                    </ul>
                    <ul class="single_social">
                        <li><a href="#"><i class="fb1"> </i> </a></li>
                        <li><a href="#"><i class="tw1"> </i> </a></li>
                        <li><a href="#"><i class="g1"> </i> </a></li>
                        <li><a href="#"><i class="linked"> </i> </a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="alert alert-success" style="display: none;" id="sucess">
                              <strong>Success!</strong> Indicates a successful or positive action.
                            </div>
                <a href="<?=Yii::$app->urlManager->createUrl(['product/add-to-cart','id'=>$model->id,'type'=>'test','page'=>'product-view'])?>" class="btn btn-primary btn-normal btn-inline btn_form button item_add item_1" target="_self">Add to cart</a>
                 <div class="alert alert-success" style="display: none;" id="success">
                              <strong>Success!</strong> Indicates a successful or positive action.
                            </div>
                 <a href="<?=Yii::$app->urlManager->createUrl(['wishlist/add-to-wishlist','id'=>$model->id]);?>" class="btn btn-primary btn-normal btn-inline btn_form button item_list item_1" target="_self">Add to Wishlist</a>
                <?php
                $session= Yii::$app->session;
                $product_id= $session->get('cart'); 
                //print_r($product_id);
              

             
                ?>


            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="sap_tabs">  
           <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
        <ul class="resp-tabs-list">
            <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Product Description</span></li>
          <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Comment</span></li>
          
        </ul>            
        <div class="resp-tabs-container">
          <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
          <div class="facts">
            <?=$model->detail;?>
            
              </div>
           </div> 
            <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
          <div class="facts">
            <ul class="tab_list">
              <li><a href="#">augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigatione</a></li>
              <li><a href="#">claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica</a></li>
              <li><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</a></li>
            </ul>           
              </div>
           </div> 
            
        </div>
        </div>
          </div>    
        </div>
       <?=$this->render('related-product') ?>
     <div class="clearfix"> </div>
    </div>
   </div>







            
    </section>

</div>
<?php 
$js =<<<JS
 $('#horizontalTab').easyResponsiveTabs({
                  type: 'default', //Types: default, vertical, accordion           
                  width: 'auto', //auto or any width like 600px
                  fit: true   // 100% fit in a container
              });

              $(".item_add").on("click",function(ev){
                ev.preventDefault();
                var obj = $(this);
                var qty = $("#product_qty").val();
                var price=$(".reducedfrom").data('price');
                var discount=$(".discountamount").data('discount');
                 $.ajax({
                    method: "POST",
                    url: obj.attr("href"),
                    data:{qty:qty,price:price,discount:discount},
                    
                    dataType:'json',
                    success:function(res){
                       if(res.success==1){
                        var alert_div=$("#sucess");
                        alert_div.addClass(res.flash_class);
                        alert_div.html(res.flash_message);
                        alert_div.show();
                         setInterval(function() {
                          alert_div.hide();
                       
                             
                        }, 5000);
                      }else{
                        alert(" Error on adding cart. Please try again later");
                      }

                    }

                    
                })


              })

             
JS;
$this->registerJS($js);
?>
<?php 
$js =<<<JS
 
              $(".item_list").on("click",function(ev){
                ev.preventDefault();
                var obj = $(this);
                 $.ajax({ url: obj.attr("href"),
                  dataType:'json',
                    success:function(res){
                      if(res.success==1){
                        var alert_div=$("#success");
                        alert_div.addClass(res.flash_class);
                        alert_div.html(res.flash_message);
                        alert_div.show();
                         setInterval(function() {
                          alert_div.hide();
                       
                             
                        }, 5000);
                      
                      }else{
                        alert(" Error on adding cart. Please try again later");
                      }

                    }

                    
                })


              })

             
JS;
$this->registerJS($js);
?>