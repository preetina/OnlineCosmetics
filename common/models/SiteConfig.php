<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "site_config".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $phone
 * @property string $email
 * @property string $googlemap
 * @property string $facebook
 * @property double $delivery_charge
 */
class SiteConfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'image', 'phone', 'email', 'googlemap', 'facebook', 'delivery_charge'], 'required'],
            [['facebook'], 'string'],
            [['delivery_charge'], 'number'],
            [['name'], 'string', 'max' => 100],
            [['image', 'googlemap'], 'string', 'max' => 250],
            [['phone'], 'string', 'max' => 12],
            [['email'], 'string', 'max' => 50],
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
            'phone' => 'Phone',
            'email' => 'Email',
            'googlemap' => 'Googlemap',
            'facebook' => 'Facebook',
            'delivery_charge' => 'Delivery Charge',
        ];
    }
}
