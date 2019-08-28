<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Images;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ImagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Images');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="images-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Images'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'format' => 'image',
                'value'=>function($data) { return Images::THUMB_PATH.$data->name; },
            ],

            'name',
            'album',
            'order',
            'upload',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
