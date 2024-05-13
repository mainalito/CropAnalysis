<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crop_requirements".
 *
 * @property int $id
 * @property int $cropId
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
 * @property Crops $crop
 */
class CropRequirements extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crop_requirements';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cropId', 'code', 'name', 'createdBy'], 'required'],
            [['id', 'cropId', 'createdBy'], 'integer'],
            [['comments'], 'string'],
            [['createdTime', 'updatedTime', 'deletedTime'], 'safe'],
            [['deleted'], 'boolean'],
            [['code'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 50],
            [['id'], 'unique'],
            [['cropId'], 'exist', 'skipOnError' => true, 'targetClass' => Crops::class, 'targetAttribute' => ['cropId' => 'id']],
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
            'cropId' => 'Crop ID',
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
     * Gets query for [[Crop]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCrop()
    {
        return $this->hasOne(Crops::class, ['id' => 'cropId']);
    }
}