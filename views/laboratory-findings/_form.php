<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LaboratoryFindings $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="laboratory-findings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'submissionId')->hiddenInput()->label(false) ?>

    <div class="row">
        <div class="col"><?= $form->field($model, 'parameterId')->textInput() ?></div>
        <div class="col"><?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
