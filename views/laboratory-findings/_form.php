<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LaboratoryFindings $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="laboratory-findings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'submissionId')->textInput() ?>

    <?= $form->field($model, 'parameterId')->textInput() ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
