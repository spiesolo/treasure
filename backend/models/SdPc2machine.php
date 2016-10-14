<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "SD_pc2machine".
 *
 * @property integer $ID
 * @property string $p_machinesn
 * @property integer $p_orderid
 * @property string $p_ordercontent
 * @property string $p_ordertime
 * @property string $p_sendouttime
 * @property string $p_responsetime
 * @property string $p_responsevalue
 * @property string $p_execflag
 * @property integer $p_status
 */
class SdPc2machine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SD_pc2machine';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_machinesn', 'p_orderid', 'p_ordercontent'], 'required'],
            [['p_orderid', 'p_status'], 'integer'],
            [['p_ordertime', 'p_sendouttime', 'p_responsetime'], 'safe'],
            [['p_machinesn'], 'string', 'max' => 64],
            [['p_ordercontent'], 'string', 'max' => 4096],
            [['p_responsevalue', 'p_execflag'], 'string', 'max' => 16],
            [['p_machinesn', 'p_orderid'], 'unique', 'targetAttribute' => ['p_machinesn', 'p_orderid'], 'message' => 'The combination of P Machinesn and P Orderid has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'p_machinesn' => Yii::t('app', 'P Machinesn'),
            'p_orderid' => Yii::t('app', 'P Orderid'),
            'p_ordercontent' => Yii::t('app', 'P Ordercontent'),
            'p_ordertime' => Yii::t('app', 'P Ordertime'),
            'p_sendouttime' => Yii::t('app', 'P Sendouttime'),
            'p_responsetime' => Yii::t('app', 'P Responsetime'),
            'p_responsevalue' => Yii::t('app', 'P Responsevalue'),
            'p_execflag' => Yii::t('app', 'P Execflag'),
            'p_status' => Yii::t('app', 'P Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return SQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SQuery(get_called_class());
    }
}
