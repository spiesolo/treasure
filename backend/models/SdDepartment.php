<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "SD_department".
 *
 * @property integer $ID
 * @property string $d_sn
 * @property string $d_parent_sn
 * @property string $d_name
 * @property string $d_label
 * @property string $d_admin
 * @property string $d_duty
 * @property string $d_remark
 * @property integer $d_status
 */
class SdDepartment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SD_department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['d_sn', 'd_name'], 'required'],
            [['d_status'], 'integer'],
            [['d_sn', 'd_parent_sn', 'd_name', 'd_label', 'd_duty', 'd_remark'], 'string', 'max' => 255],
            [['d_admin'], 'string', 'max' => 64],
            [['d_sn'], 'unique'],
            [['d_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'd_sn' => Yii::t('app', '部门编号'),
            'd_parent_sn' => Yii::t('app', '上级部门编号'),
            'd_name' => Yii::t('app', '部门名称'),
            'd_label' => Yii::t('app', '部门标签'),
            'd_admin' => Yii::t('app', '部门负责人'),
            'd_duty' => Yii::t('app', '部门职责'),
            'd_remark' => Yii::t('app', '备注'),
            'd_status' => Yii::t('app', '状态'),
        ];
    }

    /**
     * @inheritdoc
     * @return SdDepartmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SdDepartmentQuery(get_called_class());
    }
}
