<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SdRunlogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sd-runlog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'r_type') ?>

    <?= $form->field($model, 'r_content') ?>

    <?= $form->field($model, 'r_logtime') ?>

    <?= $form->field($model, 'r_operator') ?>

    <?php // echo $form->field($model, 'r_operateitem') ?>

    <?php // echo $form->field($model, 'r_status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
