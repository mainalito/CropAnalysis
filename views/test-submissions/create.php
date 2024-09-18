<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TestSubmissions $model */
/** @var app\models\Farms $farms */
/** @var app\models\TestingMethods $testing_types */
/** @var app\models\NatureOfAnalysis $nature_of_analysis */

$this->title = 'Create Test Submissions';
$this->params['breadcrumbs'][] = ['label' => 'Test Submissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-submissions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'farms' => $farms,
        'testing_types' => $testing_types,
        'nature_of_analysis' => $nature_of_analysis
    ]) ?>

</div>
