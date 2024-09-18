<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test_submissions".
 *
 * @property int $id
 * @property int $farmId
 * @property int $testingTypeId
 * @property int $natureOfAnalysisId
 * @property string|null $comments
 * @property string $createdTime
 * @property string|null $updatedTime
 * @property bool|null $deleted
 * @property string|null $deletedTime
 * @property int $createdBy
 *
 * @property Users $createdBy0
 * @property Farms $farm
 * @property LaboratoryFindings[] $laboratoryFindings
 * @property NatureOfAnalysis $natureOfAnalysis
 * @property TestingMethods $testingType
 */
class TestSubmissions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_submissions';
    }

    /**
     * Added by Paul Mburu
     * Filter Deleted Items
     */
    public static function find()
    {
        return parent::find()->andWhere(['=', 'test_submissions.deleted', 0]);
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
            [['farmId', 'testingTypeId', 'natureOfAnalysisId', 'createdBy'], 'required'],
            [['farmId', 'testingTypeId', 'natureOfAnalysisId', 'createdBy'], 'integer'],
            [['comments'], 'string'],
            [['createdTime', 'updatedTime', 'deletedTime'], 'safe'],
            [['deleted'], 'boolean'],
            [['farmId'], 'exist', 'skipOnError' => true, 'targetClass' => Farms::class, 'targetAttribute' => ['farmId' => 'id']],
            [['natureOfAnalysisId'], 'exist', 'skipOnError' => true, 'targetClass' => NatureOfAnalysis::class, 'targetAttribute' => ['natureOfAnalysisId' => 'id']],
            [['testingTypeId'], 'exist', 'skipOnError' => true, 'targetClass' => TestingMethods::class, 'targetAttribute' => ['testingTypeId' => 'id']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['createdBy' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'farmId' => 'Farm',
            'testingTypeId' => 'Testing Method',
            'natureOfAnalysisId' => 'Nature Of Analysis',
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
     * Gets query for [[Farm]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFarm()
    {
        return $this->hasOne(Farms::class, ['id' => 'farmId']);
    }

    /**
     * Gets query for [[LaboratoryFindings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaboratoryFindings()
    {
        return $this->hasMany(LaboratoryFindings::class, ['submissionId' => 'id']);
    }

    /**
     * Gets query for [[NatureOfAnalysis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNatureOfAnalysis()
    {
        return $this->hasOne(NatureOfAnalysis::class, ['id' => 'natureOfAnalysisId']);
    }

    /**
     * Gets query for [[TestingType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTestingType()
    {
        return $this->hasOne(TestingMethods::class, ['id' => 'testingTypeId']);
    }
}
