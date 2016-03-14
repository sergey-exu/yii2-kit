<?php

namespace backend\modules\banner\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "banner".
 *
 * @property integer $id
 * @property string $name
 * @property string $link
 * @property string $status
 * @property string $img
 * @property string description
 * @property integer $type
 */
class Banner extends \yii\db\ActiveRecord
{
    const BANNER_PARTNER=1;
    const BANNER_SUPPORT=2;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','type'], 'required'],
            [['type'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 56],
            [['link'], 'string', 'max' => 512],
            [['status'], 'string', 'max' => 256],
            [['img'], 'file', 'extensions' => 'png, jpg, gif', 'mimeTypes' => 'image/jpeg, image/gif, image/png', 'on'=>'insert,update'],
        ];
    }
    
    
    public static function getTypeArray()
    {
        return [
            self::BANNER_PARTNER => Yii::t('backend', 'Partner'),
            self::BANNER_SUPPORT => Yii::t('backend', 'Support'),
        ];
    }
    
    public function getTypeName()
    {
        return ArrayHelper::getValue(self::getTypeArray(), $this->type);
    }

    
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            
            if($file = UploadedFile::getInstance($this, 'img'))
            {
                $imgPath= Yii::getAlias('@storage/banner/') . $this->img;
                if(is_file($imgPath)) 
                    unlink($imgPath);
                    
                $imgName = Yii::$app->getSecurity()->generateRandomString(8) . '.' . $file->extension;
                
                if (!file_exists(Yii::getAlias('@storage/banner/'))) {
                    mkdir(Yii::getAlias('@storage/banner/'), 0777, true);
                }
                
                $file->saveAs(Yii::getAlias('@storage/banner/') . $imgName, true);
                $this->img =  $imgName;
            }
            
            return true;
            
        } else {
            return false;
        }
    }
    

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            
            $imgPath= Yii::getAlias('@storage/banner/') . $this->img;
            if(is_file($imgPath)) 
                unlink($imgPath);
            
            return true;
        } else {
            return false;
        }
    }
    
    
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('backend' ,'Name'),
            'link' => Yii::t('backend' ,'Link'),
            'status' => Yii::t('backend' ,'Status'),
            'img' => Yii::t('backend' ,'Images'),
            'description' => Yii::t('backend' ,'Description'),
            'type' => Yii::t('backend' ,'Type'),
        ];
    }
}
