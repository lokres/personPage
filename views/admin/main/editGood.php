<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

 $form = ActiveForm::begin([
        'id' => 'registration-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'price')->input('price'); ?>
        <?= $form->field($model, 'desc')->textarea(); ?>


        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Обновить запись', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>