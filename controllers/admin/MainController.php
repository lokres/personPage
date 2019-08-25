<?php
namespace app\controllers\admin;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Goods;
use app\models\User;
use app\models\Cart;
use app\models\Order;
use app\models\Images;
use yii\helpers\Url;
use app\models\UploadForm;
use yii\web\UploadedFile;

class MainController extends Controller {
    public $layout = 'admin/main';
    /**
     * @inheritdoc
     */
    public function init()
    {
    }
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                
                'rules' => [
                    [
                 
                        'roles' => ['@'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->type == USER::TYPE_ADMIN;
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }
    public function actionUserlist(){
        $model = User::find();
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
        return $this->render('userlist', ['dataProvider' => $dataProvider]);
        
    }
    
    public function actionUseredit($id){
        $model = User::findOne(['id' => $id]);
        if(isset($_POST['User'])){
            $model->email = $_POST['User']['email'];
            $model->username = $_POST['User']['username'];
            $model->type = $_POST['User']['type'];
            $model->save();
        }
        return $this->render('edituser',['model' => $model]);
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
        return $this->render('imagelist', ['dataProvider' => $dataProvider]);
    }
}