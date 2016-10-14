<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "SD_machine".
 *
 * @property integer $ID
 * @property string $m_sn
 * @property string $m_firmware
 * @property integer $m_usercount
 * @property integer $m_tmpcount
 * @property integer $m_signcount
 * @property string $m_ipaddress
 * @property string $m_fpversion
 * @property string $m_faceversion
 * @property integer $m_needfaceamount
 * @property integer $m_facecount
 * @property string $m_functionflag
 * @property string $m_stamp
 * @property string $m_opstamp
 * @property integer $m_errordelay
 * @property integer $m_delay
 * @property string $m_transtimes
 * @property string $m_transinterval
 * @property string $m_transflag
 * @property string $m_realtimetrans
 * @property string $m_encrypt
 * @property string $m_newtime
 * @property string $m_onlineinfo
 * @property string $m_style
 * @property string $m_name
 * @property string $m_address
 * @property string $m_pushver
 * @property string $m_language
 * @property string $m_pushcommkey
 * @property integer $m_area_ID
 * @property integer $m_status
 *
 * @property SdArea $mArea
 */
class SdMachine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SD_machine';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['m_sn'], 'required'],
            [['m_usercount', 'm_tmpcount', 'm_signcount', 'm_needfaceamount', 'm_facecount', 'm_errordelay', 'm_delay', 'm_area_ID', 'm_status'], 'integer'],
            [['m_newtime'], 'safe'],
            [['m_sn', 'm_transtimes', 'm_transinterval', 'm_transflag', 'm_style', 'm_name', 'm_address', 'm_pushcommkey'], 'string', 'max' => 255],
            [['m_firmware', 'm_ipaddress', 'm_fpversion', 'm_faceversion'], 'string', 'max' => 64],
            [['m_functionflag', 'm_realtimetrans', 'm_encrypt', 'm_language'], 'string', 'max' => 8],
            [['m_stamp', 'm_opstamp', 'm_pushver'], 'string', 'max' => 32],
            [['m_onlineinfo'], 'string', 'max' => 16],
            [['m_sn'], 'unique'],
            [['m_area_ID'], 'exist', 'skipOnError' => true, 'targetClass' => SdArea::className(), 'targetAttribute' => ['m_area_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'm_sn' => Yii::t('app', 'M Sn'),
            'm_firmware' => Yii::t('app', 'M Firmware'),
            'm_usercount' => Yii::t('app', 'M Usercount'),
            'm_tmpcount' => Yii::t('app', 'M Tmpcount'),
            'm_signcount' => Yii::t('app', 'M Signcount'),
            'm_ipaddress' => Yii::t('app', 'M Ipaddress'),
            'm_fpversion' => Yii::t('app', 'M Fpversion'),
            'm_faceversion' => Yii::t('app', 'M Faceversion'),
            'm_needfaceamount' => Yii::t('app', 'M Needfaceamount'),
            'm_facecount' => Yii::t('app', 'M Facecount'),
            'm_functionflag' => Yii::t('app', 'M Functionflag'),
            'm_stamp' => Yii::t('app', 'M Stamp'),
            'm_opstamp' => Yii::t('app', 'M Opstamp'),
            'm_errordelay' => Yii::t('app', 'M Errordelay'),
            'm_delay' => Yii::t('app', 'M Delay'),
            'm_transtimes' => Yii::t('app', 'M Transtimes'),
            'm_transinterval' => Yii::t('app', 'M Transinterval'),
            'm_transflag' => Yii::t('app', 'M Transflag'),
            'm_realtimetrans' => Yii::t('app', 'M Realtimetrans'),
            'm_encrypt' => Yii::t('app', 'M Encrypt'),
            'm_newtime' => Yii::t('app', 'M Newtime'),
            'm_onlineinfo' => Yii::t('app', 'M Onlineinfo'),
            'm_style' => Yii::t('app', 'M Style'),
            'm_name' => Yii::t('app', 'M Name'),
            'm_address' => Yii::t('app', 'M Address'),
            'm_pushver' => Yii::t('app', 'M Pushver'),
            'm_language' => Yii::t('app', 'M Language'),
            'm_pushcommkey' => Yii::t('app', 'M Pushcommkey'),
            'm_area_ID' => Yii::t('app', 'M Area  ID'),
            'm_status' => Yii::t('app', 'M Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMArea()
    {
        return $this->hasOne(SdArea::className(), ['ID' => 'm_area_ID']);
    }

    /**
     * @inheritdoc
     * @return SdMachineQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SdMachineQuery(get_called_class());
    }
}
