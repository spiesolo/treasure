<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SdMachineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sd Machines');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-machine-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Sd Machine'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'm_sn',
            'm_firmware',
            'm_usercount',
            'm_tmpcount',
            // 'm_signcount',
            // 'm_ipaddress',
            // 'm_fpversion',
            // 'm_faceversion',
            // 'm_needfaceamount',
            // 'm_facecount',
            // 'm_functionflag',
            // 'm_stamp',
            // 'm_opstamp',
            // 'm_errordelay',
            // 'm_delay',
            // 'm_transtimes',
            // 'm_transinterval',
            // 'm_transflag',
            // 'm_realtimetrans',
            // 'm_encrypt',
            // 'm_newtime',
            // 'm_onlineinfo',
            // 'm_style',
            // 'm_name',
            // 'm_address',
            // 'm_pushver',
            // 'm_language',
            // 'm_pushcommkey',
            // 'm_area_ID',
            // 'm_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
