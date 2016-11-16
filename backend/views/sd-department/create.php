<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdDepartment */

$this->title = Yii::t('app', '创建');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '部门管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-department-create">
    <h1></h1>
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
