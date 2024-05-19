<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TestSubmissions $model */

$this->title = 'Create Test Submissions';
$this->params['breadcrumbs'][] = ['label' => 'Test Submissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-submissions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
