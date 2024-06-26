<?php

use app\models\TestSubmissions;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Test Submissions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-submissions-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Test Submissions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'farm.name',
                'label' => 'Farm Name',
            ],
            [
                'attribute' => 'testingType.name',
                'label' => 'Testing Type',
            ],
            [
                'attribute' => 'natureOfAnalysis.name',
                'label' => 'Nature of Analysis',
            ],
            [
                'attribute' => 'createdTime',
                'label' => 'Created Time',
                'format' => ['date', 'php:Y-m-d H:i:s']
            ],
            [
                'attribute' => 'createdBy0.username',
                'label' => 'Created By',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TestSubmissions $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
