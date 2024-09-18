<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Parameters $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Parameters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="parameters-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Close', ['index'], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'natureOfAnalysis.name',
                'label' => 'Nature of Analysis'
            ],
            'code',
            'name',
            'units',
            [
                'attribute' => 'testMethod.name',
                'label' => 'Testing Method'
            ],
            [
                'attribute' => 'createdTime',
                'format' => ['date', 'php:d/m/Y h:i a'],
                'label' => 'Created Time'
            ],
            [
                'attribute' => 'createdBy0.username',
                'label' => 'Created By'
            ],
        ],
    ]) ?>

</div>
