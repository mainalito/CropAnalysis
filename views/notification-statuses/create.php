<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NotificationStatuses $model */

$this->title = 'Create Notification Statuses';
$this->params['breadcrumbs'][] = ['label' => 'Notification Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notification-statuses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
