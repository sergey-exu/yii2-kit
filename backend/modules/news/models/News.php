<?php

namespace backend\modules\news\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $summary
 * @property string $text
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $publish_at
 * @property integer $meta_title
 * @property integer $meta_description
 * @property string $alias
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
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
            [['title', 'summary', 'text', 'meta_title', 'meta_description', 'alias'], 'required'],
            [['title', 'meta_title', 'meta_description', 'alias'], 'string'],
            [['created_at', 'updated_at', 'publish_at'], 'integer'],
            ['publish_at', 'default', 'value' => 0], //временно. нужно допилить
            [['alias'], 'unique'],
            [['title'], 'string', 'max' => 256],
            [['alias'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'summary' => 'Summary',
            'text' => 'Text',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'publish_at' => 'Publish At',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'alias' => 'Alias',
        ];
    }
}
