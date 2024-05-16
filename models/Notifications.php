<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notifications".
 *
 * @property int $notificationId
 * @property string|null $email
 * @property string|null $subject
 * @property string|null $message
 * @property int|null $notificationStatusId
 * @property string|null $comments
 * @property string|null $createdTime
 * @property string|null $updatedTime
 * @property int|null $deleted
 * @property string|null $deletedTime
 * @property int|null $createdBy
 *
 * @property Users $createdBy0
 * @property NotificationStatuses $notificationStatus
 */
class Notifications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notifications';
    }

    /**
     * Added by Paul Mburu
     * Filter Deleted Items
     */
    public static function find()
    {
        return parent::find()->andWhere(['=', 'notifications.deleted', 0]);
    }

    /**
     * Added by Paul Mburu
     * To be executed before delete
     */
    public function delete()
    {
        $m = parent::findOne($this->getPrimaryKey());
        $m->deleted = 1;
        $m->deletedTime = date('Y-m-d H:i:s');
        return $m->save();
    }

    /**
     * Added by Paul Mburu
     * To be executed before Save
     */
    public function save($runValidation = true, $attributeNames = null)
    {
        $model = new User();
        //this record is always new
        if ($this->isNewRecord) {
            $this->createdBy = Yii::$app->user->identity->id;
            $this->createdTime = date('Y-m-d h:i:s');
        }
        return parent::save();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'message', 'comments'], 'string'],
            [['notificationStatusId', 'deleted', 'createdBy'], 'integer'],
            [['createdTime', 'updatedTime', 'deletedTime'], 'safe'],
            [['subject'], 'string', 'max' => 255],
            [['notificationStatusId'], 'exist', 'skipOnError' => true, 'targetClass' => NotificationStatuses::class, 'targetAttribute' => ['notificationStatusId' => 'notificationStatusId']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['createdBy' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'notificationId' => 'Notification ID',
            'email' => 'Email',
            'subject' => 'Subject',
            'message' => 'Message',
            'notificationStatusId' => 'Notification Status ID',
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
     * Gets query for [[NotificationStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotificationStatus()
    {
        return $this->hasOne(NotificationStatuses::class, ['notificationStatusId' => 'notificationStatusId']);
    }
}
