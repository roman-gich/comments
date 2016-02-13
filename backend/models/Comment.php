<?php

namespace backend\models;

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
class Comment extends \common\models\Comment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_active', 'value', 'user_name', 'user_email', 'created_at', 'updated_at'], 'required'],
            [['user_email'], 'email'],
            [['is_active'], 'integer'],
            [['value'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_name', 'user_email'], 'string', 'max' => 100],
        ];
    }
}
