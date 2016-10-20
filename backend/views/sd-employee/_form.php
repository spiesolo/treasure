<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SdEmployee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sd-employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'e_pin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_sex')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_age')->textInput() ?>

    <?= $form->field($model, 'e_idcard')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_dept_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_duty')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_pri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_grp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_tz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_fingerprint')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_face')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_card')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_passwd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_checkin_dt')->textInput() ?>

    <?= $form->field($model, 'e_resign_dt')->textInput() ?>

    <?= $form->field($model, 'e_black_flag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'e_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
