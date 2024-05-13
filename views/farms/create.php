<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Farms $model */

$this->title = 'Create Farms';
$this->params['breadcrumbs'][] = ['label' => 'Farms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="farms-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
