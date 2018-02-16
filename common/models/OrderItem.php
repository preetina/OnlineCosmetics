<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order_item".
 *
 * @property integer $id
 * @property integer $user_order_id
 * @property integer $product_id
 * @property integer $user_id
 * @property double $price
 * @property double $discount
 * @property integer $quantity
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_order_id', 'product_id', 'user_id', 'price', 'discount', 'quantity'], 'required'],
            [['user_order_id', 'product_id', 'user_id', 'quantity'], 'integer'],
            [['price', 'discount'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_order_id' => 'User Order ID',
            'product_id' => 'Product ID',
            'user_id' => 'User ID',
            'price' => 'Price',
            'discount' => 'Discount',
            'quantity' => 'Quantity',
        ];
    }
     public function getProduct()
{
    return $this->hasOne(Product::className(), ['id'=> 'product_id']);
}
}
