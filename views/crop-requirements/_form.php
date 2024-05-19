<?php

use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CropRequirements $model */
/** @var app\models\Crops $categories */
/** @var yii\widgets\ActiveForm $form */
?>
<div class="crop-requirements-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cropId')->dropDownList($categories, ['prompt' => 'Select Crop']) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
