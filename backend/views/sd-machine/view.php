<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SdMachine */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sd Machines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-machine-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'm_sn',
            'm_firmware',
            'm_usercount',
            'm_tmpcount',
            'm_signcount',
            'm_ipaddress',
            'm_fpversion',
            'm_faceversion',
            'm_needfaceamount',
            'm_facecount',
            'm_functionflag',
            'm_stamp',
            'm_opstamp',
            'm_errordelay',
            'm_delay',
            'm_transtimes',
            'm_transinterval',
            'm_transflag',
            'm_realtimetrans',
            'm_encrypt',
            'm_newtime',
            'm_onlineinfo',
            'm_style',
            'm_name',
            'm_address',
            'm_pushver',
            'm_language',
            'm_pushcommkey',
            'm_area_ID',
            'm_status',
        ],
    ]) ?>

</div>
