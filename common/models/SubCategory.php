<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
use yii\behaviors\SluggableBehavior;


/**
 * This is the model class for table "sub_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $detail
 * @property string $slug
 */
class SubCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc


     */
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
        return 'sub_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'detail','category_id'], 'required'],
            [['detail'], 'string'],
            [['name'], 'string', 'max' => 250],
            [['slug'], 'string', 'max' => 100],
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
            'category_id'=>'Category',
           
            'detail' => 'Detail',
            'slug' => 'Slug',
        ];
    }

    public function getCategory()
{
    return $this->hasOne(Category::className(), ['id'=> 'category_id']);
}

   
}
