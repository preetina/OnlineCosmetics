<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\web\UploadedFile;
/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property integer $stock_count
 * @property string $price
 * @property string $short_detail
 * @property string $detail
 * @property string $image
 * @property double $discount
 * @property integer $discount_type
 * @property integer $brand_id
 * @property integer $city_id
 * @property integer $category_id
 * @property integer $created_at
 * @property integer $update_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $status
 * @property string $slug
 * @property string $alt_name
 * @property integer $subcategory_id
 */
class Product extends \yii\db\ActiveRecord
{

     public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'ensureUnique'=>true,
                'immutable'=>true,
                // 'slugAttribute' => 'slug',
            ],
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'update_at',
                'value' =>time(),
            ],
            BlameableBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'stock_count', 'price', 'short_detail', 'detail', 'image', 'discount', 'brand_id', 'city_id', 'category_id', 'alt_name', 'subcategory_id'], 'required'],
            [['stock_count', 'discount_type', 'brand_id', 'city_id', 'category_id', 'created_at', 'update_at', 'created_by', 'updated_by', 'status', 'subcategory_id'], 'integer'],
            [['detail'], 'string'],
            [['discount'], 'number'],
            [['name', 'image', 'alt_name'], 'string', 'max' => 100],
            [['price'], 'string', 'max' => 10],
            [['short_detail'], 'string', 'max' => 250],
            [['slug'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'stock_count' => 'Stock Count',
            'price' => 'Price',
            'short_detail' => 'Short Detail',
            'detail' => 'Detail',
            'image' => 'Image',
            'discount' => 'Discount',
            'discount_type' => 'Discount Type',
            'brand_id' => 'Brand',
            'city_id' => 'City',
            'category_id' => 'Category',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'status' => 'Status',
            'slug' => 'Slug',
            'alt_name' => 'Alt Name',
            'subcategory_id' => 'Subcategory',
        ];
    }

     public function getCategory()
{
    return $this->hasOne(Category::className(), ['id'=> 'category_id']);
}

    public function getSubCategory()
{
    return $this->hasOne(SubCategory::className(), ['id'=> 'subcategory_id']);
}
public function getBrand()
{
    return $this->hasOne(Brand::className(), ['id'=> 'brand_id']);
}
public function getCity()
{
    return $this->hasOne(City::className(), ['id'=> 'city_id']);
}

public function saveImage(){
   $this->image = UploadedFile::getInstance($this,'image');
   if(is_object($this->image)){
        $imageName =  $this->image->baseName . '.' . $this->image->extension;
        $this->image->saveAs('uploads/product/'.$imageName);
        return $this->image = $imageName;
   }else{
       return $this->image = isset($this->oldAttributes['image'])?$this->oldAttributes['image']:'';
   }
   return false;
}



}
