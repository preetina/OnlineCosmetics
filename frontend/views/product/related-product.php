 <?php
 use common\models\Product;
 use common\component\Helper;
 ?>
 <div class="col-md-3 tabs">
          <h3 class="m_1">Related Products</h3>

          <?php foreach(Product::find()->limit(6)->all() as $pData){ ?>
          <ul class="product">
            <li class="product_img"><img src="<?=Yii::$app->urlManagerBackend->baseUrl.'/product/'.$pData->image;?>" class="img-responsive" alt=""/></li>
            <li class="product_desc">
                <a href="<?=Yii::$app->urlManager->createUrl(['product/view','id'=>$pData->id]);?>"</a>
                
              </br>
               <?= $pData->name?>
             </br>
                <?=Helper::getCurrency($pData);?><?= $pData->price?>

                
                <!-- <a href="#" class="link-cart">Add to Cart</a> -->
            </li>
            <div class="clearfix"> </div>
          </ul>
          <?php } ?>
        </div>
