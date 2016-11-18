<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use app\models\SdDepartment;

/* @var $this yii\web\View */
/* @var $model app\models\SdEmployee */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

    <div class="box">
        <div class="box-header">
            <span class="box-title"><?= $model->isNewRecord ? Yii::t('app', '登记员工信息') : Yii::t('app', '修改员工信息') ?></span>
            <span class="box-tools">
            <div class="form-group">
                <?= Html::submitButton('<i class="glyphicon glyphicon-save"></i>' . Yii::t('app', '保存'),
                    [
                        'type' => 'button',
                        'title' => Yii::t('app', '保存'),
                        'class' => 'btn btn-warning btn-flat',
                    ]) ?>
                <?= Html::resetButton('<i class="glyphicon glyphicon-edit"></i>' . Yii::t('app', '重置'), ['class' => 'btn btn-danger btn-flat']) ?>
                <?= Html::button('<i class="glyphicon glyphicon-remove"></i>' . Yii::t('app', '取消'),
                    [
                        'type' => 'button',
                        'title' => Yii::t('app', '取消'),
                        'class' => 'btn btn-danger btn-flat',
                        'onclick' => 'history.back()',
                    ]) ?>
            </div>
        </span>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-5">
                    <?= $form->field($model, 'e_pin')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'e_name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'e_sex')->dropDownList(
                        ['0' => '男', '1' => '女'],
                        ['prompt' => '-- '. Yii::t('app', '请选择') .'--']) ?>
                    <?= $form->field($model, 'e_age')->textInput() ?>
                    <?= $form->field($model, 'e_idcard')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'e_mobile')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'e_dept_no')->dropDownList(
                        ArrayHelper::map(SdDepartment::find()->all(), 'd_sn', 'd_name'),
                        ['prompt' => '-- '. Yii::t('app', '请选择') .'--']) ?>
                    <?= $form->field($model, 'e_duty')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'e_title')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'e_pri')->dropDownList(
                        [   '0' => Yii::t('app', '普通用户'),
                            '2' => Yii::t('app', '登记员'),
                            '6' => Yii::t('app', '管理员'),
                            '10' => Yii::t('app', '用户自定义'),
                            '14' => Yii::t('app', '超级管理员')],
                        ['prompt' => '-- '. Yii::t('app', '请选择') .'--']) ?>
                    <?= $form->field($model, 'e_checkin_dt')->textInput() ?>
                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>