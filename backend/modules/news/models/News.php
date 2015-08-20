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
            [['created_at', 'updated_at'], 'integer'],
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
            'title' => Yii::t('backend', 'Title'),
            'summary' => Yii::t('backend', 'Summary'),
            'text' => Yii::t('backend', 'Text'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'publish_at' => Yii::t('backend', 'Publish At'),
            'meta_title' => Yii::t('backend', 'Meta Title'),
            'meta_description' => Yii::t('backend', 'Meta Description'),
            'alias' => Yii::t('backend', 'Alias'),
        ];
    }
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (!empty($this->publish_at)) {
                $this->publish_at = Yii::$app->formatter->asTimestamp($this->publish_at);
            } else {
                $this->publish_at = $this->created_at;
            }
            return true;
        }
        return false;
    }
    
    public function afterFind()
    {
        $this->publish_at = Yii::$app->formatter->asDate($this->publish_at, 'dd.MM.yyyy');
        return true;
    }
}
