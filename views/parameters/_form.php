<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Parameters $model */
/** @var yii\widgets\ActiveForm $form */
/** @var app\models\NatureOfAnalysis $nature */
/** @var app\models\TestingMethods $method */
?>

<div class="parameters-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'natureOfAnalysisId')->dropDownList($nature, ['prompt' => 'select nature of analysis']) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'units')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'testMethodId')->dropDownList($method, ['prompt' => 'select testing method']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
