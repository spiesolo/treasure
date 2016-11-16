<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use app\models\SdArea;

/* @var $this yii\web\View */
/* @var $model app\models\SdArea */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<div class="box">
    <div class="box-header">
        <span class="box-title"><?= $model->isNewRecord ? Yii::t('app', '添加区域信息') : Yii::t('app', '修改区域信息') ?></span>
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
                <?= $form->field($model, 'a_sn')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'a_name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'a_parent_sn')->dropDownList(
                                    ArrayHelper::map(SdArea::find()->all(), 'ID', 'a_sn'),
                                        ['prompt' => '-- '. Yii::t('app', '请选择') .'--']) ?>
                <?= $form->field($model, 'a_remark')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
