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
            'm_sn' => Yii::t('app', '序列号'),
            'm_firmware' => Yii::t('app', '固件版本'),
            'm_usercount' => Yii::t('app', '登记用户数'),
            'm_tmpcount' => Yii::t('app', '登记指纹数'),
            'm_signcount' => Yii::t('app', '签到记录数'),
            'm_ipaddress' => Yii::t('app', 'IP地址'),
            'm_fpversion' => Yii::t('app', '指纹固件版本'),
            'm_faceversion' => Yii::t('app', '人脸固件版本'),
            'm_needfaceamount' => Yii::t('app', '人脸取样数'),
            'm_facecount' => Yii::t('app', '登记人脸数'),
            'm_functionflag' => Yii::t('app', '功能标识'),
            'm_stamp' => Yii::t('app', 'Stamp'),
            'm_opstamp' => Yii::t('app', 'Opstamp'),
            'm_errordelay' => Yii::t('app', '联网失败重连时间间隔'),
            'm_delay' => Yii::t('app', '正常联网连接时间间隔'),
            'm_transtimes' => Yii::t('app', '定时上传时间'),
            'm_transinterval' => Yii::t('app', '数据上传间隔'),
            'm_transflag' => Yii::t('app', 'Transflag'),
            'm_realtimetrans' => Yii::t('app', '实时上传'),
            'm_encrypt' => Yii::t('app', '信息加密'),
            'm_newtime' => Yii::t('app', '最新联机时间'),
            'm_onlineinfo' => Yii::t('app', '在线状态'),
            'm_style' => Yii::t('app', 'M Style'),
            'm_name' => Yii::t('app', '机器名称'),
            'm_address' => Yii::t('app', '安装位置'),
            'm_pushver' => Yii::t('app', 'Pushver'),
            'm_language' => Yii::t('app', '语言'),
            'm_pushcommkey' => Yii::t('app', '密钥'),
            'm_area_ID' => Yii::t('app', '所属区域'),
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
