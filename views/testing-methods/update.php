<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TestingMethods $model */

$this->title = 'Update Testing Methods: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Testing Methods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="testing-methods-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
