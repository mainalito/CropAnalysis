<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NatureOfAnalysis $model */

$this->title = 'Create Nature Of Analysis';
$this->params['breadcrumbs'][] = ['label' => 'Nature Of Analyses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nature-of-analysis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
