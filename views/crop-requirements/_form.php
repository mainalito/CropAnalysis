<?php

use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CropRequirements $model */
/** @var app\models\CropsCategory $categories */
/** @var yii\widgets\ActiveForm $form */
?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<div class="crop-requirements-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cropCategoryId')->dropDownList($categories, ['prompt' => 'Select Crop Category']) ?>

    <?= $form->field($model, 'cropId')->widget(DepDrop::classname(), [
        'data' => [$model->cropId => $model->cropCategoryId],
        'pluginOptions' => [
            'depends' => ['croprequirements-cropcategoryid'],
            'initialize' => !$model->isNewRecord,
            'placeholder' => 'Select Crops',
            'url' => Url::to(['/drop-downs/crops'])
        ]
    ]); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
