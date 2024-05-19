<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laboratory_findings".
 *
 * @property int $id
 * @property int|null $submissionId
 * @property int|null $parameterId
 * @property string|null $comments
 * @property string $createdTime
 * @property string|null $updatedTime
 * @property bool|null $deleted
 * @property string|null $deletedTime
 * @property int $createdBy
 *
 * @property Users $createdBy0
 * @property Parameters $parameter
 * @property TestSubmissions $submission
 */
class LaboratoryFindings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laboratory_findings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['submissionId', 'parameterId', 'createdBy'], 'integer'],
            [['comments'], 'string'],
            [['createdTime', 'updatedTime', 'deletedTime'], 'safe'],
            [['deleted'], 'boolean'],
            [['createdBy'], 'required'],
            [['submissionId'], 'exist', 'skipOnError' => true, 'targetClass' => TestSubmissions::class, 'targetAttribute' => ['submissionId' => 'id']],
            [['parameterId'], 'exist', 'skipOnError' => true, 'targetClass' => Parameters::class, 'targetAttribute' => ['parameterId' => 'id']],
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
            'submissionId' => 'Submission',
            'parameterId' => 'Parameter',
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
     * Gets query for [[Parameter]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParameter()
    {
        return $this->hasOne(Parameters::class, ['id' => 'parameterId']);
    }

    /**
     * Gets query for [[Submission]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubmission()
    {
        return $this->hasOne(TestSubmissions::class, ['id' => 'submissionId']);
    }
}
