<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\TestSubmissions $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Test Submissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="test-submissions-view">

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
    <div class="card">
        <hr>
        <div class="card-header"><h3>Farm Details</h3></div>
        <div class="row">
            <div class="col-6">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'farmId',
                        [
                            'attribute' => 'farm.name',
                            'label' => 'Farm Name',
                        ],
                    ],
                ]) ?>
            </div>
            <div class="col-6">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        [
                            'attribute' => 'farm.coordinates',
                            'label' => 'Farm Coordinates',
                        ],
                        [
                            'attribute' => 'farm.altitude',
                            'label' => 'Farm Altitude',
                        ],
                    ],
                ]) ?>
            </div>
        </div>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'createdTime',
                    'label' => 'Date of Sampling',
                    'format' => ['date', 'php:d-M-Y'],
                ],
                [
                    'attribute' => 'testingType.name',
                    'label' => 'Testing Type',
                ],
                [
                    'attribute' => 'natureOfAnalysis.name',
                    'label' => 'Nature of Analysis',
                ],
            ],
        ]) ?>
        <hr>
        <div class="card-header"><h3>Parameters Tested and Findings</h3></div>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                [
                    'attribute' => 'parameter.name',
                    'label' => 'Parameter',
                ],
                [
                    'attribute' => 'comments',
                    'label' => 'Findings',
                ],
            ],
        ]); ?>
    </div>
</div>
