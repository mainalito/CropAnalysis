<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CropsCategory $model */

$this->title = 'Update Crops Category: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Crops Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="crops-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
