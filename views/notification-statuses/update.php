<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NotificationStatuses $model */

$this->title = 'Update Notification Statuses: ' . $model->notificationStatusId;
$this->params['breadcrumbs'][] = ['label' => 'Notification Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->notificationStatusId, 'url' => ['view', 'notificationStatusId' => $model->notificationStatusId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notification-statuses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
