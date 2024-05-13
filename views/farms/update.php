<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Farms $model */

$this->title = 'Update Farms: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Farms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="farms-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
