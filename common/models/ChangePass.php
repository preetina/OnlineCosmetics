<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ChangePass extends Model
{
    public $old_password;
    public $new_password;
    public $confirm_password;
   

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // old_password, new_password and confirm_password required
            [['old_password', 'new_password', 'confirm_password'], 'required'],
            ['old_password','validateOldPassword'],
            ['confirm_password','compare','compareAttribute'=>'new_password','message'=>'Password did not match']


            
            
        ];
    }


    public function validateOldPassword($attribute,$param){

        if(!Yii::$app->security->validatePassword($this->old_password, Yii::$app->user->identity->password_hash)){

            $this->addError($attribute,'Old Password is incorrect');
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'old_password' => 'Old Password',
        ];
    }

  
}
