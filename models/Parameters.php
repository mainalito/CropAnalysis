<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parameters".
 *
 * @property int $id
 * @property int|null $natureOfAnalysisId
 * @property string $code
 * @property string $name
 * @property string|null $comments
 * @property string $createdTime
 * @property string|null $updatedTime
 * @property bool|null $deleted
 * @property string|null $deletedTime
 * @property int $createdBy
 *
 * @property Users $createdBy0
 * @property NatureOfAnalysis $natureOfAnalysis
 */
class Parameters extends \yii\db\ActiveRecord
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
            [['natureOfAnalysisId', 'createdBy'], 'integer'],
            [['code', 'name', 'createdBy'], 'required'],
            [['comments'], 'string'],
            [['createdTime', 'updatedTime', 'deletedTime'], 'safe'],
            [['deleted'], 'boolean'],
            [['code'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 50],
            [['natureOfAnalysisId'], 'exist', 'skipOnError' => true, 'targetClass' => NatureOfAnalysis::class, 'targetAttribute' => ['natureOfAnalysisId' => 'id']],
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
     * Gets query for [[NatureOfAnalysis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNatureOfAnalysis()
    {
        return $this->hasOne(NatureOfAnalysis::class, ['id' => 'natureOfAnalysisId']);
    }
}
