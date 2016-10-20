<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SdDepartment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sd-department-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'd_sn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'd_parent_sn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'd_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'd_label')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'd_admin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'd_duty')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'd_remark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'd_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
