<?php
 use common\models\Product;
 use common\component\Helper;
 ?>
 <div class="content_middle_bottom">
        <div class="header-left" id="home">
              <section>
                <ul class="lb-album" >
                   
                        <?php foreach(Product::find()->limit(8)->all() as $pData){ ?>
                             <li>
                        <a href="#image-1">
                            <img src="<?=Yii::$app->urlManagerBackend->baseUrl.'/product/'.$pData->image;?> "  class="img-responsive" alt="image01" width='337px' height='348px' />
                            <span></span>
                        </a>
                        <div class="lb-overlay" id="image-1">
                            <a href="#page" class="lb-close">x Close</a>
                            <img src="images/g1.jpg"  class="img-responsive" alt="image01"/>
                            <div>
                                <h3> <span></span></h3>
                                <p></p>
                            </div>
                        </div>
                        </li>
                        <?php } ?>
                    
                    
                    <div class="clearfix"></div>
                </ul>
                </section>
        </div>
      </div>