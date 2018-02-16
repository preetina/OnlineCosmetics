<?php
namespace common\models;

use yii\base\Model;
use yii\base\InvalidParamException;
use common\models\User;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $email;

   
    public function rules()
    {
        return [
            ['email', 'required'],
           
        ];
    }

}  