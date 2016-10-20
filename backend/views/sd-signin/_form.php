<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SdSignin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sd-signin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 's_owner_pin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's_signtime')->textInput() ?>

    <?= $form->field($model, 's_workstatus')->textInput() ?>

    <?= $form->field($model, 's_verifytype')->textInput() ?>

    <?= $form->field($model, 's_workcode')->textInput() ?>

    <?= $form->field($model, 's_machinesn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's_owner_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's_owner_deptno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's_owner_deptname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
