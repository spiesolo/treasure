<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SdRunlog */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Sd Runlog',
]) . $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sd Runlogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sd-runlog-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
