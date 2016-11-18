<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\detail\DetailView;

use app\models\SdMachine;
use app\models\SdArea;

/* @var $this yii\web\View */
/* @var $model app\models\SdMachine */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '设备管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-machine-view">
    <h1></h1>

    <?php
    $attributes = [
        [
            'group' => true,
            'label' => Yii::t('app', '基本信息'),
            'rowOptions' => ['class' => 'info'],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'ID',
                    'valueColOptions'=>['style'=>'width:30%'],
                    'displayOnly' => true,
                ],
                [
                    'attribute' => 'm_sn',
                    'valueColOptions'=>['style'=>'width:30%'],
                    'displayOnly' => true,
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'm_name',
                    'valueColOptions'=>['style'=>'width:30%'],
                    'displayOnly' => true,
                ],
                [
                    'attribute' => 'm_ipaddress',
                    'valueColOptions'=>['style'=>'width:30%'],
                    'displayOnly' => true,
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'm_newtime',
                    'valueColOptions'=>['style'=>'width:30%'],
                    'displayOnly' => true,
                ],
                [
                    'attribute' => 'm_address',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'group' => true,
            'label' => Yii::t('app', '固件版本信息'),
            'rowOptions' => ['class' => 'info'],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'm_firmware',
                    'valueColOptions'=>['style'=>'width:30%'],
                    'displayOnly' => true,
                ],
                [
                    'attribute' => 'm_pushver',
                    'valueColOptions'=>['style'=>'width:30%'],
                    'displayOnly' => true,
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'm_fpversion',
                    'valueColOptions'=>['style'=>'width:30%'],
                    'displayOnly' => true,
                ],
                [
                    'attribute' => 'm_faceversion',
                    'valueColOptions'=>['style'=>'width:30%'],
                    'displayOnly' => true,
                ],
            ],
        ],
        [
            'group' => true,
            'label' => Yii::t('app', '登记信息'),
            'rowOptions' => ['class' => 'info'],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'm_usercount',
                    'valueColOptions'=>['style'=>'width:30%'],
                    'displayOnly' => true,
                ],
                [
                    'attribute' => 'm_tmpcount',
                    'valueColOptions'=>['style'=>'width:30%'],
                    'displayOnly' => true,
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'm_facecount',
                    'displayOnly' => true,
                ],
            ],
        ],
        [
            'group' => true,
            'label' => Yii::t('app', '联网配置'),
            'rowOptions' => ['class' => 'info'],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'm_errordelay',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 'm_delay',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'm_transtimes',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 'm_transinterval',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'group' => true,
            'label' => Yii::t('app', '区域配置'),
            'rowOptions' => ['class' => 'info'],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'm_area_ID',
                    'valueColOptions'=>['class'=>'col-md-4 pull-left'],
                    'type' => DetailView::INPUT_SELECT2,
                    'widgetOptions' => [
                        'data' => ArrayHelper::map(SdArea::find()->asArray()->all(), 'ID', 'a_name'),
                        'options' => ['placeholder' => Yii::t('app', '-- 选择 --')],
                        'pluginOptions' => ['allowClear' => true],
                    ],
                ],
            ],
        ],
    ];

    echo DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
        'mode' => 'view',
        'bootstrap' => true,
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'hAlign' => 'right',
        'vAlign' => 'center',
        'fadeDelay' => 2,
        'formOptions' => ['action' => Url::current(['#' => 'delete'])], // action to delete
        'panel' => [
            'type' => DetailView::TYPE_PRIMARY,
            'heading' => Yii::t('app', '设备详细信息'),
        ],
        'deleteOptions' => [ // ajax delete parameters
            'url' => Url::to(['delete', 'id' => $model->ID]),
            'params' => ['id' => $model->ID],
        ],
    ]);

    ?>
</div>
