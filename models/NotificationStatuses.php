<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notification_statuses".
 *
 * @property int $notificationStatusId
 * @property string|null $notificationStatusName
 * @property string|null $comments
 * @property string|null $createdTime
 * @property string|null $updatedTime
 * @property int|null $deleted
 * @property string|null $deletedTime
 * @property int $createdBy
 *
 * @property Users $createdBy0
 * @property Notifications[] $notifications
 */
class NotificationStatuses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notification_statuses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['notificationStatusId', 'createdBy'], 'required'],
            [['notificationStatusId', 'deleted', 'createdBy'], 'integer'],
            [['comments'], 'string'],
            [['createdTime', 'updatedTime', 'deletedTime'], 'safe'],
            [['notificationStatusName'], 'string', 'max' => 100],
            [['notificationStatusId'], 'unique'],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['createdBy' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'notificationStatusId' => 'Notification Status ID',
            'notificationStatusName' => 'Notification Status Name',
            'comments' => 'Comments',
            'createdTime' => 'Created Time',
            'updatedTime' => 'Updated Time',
            'deleted' => 'Deleted',
            'deletedTime' => 'Deleted Time',
            'createdBy' => 'Created By',
        ];
    }

    /**
     * Gets query for [[CreatedBy0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy0()
    {
        return $this->hasOne(Users::class, ['id' => 'createdBy']);
    }

    /**
     * Gets query for [[Notifications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notifications::class, ['notificationStatusId' => 'notificationStatusId']);
    }
}
