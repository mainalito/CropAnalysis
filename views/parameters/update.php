<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Parameters $model */
/** @var app\models\NatureOfAnalysis $nature */
/** @var app\models\TestingMethods $method */

$this->title = 'Update Parameters: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Parameters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="parameters-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'nature' => $nature,
        'method' => $method
    ]) ?>

</div>
