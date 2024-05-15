<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NotificationStatuses $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="notification-statuses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'notificationStatusId')->textInput() ?>

    <?= $form->field($model, 'notificationStatusName')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
