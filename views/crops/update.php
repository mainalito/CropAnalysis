<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Crops $model */
/** @var app\models\CropsCategory $categories */

$this->title = 'Update Crops: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Crops', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="crops-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categories' => $categories
    ]) ?>

</div>
