<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SdPc2machine */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sd-pc2machine-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'p_machinesn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_orderid')->textInput() ?>

    <?= $form->field($model, 'p_ordercontent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_ordertime')->textInput() ?>

    <?= $form->field($model, 'p_sendouttime')->textInput() ?>

    <?= $form->field($model, 'p_responsetime')->textInput() ?>

    <?= $form->field($model, 'p_responsevalue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_execflag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
