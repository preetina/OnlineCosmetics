<?php 
use yii\widgets\ListView;

?>
<div class="men">
<?=$this->render('category',['subCatModel'=>$subCatModel]);?>

    	<div class="col-md-8 mens_right">
    		<div class="dreamcrub">
			   	<ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.html" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="home">&nbsp;
                        <?=$subCatModel->category->name;?>&nbsp;
                         <span>&gt;</span>
                    </li>
                    <li class="home">&nbsp;
                        <?=$subCatModel->name;?>&nbsp;
                         
                    </li>
                </ul>
                <!-- <ul class="previous">
                	<li><a href="index.html">Back to Previous Page</a></li>
                </ul> -->
                <div class="clearfix"></div>
			   </div>
			   <div class="mens-toolbar">
                 <!-- <div class="sort">
               	   <div class="sort-by">
		            <label>Sort By</label>
		            <select>
		                            <option value="">
		                    Position                </option>
		                            <option value="">
		                    Name                </option>
		                            <option value="">
		                    Price                </option>
		            </select>
		            <a href=""><img src="images/arrow2.gif" alt="" class="v-middle"></a>
                   </div>
    		     </div> -->
    	        <!-- <ul class="women_pagenation dc_paginationA dc_paginationA06">
			     <li><a href="#" class="previous">Page : </a></li>
			     <li class="active"><a href="#">1</a></li>
			     <li><a href="#">2</a></li>
		  	    </ul> -->
                <div class="clearfix"></div>		
		        </div>
    		<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<div class="cbp-vm-options">
						<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid" title="grid">Grid View</a>
						<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list" title="list">List View</a>
					</div>
					<div class="pages">   
        	 <!-- <div class="limiter visible-desktop">
               <label>Show</label>
                  <select>
                            <option value="" selected="selected">
                    9                </option>
                            <option value="">
                    15                </option>
                            <option value="">
                    30                </option>
                  </select> per page        
               </div> -->
       	   </div>
					<div class="clearfix"></div>
					<ul>
					  

					<?= 
					ListView::widget([
					    'dataProvider' => $dataProvider,
					    
					    'itemOptions' => [
					        'tag' => 'li',
					        'class' => 'simpleCart_shelfItem',
					        'id' => 'item-wrapper',
					    ],
					    //'layout' => "{pager}\n{items}\n{summary}",
					    'itemView' => 'single-product',
					]);
					?>


					</ul>
				</div>
				
    	</div>
    </div> 