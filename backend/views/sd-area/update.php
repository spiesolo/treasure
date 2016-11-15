<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SdArea */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Sd Area',
]) . $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '区域管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('app', '更新');
?>
<div class="sd-area-update">
    <h1></h1>

    <?= $this->render('_form', ['model' => $model]) ?>
</div>
