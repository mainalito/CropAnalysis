<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CropRequirements $model */

$this->title = 'Add Crop Requirements';
$this->params['breadcrumbs'][] = ['label' => 'Crop Requirements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crop-requirements-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_requirements', [
        'model' => $model,
    ]) ?>

</div>
