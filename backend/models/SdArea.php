<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "SD_area".
 *
 * @property integer $ID
 * @property string $a_sn
 * @property string $a_parent_sn
 * @property string $a_name
 * @property string $a_remark
 * @property integer $a_status
 *
 * @property SdLinkAreaEmployee[] $sdLinkAreaEmployees
 * @property SdEmployee[] $lEmployees
 * @property SdMachine[] $sdMachines
 */
class SdArea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SD_area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['a_sn', 'a_parent_sn', 'a_name'], 'required'],
            [['a_status'], 'integer'],
            [['a_sn', 'a_parent_sn', 'a_name', 'a_remark'], 'string', 'max' => 255],
            [['a_sn'], 'unique'],
            [['a_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'a_sn' => Yii::t('app', 'A Sn'),
            'a_parent_sn' => Yii::t('app', 'A Parent Sn'),
            'a_name' => Yii::t('app', 'A Name'),
            'a_remark' => Yii::t('app', 'A Remark'),
            'a_status' => Yii::t('app', 'A Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdLinkAreaEmployees()
    {
        return $this->hasMany(SdLinkAreaEmployee::className(), ['l_area_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLEmployees()
    {
        return $this->hasMany(SdEmployee::className(), ['ID' => 'l_employee_ID'])->viaTable('SD_link_area_employee', ['l_area_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdMachines()
    {
        return $this->hasMany(SdMachine::className(), ['m_area_ID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return SdAreaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SdAreaQuery(get_called_class());
    }
}
