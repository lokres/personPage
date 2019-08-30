<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'About';
$this->params['breadcrumbs'][] = \Yii::t('app', 'about');
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        echo \kowap\lightgallery\LightGalleryWidget::widget([
        'items' => $images,
        // more options http://sachinchoolur.github.io/lightGallery/docs/api.html
        'options' => [
            'mode' => 'lg-fade',
            'download' => false,
            'zoom' => true,
            'share' => false
        ]
    ]);
    
    ?>

</div>
