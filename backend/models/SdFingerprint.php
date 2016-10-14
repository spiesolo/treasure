<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sd_fingerprint".
 *
 * @property integer $ID
 * @property string $fp_owner_pin
 * @property integer $fp_index
 * @property integer $fp_size
 * @property string $fp_content
 * @property string $fp_machine
 * @property string $fp_version
 * @property integer $fp_status
 */
class SdFingerprint extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_fingerprint';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fp_owner_pin', 'fp_index', 'fp_size', 'fp_content'], 'required'],
            [['fp_index', 'fp_size', 'fp_status'], 'integer'],
            [['fp_owner_pin', 'fp_version'], 'string', 'max' => 32],
            [['fp_content'], 'string', 'max' => 4096],
            [['fp_machine'], 'string', 'max' => 255],
            [['fp_owner_pin', 'fp_index'], 'unique', 'targetAttribute' => ['fp_owner_pin', 'fp_index'], 'message' => 'The combination of Fp Owner Pin and Fp Index has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'fp_owner_pin' => Yii::t('app', 'Fp Owner Pin'),
            'fp_index' => Yii::t('app', 'Fp Index'),
            'fp_size' => Yii::t('app', 'Fp Size'),
            'fp_content' => Yii::t('app', 'Fp Content'),
            'fp_machine' => Yii::t('app', 'Fp Machine'),
            'fp_version' => Yii::t('app', 'Fp Version'),
            'fp_status' => Yii::t('app', 'Fp Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return SdFingerprintQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SdFingerprintQuery(get_called_class());
    }
}
