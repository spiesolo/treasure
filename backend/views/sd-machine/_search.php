<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SdMachineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sd-machine-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'm_sn') ?>

    <?= $form->field($model, 'm_firmware') ?>

    <?= $form->field($model, 'm_usercount') ?>

    <?= $form->field($model, 'm_tmpcount') ?>

    <?php // echo $form->field($model, 'm_signcount') ?>

    <?php // echo $form->field($model, 'm_ipaddress') ?>

    <?php // echo $form->field($model, 'm_fpversion') ?>

    <?php // echo $form->field($model, 'm_faceversion') ?>

    <?php // echo $form->field($model, 'm_needfaceamount') ?>

    <?php // echo $form->field($model, 'm_facecount') ?>

    <?php // echo $form->field($model, 'm_functionflag') ?>

    <?php // echo $form->field($model, 'm_stamp') ?>

    <?php // echo $form->field($model, 'm_opstamp') ?>

    <?php // echo $form->field($model, 'm_errordelay') ?>

    <?php // echo $form->field($model, 'm_delay') ?>

    <?php // echo $form->field($model, 'm_transtimes') ?>

    <?php // echo $form->field($model, 'm_transinterval') ?>

    <?php // echo $form->field($model, 'm_transflag') ?>

    <?php // echo $form->field($model, 'm_realtimetrans') ?>

    <?php // echo $form->field($model, 'm_encrypt') ?>

    <?php // echo $form->field($model, 'm_newtime') ?>

    <?php // echo $form->field($model, 'm_onlineinfo') ?>

    <?php // echo $form->field($model, 'm_style') ?>

    <?php // echo $form->field($model, 'm_name') ?>

    <?php // echo $form->field($model, 'm_address') ?>

    <?php // echo $form->field($model, 'm_pushver') ?>

    <?php // echo $form->field($model, 'm_language') ?>

    <?php // echo $form->field($model, 'm_pushcommkey') ?>

    <?php // echo $form->field($model, 'm_area_ID') ?>

    <?php // echo $form->field($model, 'm_status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
