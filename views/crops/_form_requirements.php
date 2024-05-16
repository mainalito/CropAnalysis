<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CropRequirements $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="crop-requirements-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cropId')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Close', ['view', 'id' => $model->cropId], ['class' => 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
