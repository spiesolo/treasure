<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SdDepartmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sd-department-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'd_sn') ?>

    <?= $form->field($model, 'd_parent_sn') ?>

    <?= $form->field($model, 'd_name') ?>

    <?= $form->field($model, 'd_label') ?>

    <?php // echo $form->field($model, 'd_admin') ?>

    <?php // echo $form->field($model, 'd_duty') ?>

    <?php // echo $form->field($model, 'd_remark') ?>

    <?php // echo $form->field($model, 'd_status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
