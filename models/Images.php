<?php

namespace app\models;

use Yii;
use yii\imagine\Image;
/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property string $name
 * @property string $album
 * @property int $order
 * @property int $upload
 */
class Images extends \yii\db\ActiveRecord
{
    public $imageFile;
    public $width;
    public $height;
    public $thumbWidth;
    public $thumbHeight;
    const IMAGE_PATH = '@web/images/full/';
    const THUMB_PATH = '@web/images/thumb/';
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'album', 'upload'], 'required'],
            [['order', 'upload'], 'integer'],
            [['name', 'album'], 'string', 'max' => 32],
            [['name'], 'unique'],
            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'album' => 'Album',
            'order' => 'Order',
            'upload' => 'Upload',
        ];
    }
    
    public function setSize()
    {
        $path = Yii::getAlias('@app/web/images/full/'.$this->name);
        $info = getimagesize($path);
 
        $this->width = $info[0];
        $this->height = $info[1];
        if($this->width  > 150) {
           $this->thumbWidth = 150;
           $this->thumbHeight = $this->height/($this->width/$this->thumbWidth);
       } 
       else
       {
           $this->thumbWidth = $this->width;
           $this->thumbHeight = $this->height;
       }
    }
    
}
