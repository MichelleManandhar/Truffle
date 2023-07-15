<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mobile', 'is_active',  'created_by'], 'integer'],
            [['created_at'], 'safe'],
            [['encrypt'], 'string'],
            [['name', 'email'], 'string', 'max' => 60],
            [['address'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 128],
            [['role'], 'string', 'max' => 32],
            [['position'], 'string', 'max' => 30],
            [['profile_picture'], 'string', 'max' => 255]
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
            'address' => 'Address',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
            'role' => 'Role',
            'position' => 'Position',
            'is_active' => 'Is Active',
            'created_at' => 'Create On',
            'created_by' => 'Create By',
            'updated_at' => 'Update On',
            'profile_picture' => 'Profile Picture',
            'encrypt' => 'Encrypt',
        ];
    }

    public static function getUsers()
    {
        $users = Yii::$app->db->createCommand('SELECT * FROM `user` WHERE is_active = 1')->queryAll();
        return $users;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'is_active' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
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
        return; // $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return; // $this->getAuthKey() === $authKey;
    }

    
    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $users = self::getUsers();
        foreach ($users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

}
