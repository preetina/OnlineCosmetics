<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
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
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function behaviours(){
        return [
        //BlameableBehavior::className(),
                [   
                    'class' => SluggableBehavior::className(),
                    'attribute' => 'name',
                    // 'slugAttribute' => 'slug',
                ],

                'timestamp' => [
                             'class' => 'yii\behaviors\TimestampBehavior',
                             'attributes' => [
                                 ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                                 ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                                   'value' =>time(),
                             ],

                        
                         ],


    ];

    }
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
            [['name', 'stock_count', 'price', 'short_detail', 'detail', 'discount', 'brand_id', 'city_id', 'category_id','subcategory_id', 'status', 'alt_name','image'], 'required'],
            [['stock_count', 'discount_type', 'brand_id', 'city_id', 'category_id','subcategory_id', 'created_at', 'update_at', 'created_by', 'updated_by', 'status'], 'integer'],
            [['detail'], 'string'],
            [['discount'], 'number'],
            [['name', 'alt_name'], 'string', 'max' => 100],
            [['price'], 'string', 'max' => 10],
            [['short_detail'], 'string', 'max' => 250],
            //[['slug'], 'string', 'max' => 200],
            ['slug','safe']

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
            'stock_count' => 'Stock',
            'price' => 'Price',
            'short_detail' => 'Short Detail',
            'detail' => 'Detail',
            'image' => 'Image',
            'discount' => 'Discount',
            'discount_type' => 'Discount Type',
            'brand_id' => 'Brand',
            'city_id' => 'City',
            'category_id' => 'Category',
            'subcategory_id'=>'SubCategory',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'status' => 'Status',
            'slug' => 'Slug',
            'alt_name' => 'Alt Name',
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
