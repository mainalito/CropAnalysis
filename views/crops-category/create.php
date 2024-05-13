<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CropsCategory $model */

$this->title = 'Create Crops Category';
$this->params['breadcrumbs'][] = ['label' => 'Crops Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crops-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
