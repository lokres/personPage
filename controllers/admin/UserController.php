<?php
namespace app\controllers\admin;

use app\models\User;
use yii\data\ActiveDataProvider;
use Yii;
class UserController extends MainController {

    
    public function behaviors()

    {
        return array_merge(
              parent::behaviors()
          );
    }
    public function actionIndex() {
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
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionUpdate($id)
    {
        $model = User::findOne(['id' => $id]);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if($model->password)
                    $model->setPassword(trim($model->password));
                $model->save();
            }
        }

        return $this->render('userEditNew', [
            'model' => $model,
        ]);
    }
}