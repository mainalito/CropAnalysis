<?php

use app\models\LaboratoryFindings;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Laboratory Findings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laboratory-findings-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Laboratory Findings', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'submissionId',
            'parameterId',
            'comments:ntext',
            'createdTime',
            //'updatedTime',
            //'deleted:boolean',
            //'deletedTime',
            //'createdBy',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, LaboratoryFindings $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
