<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sensors".
 *
 * @property integer $ID
 * @property string $MacSN
 * @property string $MacName
 * @property integer $TransInterval
 * @property integer $OnLine
 * @property string $Ver
 * @property string $IP
 * @property string $NewTime
 * @property integer $RelatedEquipment
 * @property integer $Alarm
 * @property double $CurTemperature
 * @property double $CurHumidity
 * @property double $TempLowLimit
 * @property double $TempHighLimit
 * @property double $HumiLowLimit
 * @property double $HumiHighLimit
 * @property double $TempLowerThreshold
 * @property double $TempUpperThreshold
 * @property double $HumiLowerThreshold
 * @property double $HumiUpperThreshold
 */
class Sensors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sensors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MacSN', 'MacName', 'TransInterval', 'Alarm', 'TempLowerThreshold', 'TempUpperThreshold', 'HumiLowerThreshold', 'HumiUpperThreshold'], 'required'],
            [['TransInterval', 'OnLine', 'RelatedEquipment', 'Alarm'], 'integer'],
            [['NewTime'], 'safe'],
            [['CurTemperature', 'CurHumidity', 'TempLowLimit', 'TempHighLimit', 'HumiLowLimit', 'HumiHighLimit', 'TempLowerThreshold', 'TempUpperThreshold', 'HumiLowerThreshold', 'HumiUpperThreshold'], 'number'],
            [['MacSN', 'MacName', 'Ver', 'IP'], 'string', 'max' => 255],
            [['MacSN'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'MacSN' => Yii::t('app', 'Mac Sn'),
            'MacName' => Yii::t('app', 'Mac Name'),
            'TransInterval' => Yii::t('app', 'Trans Interval'),
            'OnLine' => Yii::t('app', 'On Line'),
            'Ver' => Yii::t('app', 'Ver'),
            'IP' => Yii::t('app', 'Ip'),
            'NewTime' => Yii::t('app', 'New Time'),
            'RelatedEquipment' => Yii::t('app', 'Related Equipment'),
            'Alarm' => Yii::t('app', 'Alarm'),
            'CurTemperature' => Yii::t('app', 'Cur Temperature'),
            'CurHumidity' => Yii::t('app', 'Cur Humidity'),
            'TempLowLimit' => Yii::t('app', 'Temp Low Limit'),
            'TempHighLimit' => Yii::t('app', 'Temp High Limit'),
            'HumiLowLimit' => Yii::t('app', 'Humi Low Limit'),
            'HumiHighLimit' => Yii::t('app', 'Humi High Limit'),
            'TempLowerThreshold' => Yii::t('app', 'Temp Lower Threshold'),
            'TempUpperThreshold' => Yii::t('app', 'Temp Upper Threshold'),
            'HumiLowerThreshold' => Yii::t('app', 'Humi Lower Threshold'),
            'HumiUpperThreshold' => Yii::t('app', 'Humi Upper Threshold'),
        ];
    }

    /**
     * @inheritdoc
     * @return SensorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SensorsQuery(get_called_class());
    }
}
