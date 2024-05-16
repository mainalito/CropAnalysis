<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Crops $model */
/** @var app\models\CropsCategory $categories */

$this->title = 'Create Crops';
$this->params['breadcrumbs'][] = ['label' => 'Crops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crops-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categories' => $categories
    ]) ?>

</div>
