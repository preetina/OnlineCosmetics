<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $first_name 
* @property string $last_name 
* @property string $address 
* @property string $phone 
* @property integer $mobile 
* @property string $auth_key 
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 * * @property integer $type
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
           
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
             [['username', 'first_name', 'last_name', 'address', 'phone', 'mobile',  'email','password','dob','gender'], 'required'],
           [['mobile','status', 'created_at', 'updated_at', 'type'], 'integer'],
           [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
           [['first_name', 'last_name'], 'string', 'max' => 50],
           [['address'], 'string', 'max' => 100],
           [['phone'], 'string', 'max' => 150],
           [['image'], 'string', 'max' => 150],
           [['gender'], 'string', 'max' => 12],
           [['auth_key'], 'string', 'max' => 32],
           [['username'], 'unique'],

           [['email'], 'unique'],
           [['email'], 'email'],
           [['password_reset_token'], 'unique'],
           [['username','address','phone','mobile','email'],'required','on'=>'UpdateProfile'],
           
];
    }

    public function scenarios()
    {
        $scenarios=parent::scenarios();
        $scenarios['UpdateProfile']=['username','address','phone','mobile','email'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
     public function attributeLabels()
    {
        return [
            'id' => 'ID',
		           'username' => 'Username',
		           'first_name' => 'First Name',
		           'last_name' => 'Last Name',
                   'password'=>'Password',
                   'dob'=>'DOB',
                   'gender'=>'Gender',
		           'address' => 'Address',
		           'phone' => 'Phone',
		           'mobile' => 'Mobile',
		           'auth_key' => 'Auth Key',
		           'password_hash' => 'Password Hash',
		           'password_reset_token' => 'Password Reset Token',
		           'email' => 'Email',
                   'image'=>'Image',
		           'status' => 'Status',
		           'created_at' => 'Created At',
		           'updated_at' => 'Updated At',
		           'type' => 'Type',
                   'mobphone'=>'Mobile/Phone'
        ];
    }
    public function saveImage(){
   $this->image = UploadedFile::getInstance($this,'image');
   if(is_object($this->image)){
        $imageName =  $this->image->baseName . '.' . $this->image->extension;
        $this->image->saveAs('uploads/user/'.$imageName);
        return $this->image = $imageName;
   }else{
       return $this->image = $this->oldAttributes['image'];
   }
   return false;
}
public function getFullName(){
    return $this->first_name.' '.$this->last_name;
}
public function getContact(){
    return $this->phone.', '.$this->mobile;
}


}
