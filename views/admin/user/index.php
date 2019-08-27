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
        ['class' => 'yii\grid\ActionColumn'],
    ],
])
?>