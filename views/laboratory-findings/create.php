<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LaboratoryFindings $model */

$this->title = 'Create Laboratory Findings';
$this->params['breadcrumbs'][] = ['label' => 'Laboratory Findings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laboratory-findings-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
