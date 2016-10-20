<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SdMachine */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sd-machine-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'm_sn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_firmware')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_usercount')->textInput() ?>

    <?= $form->field($model, 'm_tmpcount')->textInput() ?>

    <?= $form->field($model, 'm_signcount')->textInput() ?>

    <?= $form->field($model, 'm_ipaddress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_fpversion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_faceversion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_needfaceamount')->textInput() ?>

    <?= $form->field($model, 'm_facecount')->textInput() ?>

    <?= $form->field($model, 'm_functionflag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_stamp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_opstamp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_errordelay')->textInput() ?>

    <?= $form->field($model, 'm_delay')->textInput() ?>

    <?= $form->field($model, 'm_transtimes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_transinterval')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_transflag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_realtimetrans')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_encrypt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_newtime')->textInput() ?>

    <?= $form->field($model, 'm_onlineinfo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_style')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_pushver')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_language')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_pushcommkey')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'm_area_ID')->textInput() ?>

    <?= $form->field($model, 'm_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
