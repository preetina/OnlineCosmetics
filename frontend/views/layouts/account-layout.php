
<?php $this->beginContent('@app/views/layouts/main.php'); ?>
<div class="account-in">
   	 <div class="container">
		  <div class="check_box">	 
		<div class="col-md-9 cart-items">
			 <?=$content;?>		
		 </div>
		 <?=$this->render('sidebar');?>
			<div class="clearfix"></div>
	     </div>
	  </div>
   </div>
   <?php $this->endContent(); ?>