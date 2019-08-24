<?php
namespace app\controllers;
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
use yii\helpers\Url;
class AdminController extends Controller {
    public $layout = 'admin';
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
                        'actions' => ['userlist', 'index', 'useredit', 'goodslist', 'goodedit', 'userdel', 'gooddel'],
                        'roles' => ['@'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            return User::isUserAdmin(Yii::$app->user->identity->type);
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
    
    public function actionGoodslist(){
        $model = Goods::find();
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
         return $this->render('goodslist', ['dataProvider' => $dataProvider]);
    }
    
    public function actionGoodedit($id = null){
        if($id){
            $model = Goods::findOne(['id' => $id]);
            if(isset($_POST['Goods'])){
                $model->desc = $_POST['Goods']['desc'];
                $model->price = $_POST['Goods']['price'];
                $model->name = $_POST['Goods']['name'];
                $model->save();
            }
        }
        else
        {
            $model = new Goods();
            if(isset($_POST['Goods'])){
                $model->desc = $_POST['Goods']['desc'];
                $model->price = $_POST['Goods']['price'];
                $model->name = $_POST['Goods']['name'];
                $model->save();
            }
        }
        return $this->render('editgood',['model' => $model]);
    }
    
    public function actionUserdel($id){
        $model = User::deleteAll(['id' => $id]);
        $this->redirect(Url::to(['admin/userlist']));
    }
    
    public function actionGooddel($id){
        $model = Goods::deleteAll(['id' => $id]);
        $this->redirect(Url::to(['admin/goodslist']));
    }
}