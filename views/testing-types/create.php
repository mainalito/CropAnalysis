<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TestingTypes $model */

$this->title = 'Create Testing Types';
$this->params['breadcrumbs'][] = ['label' => 'Testing Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testing-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
