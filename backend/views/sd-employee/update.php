<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SdEmployee */

$this->title = Yii::t('app', '员工信息更新');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '员工管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('app', '更新');
?>
<div class="sd-employee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
