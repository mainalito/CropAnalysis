<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crops_category".
 *
 * @property int $id
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
 * @property Crops[] $crops
 */
class CropsCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crops_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name', 'createdBy'], 'required'],
            [['comments'], 'string'],
            [['createdTime', 'updatedTime', 'deletedTime'], 'safe'],
            [['deleted'], 'boolean'],
            [['createdBy'], 'integer'],
            [['code'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 50],
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
     * Gets query for [[Crops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCrops()
    {
        return $this->hasMany(Crops::class, ['cropCategoryId' => 'id']);
    }
}
