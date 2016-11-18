<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use app\models\SdArea;

/* @var $this yii\web\View */
/* @var $model app\models\SdMachine */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<div class="box">
    <div class="box-header">
        <span class="box-title"><?= $model->isNewRecord ? Yii::t('app', '添加设备信息') : Yii::t('app', '修改设备信息') ?></span>
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
                <?= $form->field($model, 'm_sn')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'm_name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'm_area_ID')->dropDownList(
                    ArrayHelper::map(SdArea::find()->all(), 'ID', 'a_name'),
                    ['prompt' => '-- '. Yii::t('app', '请选择') .'--']) ?>
                <?= $form->field($model, 'm_errordelay')->textInput(['maxlength' => true, 'value' => '30']) ?>
                <?= $form->field($model, 'm_delay')->textInput(['maxlength' => true, 'value' => '10']) ?>
                <?= $form->field($model, 'm_transtimes')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'm_transinterval')->textInput(['maxlength' => true, 'value' => '1']) ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
