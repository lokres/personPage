<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = \Yii::t('app', 'index_h1');
?>
<div class="site-about">	

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= \Yii::t('app', 'index_p1') ?>
    </p>

    <p>
       <?= \Yii::t('app', 'index_p2') ?>
        
    </p>
    <h3><?= \Yii::t('app', 'index_h2') ?></h3>
    <p>
        <?= \Yii::t('app', 'index_p3') ?>
    </p>
    <h3><?= \Yii::t('app', 'index_h3') ?></h3>
    <p>
        <?= \Yii::t('app', 'index_p4') ?>
    </p>
    <h3><?= \Yii::t('app', 'index_h4') ?></h3>
    <p>
        <?= \Yii::t('app', 'index_p5') ?>
    </p>
</div>