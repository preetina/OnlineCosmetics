<?php


use common\component\Helper;
?>
	

	<a class="cbp-vm-image" href="<?=Yii::$app->urlManager->createUrl(['product/view','id'=>$model->id]);?>">
	 <div class="view view-first">
		  <div class="inner_content clearfix">
		<div class="product_image">
			 <div class="mask1">
			 	<img src="<?=Yii::$app->urlManagerBackend->baseUrl.'/product/'.$model->image;?>" alt="image" width="300" height="300" class="img-responsive zoom-img"></div>
			<div class="mask">
           		<div class="info">Quick View</div>
             </div>
             <div class="product_container">
			   <h4><?=$model->name;?></h4>
			  <!--  <h4><?=$model->subcategory_id;?></h4> -->
			   <!-- <div class="price mount item_price">$99.00</div> -->
			   <h4><?=Helper::getCurrency($model);?>.<?=$model->price;?></h4>
		</br>
			   
			  
			
			 </div>		
		  </div>
         </div>
      </div>
    </a>