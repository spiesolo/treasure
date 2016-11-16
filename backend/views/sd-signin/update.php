<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SdSignin */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Sd Signin',
]) . $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '签到记录管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = Yii::t('app', '更新');
?>
<div class="sd-signin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
