<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;


/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 */
class Category extends \yii\db\ActiveRecord
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
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
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
            'slug' => 'Slug',
        ];
    }

    public function getSubCategory(){
        return $this->hasOne(Category::className(),['id'=>'category_id']);
    }
}
