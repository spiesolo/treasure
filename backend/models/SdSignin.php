<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sd_signin".
 *
 * @property integer $ID
 * @property string $s_owner_pin
 * @property string $s_signtime
 * @property integer $s_workstatus
 * @property integer $s_verifytype
 * @property integer $s_workcode
 * @property string $s_machinesn
 * @property string $s_owner_name
 * @property string $s_owner_deptno
 * @property string $s_owner_deptname
 * @property integer $s_status
 */
class SdSignin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_signin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['s_owner_pin', 's_signtime', 's_workstatus', 's_verifytype', 's_workcode'], 'required'],
            [['s_signtime'], 'safe'],
            [['s_workstatus', 's_verifytype', 's_workcode', 's_status'], 'integer'],
            [['s_owner_pin'], 'string', 'max' => 32],
            [['s_machinesn', 's_owner_name'], 'string', 'max' => 64],
            [['s_owner_deptno', 's_owner_deptname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            's_owner_pin' => Yii::t('app', 'S Owner Pin'),
            's_signtime' => Yii::t('app', 'S Signtime'),
            's_workstatus' => Yii::t('app', 'S Workstatus'),
            's_verifytype' => Yii::t('app', 'S Verifytype'),
            's_workcode' => Yii::t('app', 'S Workcode'),
            's_machinesn' => Yii::t('app', 'S Machinesn'),
            's_owner_name' => Yii::t('app', 'S Owner Name'),
            's_owner_deptno' => Yii::t('app', 'S Owner Deptno'),
            's_owner_deptname' => Yii::t('app', 'S Owner Deptname'),
            's_status' => Yii::t('app', 'S Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return SdSigninQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SdSigninQuery(get_called_class());
    }
}
