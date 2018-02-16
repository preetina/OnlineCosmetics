<?php

namespace common\models;


use Yii;

/**
 * This is the model class for table "user_order".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property double $total_amount
 * @property string $note
 * @property double $subtotal
 * @property double $discount_amount
 * @property string $delivery
 */
class UserOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'user_id', 'created_at', 'updated_at', 'created_by', 'updated_by', 'total_amount', 'note', 'subtotal', 'discount_amount', 'delivery'], 'required'],
            [['product_id', 'user_id', 'created_at', 'updated_at', 'created_by', 'updated_by','status'], 'integer'],
            [['total_amount','total_quantity', 'subtotal', 'discount_amount'], 'number'],
            [['note'], 'string'],
            [['delivery'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Order Id',
            'product_id' => 'Product ID',
            'user_id' => 'User',
            'created_at' => 'Ordered At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'total_amount' => 'Total Amount',
            'note' => 'Note',
            'subtotal' => 'Subtotal',
            'discount_amount' => 'Discount Amount',
            'delivery' => 'Delivery',
            'status'=>'Status',
            'total_quantity'=>'Total Quantity'
            
        ];
    }
    public function getProduct()
{
    return $this->hasOne(Product::className(), ['id'=> 'product_id']);
}
public function getUser()
{
    return $this->hasOne(User::className(), ['id'=> 'user_id']);
}

    
}
