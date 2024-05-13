<?php

use app\models\NotificationStatuses;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Notification Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notification-statuses-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Notification Statuses', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'notificationStatusId',
            'notificationStatusName',
            'comments:ntext',
            'createdTime',
            'updatedTime',
            //'deleted',
            //'deletedTime',
            //'createdBy',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, NotificationStatuses $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'notificationStatusId' => $model->notificationStatusId]);
                 }
            ],
        ],
    ]); ?>


</div>
