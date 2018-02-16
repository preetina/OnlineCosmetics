<!-- <?php

	foreach($model as $pData)
	{
		echo '<pre>';
		print_r($pData->attributes);
		echo '</pre>';
	}
?> -->
<?php 
use common\component\Helper;
use common\models\Product;
?>


	
   <div class="account-in">
   	 <div class="container">
		  <div class="check_box">	 
		<div class="col-md-9 cart-items">
			 <h1>My Shopping Bag ( <?= Helper::getCartCount() ?>
            )</h1>
				<!-- <script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script> -->
			   <?php foreach($model as $pData){ ?>
			 <div class="cart-header pid_<?=$pData->id?>">
				 <div class="close1" data-pid="<?=$pData->id?>" data-aurl="<?=Yii::$app->urlManager->createUrl('product/delete-cart-item')?>"> </div>
				   <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							 <img src="<?=Yii::$app->urlManagerBackend->baseUrl.'/product/'.$pData->image;?>" width="150" height="100" alt=""/>
						</div>
					   <div class="cart-item-info">
						<h3><?=$pData->name;?><span></span></h3>
						<ul class="qty">
							
							<li><p>Qty:<input readonly type='text' class='product-count' size='1' value='<?=Helper::getCartProductQtyCount($pData->id)?>'> <br/>Price:<?=Helper::getCurrency();?><?=$pData->price?></p></li>
							<span>Delivered in 2-3 hours</span>
						</ul>
						<div class="delivery">
							<!--  <p>Service Charges : Rs.100.00</p> -->
							 
							 <div class="clearfix"></div>
				        </div>	
					   </div>
					   <div class="clearfix"></div>
				    </div>
			 </div>
			 <?php } ?>
			 <!-- <script>$(document).ready(function(c) {
					$('.close2').on('click', function(c){
							$('.cart-header2').fadeOut('slow', function(c){
						$('.cart-header2').remove();
					});
					});	  
					});
			 </script> -->
				
		 </div>

		 <div class="col-md-3 cart-total">
			 <a class="continue" href="<?php Yii::$app->urlManager->createUrl('site/index'); ?>">Continue Shopping</a>
			 <div class="price-details">
				 <h3>Price Details</h3>
				 <span>Total</span>
				 <span class="total1" data-total=><?=Helper::getCurrency();?><?= Helper::getCartPrice() ?></span>
				 <span>Discount</span>
				 <span class="total1"><?=Helper::getCurrency();?><?=Helper::getDiscount();?></span>
				 <?php 
				 echo '--------------------------------------------'; ?>
				 <br>

				 
				 <span><b>SUB TOTAL</b></span>
				 <span class="total1"><b><?=Helper::getCurrency();?><?=Helper::getTotalDiscountPrice();?></b></span>



				 <span>Delivery Charges</span>
				 <span class="total1"><?=Helper::getCurrency();?>60.00</span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <b>TOTAL</b></li>	
			   <li class="last_price"><span><b><?=Helper::getCurrency();?><?=Helper::getTotal();?></b></span></li>
			   <div class="clearfix"> </div>
			 </ul>
			 <div class="clearfix"></div>
			 <!-- <b>Note:</b><input type="text" name=" note">
 -->

			 <a class="order" href="<?=Yii::$app->urlManager->createUrl('product/place-order')?>">Place Order</a>
			 <div class="total-item">
				 
			 </div>
			</div>

			
			<div class="clearfix"></div>
	     </div>
	  </div>
   </div>
   <div class="map">
	   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3150859.767904157!2d-96.62081048651531!3d39.536794757966845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1408111832978"> </iframe>
   </div>
   
   </div>

   <?php
$js =<<<JS
   $(".close1").on("click",function(ev){
                ev.preventDefault();
                  var obj = $(this);
                 var pid = obj.data('pid');
                 var url=obj.data('aurl');
                 var delete_class="pid_"+pid;
                 if(!confirm("Are you sure you want to delete?")){
                  return;
                 }
                  $.ajax({
                    method: "POST",
                    url:url,
                    data:{pid:pid},
                    dataType:'json',
                    success:function(res){
                      if(res.success==1){
                        $("."+delete_class).remove()
                      }else{
                        alert(" Error on adding cart. Please try again later");
                      }

                    }

                    
                })

               
            })

JS;
$this->registerJS($js);
?>

