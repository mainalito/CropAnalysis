<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "parameters".
 *
 * @property int $id
 * @property int|null $natureOfAnalysisId
 * @property string $code
 * @property string $name
 * @property string $units
 * @property int $testMethodId
 * @property string|null $comments
 * @property string $createdTime
 * @property string|null $updatedTime
 * @property bool|null $deleted
 * @property string|null $deletedTime
 * @property int $createdBy
 *
 * @property Users $createdBy0
 * @property LaboratoryFindings[] $laboratoryFindings
 * @property NatureOfAnalysis $natureOfAnalysis
 * @property TestingMethods $testMethod
 */
class Parameters extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parameters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['natureOfAnalysisId', 'testMethodId', 'createdBy'], 'integer'],
            [['code', 'name', 'units', 'createdBy'], 'required'],
            [['comments'], 'string'],
            [['createdTime', 'updatedTime', 'deletedTime'], 'safe'],
            [['deleted'], 'boolean'],
            [['code'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 50],
            [['units'], 'string', 'max' => 8],
            [['natureOfAnalysisId'], 'exist', 'skipOnError' => true, 'targetClass' => NatureOfAnalysis::class, 'targetAttribute' => ['natureOfAnalysisId' => 'id']],
            [['testMethodId'], 'exist', 'skipOnError' => true, 'targetClass' => TestingMethods::class, 'targetAttribute' => ['testMethodId' => 'id']],
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
            'natureOfAnalysisId' => 'Nature Of Analysis ID',
            'code' => 'Code',
            'name' => 'Name',
            'units' => 'Units',
            'testMethodId' => 'Test Method',
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
     * @return ActiveQuery
     */
    public function getCreatedBy0()
    {
        return $this->hasOne(Users::class, ['id' => 'createdBy']);
    }

    /**
     * Gets query for [[LaboratoryFindings]].
     *
     * @return ActiveQuery
     */
    public function getLaboratoryFindings(): ActiveQuery
    {
        return $this->hasMany(LaboratoryFindings::class, ['parameterId' => 'id']);
    }

    /**
     * Gets query for [[NatureOfAnalysis]].
     *
     * @return ActiveQuery
     */
    public function getNatureOfAnalysis(): ActiveQuery
    {
        return $this->hasOne(NatureOfAnalysis::class, ['id' => 'natureOfAnalysisId']);
    }

    /**
     * Gets query for [[TestMethod]].
     *
     * @return ActiveQuery
     */
    public function getTestMethod(): ActiveQuery
    {
        return $this->hasOne(TestingMethods::class, ['id' => 'testMethodId']);
    }
}
