<div class="col-md-3 cart-total">
			 <a class="continue" href="#">Account</a>
			 <div class="price-details">
				<span><a href="<?=Yii::$app->urlManager->createUrl(['user/update','id'=>Yii::$app->user->id])?>">Update Profile</a></span>
				<span><a href="<?=Yii::$app->urlManager->createUrl('user/change-password')?>">Change Password</a></span>
				<!-- <span><a href="<?=Yii::$app->urlManager->createUrl('user/reset-password')?>">Reset Password</a></span> -->
				

				 <div class="clearfix"></div>				 
			 </div>	


			 <a class="continue" href="#">Orders</a>
			 <div class="price-details">
				<span><a href="<?=Yii::$app->urlManager->createUrl('user-order/index')?> ">My Order</a></span>
				<span><a href="<?=Yii::$app->urlManager->createUrl('product/checkout')?>">Cart</a></span><br />
				<span><a href="<?=Yii::$app->urlManager->createUrl(['user-order/index','status'=>'completed'])?>">Completed Order</a></span>
				<span><a href="<?=Yii::$app->urlManager->createUrl(['user-order/index','status'=>'pending'])?>">Pending Orders</a></span><br />
				<span><a href="<?=Yii::$app->urlManager->createUrl(['user-order/index','status'=>'cancel'])?>">Canceled Orders</a></span>
				<span><a href="<?=Yii::$app->urlManager->createUrl('wishlist/index')?>">Wishlist</a></span><br />
				
				

				<!-- <span><a href="#">Wish List Product</a></span><br /> -->
				 <div class="clearfix"></div>				 
			 </div>	
			 
			</div>