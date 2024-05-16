<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crops".
 *
 * @property int $id
 * @property int $cropCategoryId
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
 * @property CropsCategory $cropCategory
 * @property CropRequirements[] $cropRequirements
 */
class Crops extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crops';
    }

    /**
     * Added by Paul Mburu
     * Filter Deleted Items
     */
    public static function find()
    {
        return parent::find()->andWhere(['=', 'crops.deleted', 0]);
    }

    /**
     * Added by Paul Mburu
     * To be executed before delete
     */
    public function delete()
    {
        $m = parent::findOne($this->getPrimaryKey());
        $m->deleted = Yii::$app->user->identity->id;
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
            $this->createdBy = 1;//Yii::$app->user->identity->id;
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
            [['cropCategoryId', 'code', 'name', 'createdBy'], 'required'],
            [['cropCategoryId', 'createdBy'], 'integer'],
            [['comments'], 'string'],
            [['createdTime', 'updatedTime', 'deletedTime'], 'safe'],
            [['deleted'], 'boolean'],
            [['code'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 50],
            [['cropCategoryId'], 'exist', 'skipOnError' => true, 'targetClass' => CropsCategory::class, 'targetAttribute' => ['cropCategoryId' => 'id']],
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
            'cropCategoryId' => 'Crop Category ID',
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
     * Gets query for [[CropCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCropCategory()
    {
        return $this->hasOne(CropsCategory::class, ['id' => 'cropCategoryId']);
    }

    /**
     * Gets query for [[CropRequirements]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCropRequirements()
    {
        return $this->hasMany(CropRequirements::class, ['cropId' => 'id']);
    }
}
