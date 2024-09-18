<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TestingMethods $model */

$this->title = 'Create Testing Methods';
$this->params['breadcrumbs'][] = ['label' => 'Testing Methods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testing-methods-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
