<div class="footer">
     <div class="container">
        <div class="newsletter">
            <!-- <h3>Newsletter</h3>
            <p></p>
            <form>
              <input type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
              <input type="submit" value="SUBSCRIBE">
            </form> -->
        </div>
        <div class="cssmenu">
           <ul>
            <!-- <li class="active"><a href="#">Privacy</a></li>
            <li><a href="#">Terms</a></li> -->
            <li><a href="#">Shop</a></li>
            <li><a href="<?= Yii::$app->urlManager->createUrl(['site/about']);?>">About</a></li>
            <li><a href="<?= Yii::$app->urlManager->createUrl(['site/contact']);?>">Contact</a></li>
          </ul>
        </div>
        <ul class="social">
            <li><a href=""> <i class="instagram"> </i> </a></li>
            <li><a href=""><i class="fb"> </i> </a></li>
            <li><a href=""><i class="tw"> </i> </a></li>
        </ul>
        <div class="clearfix"></div>
        <div class="copy">
           <!-- <p> &copy; 2017 My Cosmetics. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank"></a></p> -->
        </div>
    </div>

<?php 
$js =<<<JS
$(".megamenu").megamenu();
addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
JS;
$this->registerJS($js);
?>