<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TestSubmissions $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="test-submissions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'farmId')->textInput() ?>

    <?= $form->field($model, 'testingTypeId')->textInput() ?>

    <?= $form->field($model, 'natureOfAnalysisId')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
