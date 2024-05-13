<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\NotificationStatuses $model */

$this->title = $model->notificationStatusId;
$this->params['breadcrumbs'][] = ['label' => 'Notification Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="notification-statuses-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'notificationStatusId' => $model->notificationStatusId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'notificationStatusId' => $model->notificationStatusId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'notificationStatusId',
            'notificationStatusName',
            'comments:ntext',
            'createdTime',
            'updatedTime',
            'deleted',
            'deletedTime',
            'createdBy',
        ],
    ]) ?>

</div>
