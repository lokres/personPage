<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use app\models\Images;
use yii\imagine\Image;
use YII;
class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;
    public $album;
    public $order;
    public $name;
    
    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }
    
    public function upload()
    {

        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $file->saveAs(Images::IMAGE_PATH . $file->baseName . '.' . $file->extension);
                Image::thumbnail(Images::IMAGE_PATH. $file->baseName . '.' . $file->extension, 130, 100)
                ->save(Yii::getAlias(Images::THUMB_PATH. $file->baseName . '.' . $file->extension));
                
                $model = new Images();
                $model->name = $file->baseName . '.' . $file->extension;
                $model->album = 'certificate';
                $model->order = 0;
                $model->upload = time();
                $model->save();
                
            }
            return true;
        } else {
            return false;
        }
    }
}