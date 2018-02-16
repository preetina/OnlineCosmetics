
<?php
use common\models\Product;
?><div class="men">
    <div class="container">
<ul class="content-home">
  <?php foreach(Product::find()->limit(3)->all() as $pData){ ?>
           <li class="col-sm-4">
              <a href="<?=Yii::$app->urlManager->createUrl(['product/view','id'=>$pData->id]);?>" class="item-link" title="">
                <div class="bannerBox">
                   <img src="<?=Yii::$app->urlManagerBackend->baseUrl.'/product/'.$pData->image;?>"  class="item-img" title="" alt="" width="100%" height="100%">
                   <div class="item-html">
                      <h3><span></span></h3>
                  
                      
                      <button>Shop now!</button>
                   </div>
                </div>
              </a>
           </li>
          <?php }?>
           <div class="clearfix"> </div>         
       </ul>
    </div>
    <div class="middle_content">
        <div class="container">
            <h2>Welcome</h2>
            <p>We’ve searched the world to bring you the best performing makeup. From LA’s finest to brands born and bred in the UK, we’re always on the lookout for the next big thing. These dreamy lip hues and ultimate brow saviours are the formulas that you’ll be reaching for every day.</p>
        </div>
    </div>
    <?=$this->render('images');?>