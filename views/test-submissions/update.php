<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TestSubmissions $model */
/** @var app\models\Farms $farms */
/** @var app\models\TestingTypes $testing_types */
/** @var app\models\NatureOfAnalysis $nature_of_analysis */

$this->title = 'Update Test Submissions: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Test Submissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="test-submissions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'farms' => $farms,
        'testing_types' => $testing_types,
        'nature_of_analysis' => $nature_of_analysis
    ]) ?>

</div>
