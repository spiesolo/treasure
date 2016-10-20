<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SdSigninSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sd-signin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 's_owner_pin') ?>

    <?= $form->field($model, 's_signtime') ?>

    <?= $form->field($model, 's_workstatus') ?>

    <?= $form->field($model, 's_verifytype') ?>

    <?php // echo $form->field($model, 's_workcode') ?>

    <?php // echo $form->field($model, 's_machinesn') ?>

    <?php // echo $form->field($model, 's_owner_name') ?>

    <?php // echo $form->field($model, 's_owner_deptno') ?>

    <?php // echo $form->field($model, 's_owner_deptname') ?>

    <?php // echo $form->field($model, 's_status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
