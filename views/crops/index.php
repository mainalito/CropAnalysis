<?php

use app\models\Crops;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Crops';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crops-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Crops', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'cropCategory.name',
                'label' => 'Crop Category'
            ],
            'code',
            'name',
            [
                'attribute' => 'createdBy0.username',
                'label' => 'Created By'
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Crops $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
