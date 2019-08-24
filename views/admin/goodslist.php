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
        'price',
        [
            'label' => 'Перейти',
            'format' => 'raw',
            'value' => function($data){
                return Html::a(
                    'Перейти',
                    ['admin/goodedit', 'id' =>$data->id],
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
                    ['admin/gooddel', 'id' =>$data->id],
                    [
                        'title' => 'Удалить',
                    ]
                );
            }
        ],
    ],
])
                
?>
<?= Html::button(Html::a('Добавить', ['admin/goodedit']),  [ 'title' => 'Добавить товар',
                    ], ['class' => 'teaser']) ?>