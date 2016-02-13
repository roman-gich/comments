<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property integer $is_active
 * @property string $value
 * @property string $user_name
 * @property string $user_email
 * @property string $created_at
 * @property string $updated_at
 */
class Comment extends \yii\db\ActiveRecord
{
    public $captcha;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['captcha', 'is_active', 'value', 'user_name', 'user_email', 'created_at', 'updated_at'], 'required'],
            [['user_email'], 'email'],
            [['is_active'], 'integer'],
            [['value'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_name', 'user_email'], 'string', 'max' => 100],
            [['captcha'], 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'is_active' => 'Status',
            'value' => 'Comment',
            'user_name' => 'User Name',
            'user_email' => 'User Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'captcha' => 'Type the text in the image',
        ];
    }
    
}
