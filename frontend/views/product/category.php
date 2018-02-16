<?php 
use common\models\SubCategory;
use common\component\Helper;

?>

<div class="col-md-4 sidebar_men">
    	  <h3> Sub Categories</h3>
    	  <ul class="product-categories color">
<?php foreach(SubCategory::find()->all() as $scData):?>
	<li class="cat-item cat-item-42"><a href="<?=Yii::$app->urlManager->createUrl(['product/category-view','id'=>$scData->id,'catId'=>$scData->category->id]);?>"><?=$scData->name;?></a> <span class="count">(<?=Helper::countProductBySubCategory($scData->id);?>)</span></li>
<?php endforeach;?>
    	  	
			
		 <!-- </ul>
		 
		  <h3>Price</h3>
    	  <ul class="product-categories"><li class="cat-item cat-item-42"><a href="#">200$-300$</a> <span class="count">()</span></li>
			<li class="cat-item cat-item-60"><a href="#">300$-400$</a> <span class="count">(2)</span></li>
			<li class="cat-item cat-item-63"><a href="#">400$-500$</a> <span class="count">(2)</span></li>
			<li class="cat-item cat-item-54"><a href="#">500$-600$</a> <span class="count">(8)</span></li>
			<li class="cat-item cat-item-55"><a href="#">600$-700$</a> <span class="count">(11)</span></li>
		  </ul> -->
		</div>