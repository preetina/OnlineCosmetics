<?php

namespace frontend\controllers;


use Yii;
use common\models\Product;
use common\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\SubCategory;
use yii\web\Session;
use common\models\OrderItem;
use common\models\UserOrder;
use common\component\Helper;




/**
 * ProductController implements the CRUD actions for product model.
 */
class ProductController extends Controller
{
   
    public $enableCsrfValidation = false;
    /**
     * Lists all product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * Finds the product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCategoryView($id){
        $searchModel = new ProductSearch();
        $subCatModel = SubCategory::findOne($id);
                                           
        $searchModel->subcategory_id= $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('category-view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'subCatModel'=>$subCatModel
        ]);

    }

    public function actionAddToCart($id)
{
    // $cart = new ShoppingCart();
    $session=Yii::$app->session;
    $click = 1;
    if(isset($_POST['qty']) && !empty($_POST['qty'])){
        $qty = (int) $_POST['qty'];
        $price=(int)$_POST['price'];
        $discount=(int)$_POST['discount'];
        }

    $cart = [];
    if($session->get('cart')){
        $cart = $session->get('cart');
        
        if(isset($cart[$id])){
            $lastCount = $cart[$id]['qty'];
            $lastPrice= $cart[$id]['price'];
            $lastDiscount=$cart[$id]['discount'];
            $cart[$id]['qty'] = $lastCount + $qty;
            $cart[$id]['price'] = $lastPrice;
            $cart[$id]['discount']=$lastDiscount;


        }else{
            $cart[$id]['qty'] = $qty;
             $cart[$id]['price'] = $price;
             $cart[$id]['discount']=$discount;
        }
        
    //$lastClick = $session->get('product_count') + $click;
    }else{
        
        $cart[$id]['qty'] = $qty;

        $cart[$id]['price'] = $price;
        $cart[$id]['discount']=$discount;


        
       
    }
    
    $session['cart']=$cart;
    echo json_encode([
        'success'=>1,
        'flash_class'=>'alert alert-success',
        'message'=>'Cart has been udpated',
        'data'=>$cart,
        'flash_message'=>'Success! Cart has been udpated.'
    ]);
    exit;
   
}

    public function actionCheckout(){
        $session=Yii::$app->session;
        $cart=$session->get('cart');
        if (empty($cart))
        {    Yii::$app->session->setFlash('warning', 'Your Cart is empty!');
             return $this->redirect(['site/index']);
        }
        $product_id=array_keys($cart);
      
        $model = Product::find()->where(['id'=>$product_id])->all();
      return $this->render('checkout',
        [
            'model'=>$model]);



    }

     public function actionDeleteCartItem(){
         $pid=(int)$_POST['pid'];
         $session=Yii::$app->session;
         $cart=$session->get('cart');
         unset($cart[$pid]);
          $session['cart']=$cart;
           echo json_encode([
        'success'=>1,
        'message'=>'Cart item has been deleted',
        'data'=>$cart
    ]);
    exit;

    }

    public function actionPlaceOrder(){
        $model= new UserOrder();
        $session=Yii::$app->session;
        $cart=$session->get('cart');
        if(!empty($cart)){
            $total=Helper::getCartPrice();
            $discount=Helper::getDiscount();
            $subtotal=$total-$discount;
            $delivery_charges=60;
            $final=$subtotal+$delivery_charges;
            $qty=Helper::getCartCount();
            $model->subtotal=$subtotal;
            $model->discount_amount=$discount;
            $model->total_amount=$final;
            $model->user_id=Yii::$app->user->getId();
            $model->delivery=$delivery_charges;
            $model->created_at=time();
            $model->updated_at=time();
            $model->total_quantity=$qty;
            $model->created_by=Yii::$app->user->getId();
            $model->updated_by=Yii::$app->user->getId();
            $model->note='test note';
            if($model->save(false)){
                foreach($cart as $pid=>$pData){

                    $userid=Yii::$app->user->getId();
                    $price=$pData['price'];
                    $quantity=$pData['qty'];
                    $discount=$pData['discount'];
                    $user_order_id=$model->id;
                    $product_id=$pid;
                    $order_item= new OrderItem();
                    $order_item->user_order_id=$user_order_id;
                    $order_item->product_id=$product_id;
                    $order_item->user_id=$userid;
                    $order_item->price=$price;
                    $order_item->discount=$discount;
                    $order_item->quantity=$quantity;
                    $order_item->save();




                }
                unset($session['cart']);
                //echo 'Order has been placed successfully.';
                return $this->render('order',
        [
            'model'=>$model]);

                
            }



        }


        }
        public  function actionEmptyCart(){
            $session=Yii::$app->session;
            $cart=$session->get('cart');
            unset($session['cart']); 
            Yii::$app->session->setFlash('warning', 'Your Cart is empty!');
            return $this->redirect(Yii::$app->request->referrer);
            }
}
