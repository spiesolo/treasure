<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sd_face".
 *
 * @property integer $ID
 * @property string $fa_owner_pin
 * @property integer $fa_index
 * @property integer $fa_size
 * @property string $fa_content
 * @property string $fa_machine
 * @property string $fa_version
 * @property integer $fa_status
 */
class SdFace extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_face';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fa_owner_pin', 'fa_index', 'fa_size', 'fa_content'], 'required'],
            [['fa_index', 'fa_size', 'fa_status'], 'integer'],
            [['fa_owner_pin', 'fa_version'], 'string', 'max' => 32],
            [['fa_content'], 'string', 'max' => 4096],
            [['fa_machine'], 'string', 'max' => 255],
            [['fa_owner_pin', 'fa_index'], 'unique', 'targetAttribute' => ['fa_owner_pin', 'fa_index'], 'message' => 'The combination of Fa Owner Pin and Fa Index has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'fa_owner_pin' => Yii::t('app', 'Fa Owner Pin'),
            'fa_index' => Yii::t('app', 'Fa Index'),
            'fa_size' => Yii::t('app', 'Fa Size'),
            'fa_content' => Yii::t('app', 'Fa Content'),
            'fa_machine' => Yii::t('app', 'Fa Machine'),
            'fa_version' => Yii::t('app', 'Fa Version'),
            'fa_status' => Yii::t('app', 'Fa Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return SdFaceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SdFaceQuery(get_called_class());
    }
}
