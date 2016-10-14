<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "SD_employee".
 *
 * @property integer $ID
 * @property string $e_pin
 * @property string $e_name
 * @property string $e_sex
 * @property integer $e_age
 * @property string $e_idcard
 * @property string $e_mobile
 * @property string $e_dept_no
 * @property string $e_duty
 * @property string $e_class
 * @property string $e_title
 * @property string $e_pri
 * @property string $e_grp
 * @property string $e_tz
 * @property string $e_fingerprint
 * @property string $e_face
 * @property string $e_card
 * @property string $e_passwd
 * @property string $e_photo
 * @property string $e_checkin_dt
 * @property string $e_resign_dt
 * @property string $e_black_flag
 * @property integer $e_status
 *
 * @property SdLinkAreaEmployee[] $sdLinkAreaEmployees
 * @property SdArea[] $lAreas
 */
class SdEmployee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SD_employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['e_pin'], 'required'],
            [['e_age', 'e_status'], 'integer'],
            [['e_checkin_dt', 'e_resign_dt'], 'safe'],
            [['e_pin', 'e_idcard', 'e_mobile', 'e_class', 'e_title', 'e_tz', 'e_fingerprint', 'e_face', 'e_card', 'e_passwd'], 'string', 'max' => 32],
            [['e_name'], 'string', 'max' => 64],
            [['e_sex', 'e_pri', 'e_grp', 'e_black_flag'], 'string', 'max' => 8],
            [['e_dept_no', 'e_duty', 'e_photo'], 'string', 'max' => 255],
            [['e_pin'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'e_pin' => Yii::t('app', 'E Pin'),
            'e_name' => Yii::t('app', 'E Name'),
            'e_sex' => Yii::t('app', 'E Sex'),
            'e_age' => Yii::t('app', 'E Age'),
            'e_idcard' => Yii::t('app', 'E Idcard'),
            'e_mobile' => Yii::t('app', 'E Mobile'),
            'e_dept_no' => Yii::t('app', 'E Dept No'),
            'e_duty' => Yii::t('app', 'E Duty'),
            'e_class' => Yii::t('app', 'E Class'),
            'e_title' => Yii::t('app', 'E Title'),
            'e_pri' => Yii::t('app', 'E Pri'),
            'e_grp' => Yii::t('app', 'E Grp'),
            'e_tz' => Yii::t('app', 'E Tz'),
            'e_fingerprint' => Yii::t('app', 'E Fingerprint'),
            'e_face' => Yii::t('app', 'E Face'),
            'e_card' => Yii::t('app', 'E Card'),
            'e_passwd' => Yii::t('app', 'E Passwd'),
            'e_photo' => Yii::t('app', 'E Photo'),
            'e_checkin_dt' => Yii::t('app', 'E Checkin Dt'),
            'e_resign_dt' => Yii::t('app', 'E Resign Dt'),
            'e_black_flag' => Yii::t('app', 'E Black Flag'),
            'e_status' => Yii::t('app', 'E Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSdLinkAreaEmployees()
    {
        return $this->hasMany(SdLinkAreaEmployee::className(), ['l_employee_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLAreas()
    {
        return $this->hasMany(SdArea::className(), ['ID' => 'l_area_ID'])->viaTable('SD_link_area_employee', ['l_employee_ID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return SdEmployeeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SdEmployeeQuery(get_called_class());
    }
}
