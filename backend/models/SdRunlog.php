<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "SD_runlog".
 *
 * @property integer $ID
 * @property integer $r_type
 * @property string $r_content
 * @property string $r_logtime
 * @property string $r_operator
 * @property string $r_operateitem
 * @property integer $r_status
 */
class SdRunlog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SD_runlog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['r_type', 'r_content', 'r_logtime', 'r_operator', 'r_operateitem'], 'required'],
            [['r_type', 'r_status'], 'integer'],
            [['r_logtime'], 'safe'],
            [['r_content'], 'string', 'max' => 2048],
            [['r_operator', 'r_operateitem'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'r_type' => Yii::t('app', 'R Type'),
            'r_content' => Yii::t('app', 'R Content'),
            'r_logtime' => Yii::t('app', 'R Logtime'),
            'r_operator' => Yii::t('app', 'R Operator'),
            'r_operateitem' => Yii::t('app', 'R Operateitem'),
            'r_status' => Yii::t('app', 'R Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return SdRunlogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SdRunlogQuery(get_called_class());
    }
}
