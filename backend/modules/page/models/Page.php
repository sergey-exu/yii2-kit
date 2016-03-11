<?php

namespace backend\modules\page\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $title
 * @property string $content
 * @property string $meta_title
 * @property string $meta_description
 * @property string $alias
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }


    public function behaviors()
    {
        return [
            'class' => TimestampBehavior::className(),
        ];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'meta_title', 'meta_description', 'alias'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['alias'], 'unique'],
            [['meta_title', 'alias'], 'string', 'max' => 256],
            [['meta_description'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'title' => Yii::t('backend', 'Title'),
            'content' => Yii::t('backend', 'Page Content'),
            'meta_title' => Yii::t('backend', 'Meta Title'),
            'meta_description' => Yii::t('backend', 'Meta Description'),
            'alias' => Yii::t('backend', 'Alias'),
        ];
    }
}
