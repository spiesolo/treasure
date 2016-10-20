<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SdArea */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sd-area-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'a_sn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'a_parent_sn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'a_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'a_remark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'a_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
