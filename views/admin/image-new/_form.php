<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Images */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="images-form">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>


    <?= $form->field($model, 'imageFile')->fileInput(); ?>

    <?= $form->field($model, 'album')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
