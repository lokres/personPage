<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = Yii::t('app', 'Update User: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'status') ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'auth_key') ?>
        <?= $form->field($model, 'password') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'created_at') ?>
        <?= $form->field($model, 'updated_at') ?>
        <?= $form->field($model, 'type') ?>
        <?= $form->field($model, 'password_reset_token') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
