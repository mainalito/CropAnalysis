<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $surname
 * @property string|null $otherNames
 * @property string $firstName
 * @property string $username
 * @property string $email
 * @property string $auth_key
 * @property string $verification_token
 * @property string $password_hash
 * @property int $shouldChangePassword
 * @property string $passwordChangeDate
 * @property string|null $password_reset_token
 * @property int $status
 * @property string|null $comments
 * @property string $createdTime
 * @property string|null $updatedTime
 * @property bool|null $deleted
 * @property string|null $deletedTime
 * @property int $createdBy
 *
 * @property CropRequirements[] $cropRequirements
 * @property Crops[] $crops
 * @property CropsCategory[] $cropsCategories
 * @property Farms[] $farms
 * @property NatureOfAnalysis[] $natureOfAnalyses
 * @property NotificationStatuses[] $notificationStatuses
 * @property Notifications[] $notifications
 * @property Parameters[] $parameters
 * @property PastPasswords[] $pastPasswords
 * @property Settings[] $settings
 * @property Templates[] $templates
 * @property TestingTypes[] $testingTypes
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * Added by Paul Mburu
     * Filter Deleted Items
     */
    public static function find()
    {
        return parent::find()->andWhere(['=', 'users.deleted', 0]);
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
            $this->status = 10;
            $this->shouldChangePassword = 0;
            $this->passwordChangeDate = date('Y-m-d');
            $this->auth_key = Yii::$app->security->generateRandomString();
            $this->verification_token = Yii::$app->security->generateRandomString();
            $this->password_hash = Yii::$app->security->generatePasswordHash('Kenya@1234');
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
            [['surname', 'firstName', 'username', 'email', 'auth_key', 'verification_token', 'password_hash', 'createdBy'], 'required'],
            [['shouldChangePassword', 'status', 'createdBy'], 'integer'],
            [['passwordChangeDate', 'createdTime', 'updatedTime', 'deletedTime'], 'safe'],
            [['comments'], 'string'],
            [['deleted'], 'boolean'],
            [['surname', 'otherNames', 'firstName', 'username', 'email'], 'string', 'max' => 50],
            [['auth_key'], 'string', 'max' => 32],
            [['verification_token', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surname' => 'Surname',
            'otherNames' => 'Other Names',
            'firstName' => 'First Name',
            'username' => 'Username',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'verification_token' => 'Verification Token',
            'password_hash' => 'Password Hash',
            'shouldChangePassword' => 'Should Change Password',
            'passwordChangeDate' => 'Password Change Date',
            'password_reset_token' => 'Password Reset Token',
            'status' => 'Status',
            'comments' => 'Comments',
            'createdTime' => 'Created Time',
            'updatedTime' => 'Updated Time',
            'deleted' => 'Deleted',
            'deletedTime' => 'Deleted Time',
            'createdBy' => 'Created By',
        ];
    }

    /**
     * Gets query for [[CropRequirements]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCropRequirements()
    {
        return $this->hasMany(CropRequirements::class, ['createdBy' => 'id']);
    }

    /**
     * Gets query for [[Crops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCrops()
    {
        return $this->hasMany(Crops::class, ['createdBy' => 'id']);
    }

    /**
     * Gets query for [[CropsCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCropsCategories()
    {
        return $this->hasMany(CropsCategory::class, ['createdBy' => 'id']);
    }

    /**
     * Gets query for [[Farms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFarms()
    {
        return $this->hasMany(Farms::class, ['createdBy' => 'id']);
    }

    /**
     * Gets query for [[NatureOfAnalyses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNatureOfAnalyses()
    {
        return $this->hasMany(NatureOfAnalysis::class, ['createdBy' => 'id']);
    }

    /**
     * Gets query for [[NotificationStatuses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotificationStatuses()
    {
        return $this->hasMany(NotificationStatuses::class, ['createdBy' => 'id']);
    }

    /**
     * Gets query for [[Notifications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notifications::class, ['createdBy' => 'id']);
    }

    /**
     * Gets query for [[Parameters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParameters()
    {
        return $this->hasMany(Parameters::class, ['createdBy' => 'id']);
    }

    /**
     * Gets query for [[PastPasswords]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPastPasswords()
    {
        return $this->hasMany(PastPasswords::class, ['userId' => 'id']);
    }

    /**
     * Gets query for [[Settings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSettings()
    {
        return $this->hasMany(Settings::class, ['createdBy' => 'id']);
    }

    /**
     * Gets query for [[Templates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTemplates()
    {
        return $this->hasMany(Templates::class, ['createdBy' => 'id']);
    }

    /**
     * Gets query for [[TestingTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTestingTypes()
    {
        return $this->hasMany(TestingTypes::class, ['createdBy' => 'id']);
    }
}
