<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SdRunlog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sd-runlog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'r_type')->textInput() ?>

    <?= $form->field($model, 'r_content')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'r_logtime')->textInput() ?>

    <?= $form->field($model, 'r_operator')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'r_operateitem')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'r_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
