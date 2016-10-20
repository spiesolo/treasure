<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SdPc2machineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sd-pc2machine-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'p_machinesn') ?>

    <?= $form->field($model, 'p_orderid') ?>

    <?= $form->field($model, 'p_ordercontent') ?>

    <?= $form->field($model, 'p_ordertime') ?>

    <?php // echo $form->field($model, 'p_sendouttime') ?>

    <?php // echo $form->field($model, 'p_responsetime') ?>

    <?php // echo $form->field($model, 'p_responsevalue') ?>

    <?php // echo $form->field($model, 'p_execflag') ?>

    <?php // echo $form->field($model, 'p_status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
