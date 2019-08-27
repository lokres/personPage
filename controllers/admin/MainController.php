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
use app\models\Cart;
use app\models\Order;
use app\models\Images;
use yii\helpers\Url;
use app\models\UploadForm;
use yii\web\UploadedFile;
use app\models\User;

class MainController extends Controller {
    public $layout = 'admin/main';
    /**
     * @inheritdoc
     */

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

    

    
    

}