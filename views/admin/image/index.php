<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Images as Image;
?>
<?=

GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [

            'format' => 'image',
            'value'=>function($data) { return Image::THUMB_PATH.$data->name; },

        ],
        'name',
                    
        'album',
        'order',
        ['class' => 'yii\grid\ActionColumn'],

    ],
])
?>


<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($uploadModel, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>