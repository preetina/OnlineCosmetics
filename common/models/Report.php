<?php
namespace common\models;

use Yii;
use yii\base\Model;
use yii\db\query;


class Report extends Model
{
    
    

    public function getTotalOrder()
    { 
        
        $connection=Yii::$app->getDb();
        $command=$connection->createCommand("SELECT count(order_item.id),category.name from order_item LEFT JOIN product on order_item.product_id=product.id LEFT JOIN category on product.category_id=category.id GROUP BY product.category_id");
        $result=$command->queryAll();
        return $result;
        

    }

    public function getTotalEarning(){
        $query=new query();
        $query->Select ('total_amount')->from('user_order');
        $sum=$query->sum('total_amount');
        return $sum;
    }

    public function getTotalUser(){
        $query=new query();
        $query->Select ('id')->from('user');
        $sum=$query->count('id');
        return $sum;
    }

    public function getMaleUsers(){
        $query=new query();
        $query->Select ('id')->from('user')-> where('gender=0');
        $sum=$query->count('id');
        return $sum;

    }

     public function getFemaleUsers(){
        $query=new query();
        $query->Select ('id')->from('user')-> where('gender=1');
        $sum=$query->count('id');
        return $sum;

    }

     public function getTotalProduct(){
        $query=new query();
        $query->Select ('id')->from('product');
        $sum=$query->count('id');
        return $sum;

    }

    public function getTotalCanceledOrders(){
        $query=new query();
        $query->Select('id')->from('user_order')->where ('status=2');
        $sum = $query->count('id');
        return $sum;

    }

     public function getTotalConfirmedOrders(){
        $query=new query();
        $query->Select('id')->from('user_order')->where ('status=1');
         $sum = $query->count('id');
        return $sum;


    }

    public function getLatestUsers(){
        $query=new query();
        $query->Select ('id,username,created_at,image')->from('user')-> limit(4);
        $rows = $query->all();
        return $rows;

    }
     public function getLatestOrder(){
        $query=new query();
        $query->Select ('id,user_id,status')->from('user_order')-> limit(6);
        $rows = $query->all();
        return $rows;

    }
}
