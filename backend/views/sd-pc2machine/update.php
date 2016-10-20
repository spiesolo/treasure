<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SdPc2machine */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Sd Pc2machine',
]) . $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sd Pc2machines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sd-pc2machine-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
