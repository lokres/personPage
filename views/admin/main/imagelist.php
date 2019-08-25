<?php

use yii\grid\GridView;
use yii\helpers\Html;
?>
<?=

GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        'album',
        'order',
        [
            'label' => 'Перейти',
            'format' => 'raw',
            'value' => function($data){
                return Html::a(
                    'Перейти',
                    ['/admin/main/imageedit', 'id' =>$data->id],
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
                    ['/admin/main/imagedelete', 'id' =>$data->id],
                    [
                        'title' => 'Удалить',
                    ]
                );
            }
        ],
    ],
])
?>