<?php

namespace backend\modules\log\models;

use Yii;

/**
 * This is the model class for table "system_log".
 *
 * @property integer $id
 * @property integer $level
 * @property string $category
 * @property double $log_time
 * @property string $prefix
 * @property string $message
 */
class SystemLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level'], 'integer'],
            [['log_time'], 'number'],
            [['prefix', 'message'], 'string'],
            [['category'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'level' => Yii::t('backend', 'Level'),
            'category' => Yii::t('backend', 'Category'),
            'log_time' => Yii::t('backend', 'Log Time'),
            'prefix' => Yii::t('backend', 'Prefix'),
            'message' => Yii::t('backend', 'Message'),
        ];
    }
}
