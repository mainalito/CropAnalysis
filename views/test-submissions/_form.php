<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TestSubmissions $model */
/** @var app\models\Farms $farms */
/** @var app\models\TestingMethods $testing_types */
/** @var app\models\NatureOfAnalysis $nature_of_analysis */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="test-submissions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'farmId')->dropDownList($farms, ['prompt' => 'Select Farm']) ?>

    <?= $form->field($model, 'testingTypeId')->dropDownList($testing_types, ['prompt' => 'Select Testing Types']) ?>

    <?= $form->field($model, 'natureOfAnalysisId')->dropDownList($nature_of_analysis, ['prompt' => 'Select Nature of Analysis']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save & Next', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
