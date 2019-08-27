<?php
namespace app\controllers\admin;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

use app\models\Images;
use yii\helpers\Url;
use app\models\UploadForm;
use yii\web\UploadedFile;


class ImageController extends MainController {

    /**
     * @inheritdoc
     */

    public function behaviors()

    {
        return array_merge(
              parent::behaviors()
          );
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        
        
        $uploadModel = new UploadForm();

        if (Yii::$app->request->isPost) {
            $uploadModel->imageFiles = UploadedFile::getInstances($uploadModel, 'imageFiles');
            if ($uploadModel->upload()) {
                // file is uploaded successfully
                return;
            }
        }
        $model = Images::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $model,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);
        

        return $this->render('index', ['dataProvider' => $dataProvider, 'uploadModel' => $uploadModel]);
    }

    
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
    
    public function actionImageList(){

    }
    

}