<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SdAreaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sd-area-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'a_sn') ?>

    <?= $form->field($model, 'a_parent_sn') ?>

    <?= $form->field($model, 'a_name') ?>

    <?= $form->field($model, 'a_remark') ?>

    <?php // echo $form->field($model, 'a_status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
