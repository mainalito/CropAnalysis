<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LaboratoryFindings $model */

$this->title = 'Update Laboratory Findings: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Laboratory Findings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="laboratory-findings-update p-2">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
