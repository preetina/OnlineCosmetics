<?php 
use common\models\Category;
use common\models\SubCategory;
use common\component\Helper;

?>

<div class="header_top">
           <div class="header_top_left">
            <!-- <div class="box_11"><a href="checkout.html">
          <h4><p>Cart: <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</p><img src="images/bag.png" alt=""/><div class="clearfix"> </div></h4>
          </a></div> -->
           <!--  <p class="empty"><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p> -->
            <div class="clearfix"> </div>
         </div>
           <div class="header_top_right">

          <div class="box_11"><a href="<?=Yii::$app->urlManager->createUrl('product/checkout')?>">
          <h4><p>Cart: <?=Helper::getCurrency();?><span class="simpleCart_totall"><?=Helper::getCartPrice();?></span> (<span id="simpleCart_quantityy" class="simpleCart_quantityy">
            <?= Helper::getCartCount() ?>
            
          </span> items)</p><img src="images/bag.png" alt=""/><div class="clearfix"> </div></h4>
          </a><p class="empty"><a href="<?=Yii::$app->urlManager->createUrl('product/empty-cart')?>" class="simpleCart_empty">Empty Cart</a></p>
           <div class="clearfix"> </div>
           </div>
          <!-- <p class="empty"><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p> -->
          
         <div class="lang_list">

        <!-- <select tabindex="4" class="dropdown">
          <option value="" class="label" value="">$ Us</option>
          <option value="1">Dollar</option>
          <option value="2">Euro</option>
        </select> -->
       </div>
       
        <?php if(Yii::$app->user->isGuest):?>
       <ul class="header_user_info">
        <a class="login" href="<?= Yii::$app->urlManager->createUrl(['site/login']);?>">
        <i class="user"> </i> 
        <li class="user_desc">Login</li>
        </a>
        <div class="clearfix"> </div>
        </ul>
       <?php else:?>

            <ul class="header_user_info">
              <a  href="<?= Yii::$app->urlManager->createUrl(['user/account','id'=>Yii::$app->user->id]);?>">
              <i class="user"> </i> 
              <li class="user_desc">My Account</li>
              </a>
              <div class="clearfix"> </div>
             </ul>
            <ul class="header_user_info">
              <a  href="<?= Yii::$app->urlManager->createUrl(['site/logout']);?>">
              <i class="user"> </i> 
              <li class="user_desc">LogOut</li>
              </a>
              <div class="clearfix"> </div>
             </ul>

        <?php endif;?>
        

        
         

      

         
        

         
        <!-- start search-->
        <!-- <div class="search-box">
           <div id="sb-search" class="sb-search">
            <form>
             <input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
             <input class="sb-search-submit" type="submit" value="">
             <span class="sb-icon-search"> </span>
             </form>

            </div>
 -->
         </div>
         <!----search-scripts---->
         <script src="js/classie1.js"></script>
         <script src="js/uisearch.js"></script>
           <script>
           new UISearch( document.getElementById( 'sb-search' ) );
           </script>

          <!----//search-scripts---->
                <div class="clearfix"> </div>
       </div>
         <div class="clearfix"> </div>
    </div>
    <div class="header_bottom">
     <div class="logo">
      <h1><a href="<?=Yii::$app->homeUrl;?>"><span class="m_1">My</span>Cosmetics</a></h1>
     </div>
       <div class="menu">
       <ul class="megamenu skyblue">
        <?php foreach(Category::find()->where(['cat_type'=>1])->all() as $cData):?> 
      <li><a class="color2" href="#"><?=$cData->name?></a>
        <div class="megapanel">
          <div class="row">
            <div class="col1">
              <div class="h_nav">

                <h4><?=$cData->name?></h4>
                <ul>
                  <?php foreach(SubCategory::find()->where(['category_id'=>$cData->id])->all() as $scData):?>

                      <li><a href="<?=Yii::$app->urlManager->createUrl(['product/category-view','id'=>$scData->id,'catId'=>$cData->id]);?>"><?=$scData->name;?></a></li>
                  <?php endforeach;?>
                  
                  
                 
                </ul> 
              </div>              
            </div>
            
            </div>
          </div>
      </li>
      <?php endforeach;?>
      
      </ul>
      </div>
          <div class="clearfix"> </div>
          </div>
      </div>