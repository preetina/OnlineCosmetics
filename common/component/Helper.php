<?php
namespace common\component;
use common\models\Product;

use yii;
class Helper
{
  static $badge_class=[
    0=>'bg-yellow',
    1=>'bg-green',
    2=>'bg-red'];
    
  static $order=[
    0=>'Pending',
    1=>'Completed',
    2=>'Canceled'
  ];
  
	static $status=[
	0=>'Inactive',
	1=>'Active'
	];
  static $gender=[
  0=>'Male',
  1=>'Female'
  ];
	static $type=[
	0=>'User',
	1=>'Admin'
	];
	static $discount_type=[
	0=>'Percentage',
	1=>'Amount'
	];
	public static function getDate($date=null){
		$time=$date?$date:time();
		return date ('Y-m-d | G:i',$time);
	}

	public static function getCurrency(){
		return 'NRs.';
	}

	public static function getPrice($model)
	{
		return $model->price;
	}
  public static function getColouredStatus($model){
    $coloured_class=self::$badge_class[$model->status];
    return '<span class="badge '.$coloured_class.'">'.self::$order[$model->status].'</span>';
  }
	public static function getDiscountPrice($model)
	{
		if($model->discount_type==0)
		{
			$discounted_price=$model->price-($model->discount*$model->price/100);
			return $discounted_price;

		}
		else{
			$discounted_price=$model->price-$model->discount;
			return $discounted_price;


		}
		
	}
	 

	public function countProductBySubCategory($id){
		
		$sql = "select count(*) as product_count from product where subcategory_id=$id";
		 $results = Yii::$app->db->createCommand($sql)->queryOne();
		 return $results['product_count'];
	} 

	public static function getCartPrice(){
		$session=Yii::$app->session;
        $cart=$session->get('cart');
        if (empty($cart))
        {
        	return ;
        }
        $sum=0;
        

        foreach ($cart as $product_id=> $product_array) {
        	
        	if(is_array($product_array)){
        		$price=$product_array['price'];
	        	
	        	$quan=$product_array['qty'];
	        	$total_price=$price*$quan;
	        	$sum=$sum+$total_price;

        	}
        	


        	
        }
        return $sum;

      }

	public static function getCartCount(){

		$session=Yii::$app->session;
		return count($session->get('cart'));
	}

   public static function getCartProductQtyCount($pid){
   $session=Yii::$app->session;
   $cart=$session->get('cart');
   $qty=$cart[$pid]['qty'];
   return $qty;

 }

 public static function getTotalDiscountPrice(){
  $session=Yii::$app->session;
   $cart=$session->get('cart');
   $discount=0;
        foreach ($cart as $product_id=> $product_array) {
         if(is_array($product_array)){
          $dis=$product_array['discount'];
           $quan=$product_array['qty'];
          $total=$dis*$quan;
          $discount=$total+$discount;
         }
     }
     return $discount;

         
 }

 public static function getDiscount()
 {
 	$session=Yii::$app->session;
 	$cart=$session->get('cart');
 	$discount=0;
 	 $sum=0;
        foreach ($cart as $product_id=> $product_array) {
         if(is_array($product_array)){
          $dis=$product_array['discount'];
           $quan=$product_array['qty'];
           $price=$product_array['price'];
           $total_price=$price*$quan;
	       $sum=$sum+$total_price;

          $total=$dis*$quan;
          $discount=$total+$discount;
          $total_discount=$sum-$discount;
         }
     }
     return $total_discount;

 }

 public static function getTotal(){

 	$session=Yii::$app->session;
   $cart=$session->get('cart');
   $discount=0;
        foreach ($cart as $product_id=> $product_array) {
         if(is_array($product_array)){
          $dis=$product_array['discount'];
           $quan=$product_array['qty'];
          $total=$dis*$quan;
          $discount=$total+$discount;
          $amount=$discount+60;
         }
     }
     return $amount;

 }
 }

?>
