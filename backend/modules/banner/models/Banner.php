<?php

namespace backend\modules\banner\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * This is the model class for table "banner".
 *
 * @property integer $id
 * @property string $name
 * @property string $link
 * @property string $status
 * @property string $img
 * @property string $content
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
            [['name', 'content', 'type'], 'required'],
            [['type'], 'integer'],
            [['content'], 'string'],
            [['name'], 'string', 'max' => 56],
            [['link'], 'string', 'max' => 512],
            [['status'], 'string', 'max' => 256],
            [['img'], 'file', 'extensions' => 'png, jpg, gif', 'mimeTypes' => 'image/jpeg, image/gif, image/png', 'on'=>'insert,update'],
        ];
    }
    

    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            
            if($file = UploadedFile::getInstance($this, 'img'))
            {
                $imgPath= Yii::getAlias('@frontend/web/img/partner/') . $this->img;
                if(is_file($imgPath)) 
                    unlink($imgPath);
                    
                $imgName = Yii::$app->getSecurity()->generateRandomString('8') . '.' . $file->extension;
                $file->saveAs(Yii::getAlias('@frontend/web/img/partner/') . $imgName);
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
            
            $imgPath= Yii::getAlias('@frontend/web/img/partner/') . $this->img;
            if(is_file($imgPath)) 
                unlink($imgPath);
            
            return true;
        } else {
            return false;
        }
    }
    
    
    private function deleteBanner()
    {
        
    }
    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'link' => 'Link',
            'status' => 'Status',
            'img' => 'Img',
            'content' => 'Content',
            'type' => 'Type',
        ];
    }
}
