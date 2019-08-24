<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'Mikheev Person Page';
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Это моя персональная страница созданная для совершенствования навыков в yii фреймворке и расширения кругозора в веб разработке. Сайт написан на php,js,jquery,html,css + composer и 
        git
    </p>

    <p>
        Всего на сайте сейчас предствлено 3 страницы включая эту.
        
    </p>
    <h3>About</h3>
    <p>
        <a href="<?= Yii::$app->urlManager->createUrl([Yii::$app->controller->id . '/about'] , null)?>">На этой странице</a> можно посмотреть все полученные мной дипломы и сертификаты
    </p>
    <h3>Contact</h3>
    <p>
        <a href="<?= Yii::$app->urlManager->createUrl([Yii::$app->controller->id . '/contact'] , null)?>">На этой странице</a> можно 
        связаться со мной
    </p>
    <h3>Repositories</h3>
    <p>
        <a href="https://github.com/lokres/personPage">Git страница</a> проекта
    </p>
</div>