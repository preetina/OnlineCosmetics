<?php

namespace common\models;
use yii\behaviors\SluggableBehavior;
use yii\web\UploadedFile;

use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property integer $detail
 * @property string $slug
 */
class Brand extends \yii\db\ActiveRecord
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
    ];

    }
    public static function tableName()
    {
        return 'brand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','detail'], 'required'],
            [['detail'], 'string', 'max' => 250],
            [['name', 'image'], 'string', 'max' => 100],
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
            'image' => 'Image',
            'detail' => 'Detail',
            'slug' => 'Slug',
        ];
    }
    public function saveImage(){
   $this->image = UploadedFile::getInstance($this,'image');
   if(is_object($this->image)){
        $imageName =  $this->image->baseName . '.' . $this->image->extension;
        $this->image->saveAs('uploads/brand/'.$imageName);
        return $this->image = $imageName;
   }else{
       return $this->image = $this->oldAttributes['image'];
   }
   return false;
}
}
