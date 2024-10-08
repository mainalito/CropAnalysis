<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TestingMethods $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Testing Methods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="testing-methods-view">

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
            'code',
            'name',
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
