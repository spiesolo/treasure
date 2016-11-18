<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\detail\DetailView;
use app\models\SdEmployee;
use app\models\SdDepartment;
use app\models\SdArea;

/* @var $this yii\web\View */
/* @var $model app\models\SdEmployee */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sd Employees'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-employee-view">


    <?php

    $attributes = [
        [
            'columns' => [
                [
                    'attribute' => 'e_pin',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 'e_name',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'e_sex',
                    'valueColOptions'=>['style'=>'width:30%'],
                    'type' => DetailView::INPUT_SELECT2,
                    'widgetOptions' => [
                        'data' => [],
                        'options' => ['placeholder' => Yii::t('app', '-- 选择 --')],
                        'pluginOptions' => ['allowClear' => true],
                    ],
                ],
                [
                    'attribute' => 'e_age',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'e_idcard',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 'e_mobile',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'e_dept_no',
                    'valueColOptions'=>['style'=>'width:30%'],
                    'type' => DetailView::INPUT_SELECT2,
                    'widgetOptions' => [
                        'data' => ArrayHelper::map(SdDepartment::find()->asArray()->all(), 'd_sn', 'd_name'),
                        'options' => ['placeholder' => Yii::t('app', '-- 选择 --')],
                        'pluginOptions' => ['allowClear' => true],
                    ],
                ],
                [
                    'attribute' => 'e_duty',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'e_class',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 'e_title',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'e_pri',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 'e_grp',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'e_tz',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 'e_fingerprint',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'e_face',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 'e_card',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'e_passwd',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 'e_photo',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'e_checkin_dt',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 'e_resign_dt',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'e_black_flag',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 'e_status',
                    'valueColOptions'=>['style'=>'width:30%'],
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
            'type' => DetailView::TYPE_INFO,
            'heading' => Yii::t('app', '员工信息'),
        ],
        'deleteOptions' => [ // ajax delete parameters
            'url' => Url::to(['delete', 'id' => $model->ID]),
            'params' => ['id' => $model->ID],
        ],
    ]);

    ?>

</div>
