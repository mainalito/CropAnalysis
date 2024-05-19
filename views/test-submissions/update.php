<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TestSubmissions $model */

$this->title = 'Update Test Submissions: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Test Submissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="test-submissions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
