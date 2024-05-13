<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NatureOfAnalysis $model */

$this->title = 'Update Nature Of Analysis: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Nature Of Analyses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nature-of-analysis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
