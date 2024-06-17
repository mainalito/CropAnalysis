<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LaboratoryFindings $model */
/** @var app\models\Parameters $parameters */
/** @var app\models\TestSubmissions  $test_submission */

$this->title = 'Add Laboratory Findings';
$this->params['breadcrumbs'][] = ['label' => 'Laboratory Findings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laboratory-findings-create p-2">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'parameters' => $parameters,
        'test_submission' => $test_submission,
    ]) ?>

</div>
