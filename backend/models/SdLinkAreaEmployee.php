<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "SD_link_area_employee".
 *
 * @property integer $ID
 * @property integer $l_area_ID
 * @property integer $l_employee_ID
 * @property integer $l_status
 *
 * @property SdArea $lArea
 * @property SdEmployee $lEmployee
 */
class SdLinkAreaEmployee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SD_link_area_employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['l_area_ID', 'l_employee_ID'], 'required'],
            [['l_area_ID', 'l_employee_ID', 'l_status'], 'integer'],
            [['l_area_ID', 'l_employee_ID'], 'unique', 'targetAttribute' => ['l_area_ID', 'l_employee_ID'], 'message' => 'The combination of L Area  ID and L Employee  ID has already been taken.'],
            [['l_area_ID'], 'exist', 'skipOnError' => true, 'targetClass' => SdArea::className(), 'targetAttribute' => ['l_area_ID' => 'ID']],
            [['l_employee_ID'], 'exist', 'skipOnError' => true, 'targetClass' => SdEmployee::className(), 'targetAttribute' => ['l_employee_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'l_area_ID' => Yii::t('app', 'L Area  ID'),
            'l_employee_ID' => Yii::t('app', 'L Employee  ID'),
            'l_status' => Yii::t('app', 'L Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLArea()
    {
        return $this->hasOne(SdArea::className(), ['ID' => 'l_area_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLEmployee()
    {
        return $this->hasOne(SdEmployee::className(), ['ID' => 'l_employee_ID']);
    }

    /**
     * @inheritdoc
     * @return SdLinkAreaEmployeeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SdLinkAreaEmployeeQuery(get_called_class());
    }
}
