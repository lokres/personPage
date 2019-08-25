<?php

use yii\grid\GridView;
use yii\helpers\Html;
?>
<?=

GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'username',
        'email',
        'type',
        [
            'label' => 'Перейти',
            'format' => 'raw',
            'value' => function($data){
                return Html::a(
                    'Перейти',
                    ['admin/useredit', 'id' =>$data->id],
                    [
                        'title' => 'Редатикировть',
                    ]
                );
            }
        ],
        [
            'label' => 'Удалить',
            'format' => 'raw',
            'value' => function($data){
                return Html::a(
                    'Удалить',
                    ['admin/userdel', 'id' =>$data->id],
                    [
                        'title' => 'Удалить',
                    ]
                );
            }
        ],
    ],
])
?>