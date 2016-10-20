<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SdEmployeeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sd-employee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'e_pin') ?>

    <?= $form->field($model, 'e_name') ?>

    <?= $form->field($model, 'e_sex') ?>

    <?= $form->field($model, 'e_age') ?>

    <?php // echo $form->field($model, 'e_idcard') ?>

    <?php // echo $form->field($model, 'e_mobile') ?>

    <?php // echo $form->field($model, 'e_dept_no') ?>

    <?php // echo $form->field($model, 'e_duty') ?>

    <?php // echo $form->field($model, 'e_class') ?>

    <?php // echo $form->field($model, 'e_title') ?>

    <?php // echo $form->field($model, 'e_pri') ?>

    <?php // echo $form->field($model, 'e_grp') ?>

    <?php // echo $form->field($model, 'e_tz') ?>

    <?php // echo $form->field($model, 'e_fingerprint') ?>

    <?php // echo $form->field($model, 'e_face') ?>

    <?php // echo $form->field($model, 'e_card') ?>

    <?php // echo $form->field($model, 'e_passwd') ?>

    <?php // echo $form->field($model, 'e_photo') ?>

    <?php // echo $form->field($model, 'e_checkin_dt') ?>

    <?php // echo $form->field($model, 'e_resign_dt') ?>

    <?php // echo $form->field($model, 'e_black_flag') ?>

    <?php // echo $form->field($model, 'e_status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
