<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;
use app\models\SdSignin;

/* @var $this yii\web\View */
/* @var $model app\models\SdArea */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '签到记录管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-signin-view">
    <h1></h1>

    <?php

    $attributes = [
        [
            'columns' => [
                [
                    'attribute' => 's_owner_pin',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 's_signtime',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 's_workstatus',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 's_verifytype',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 's_workcode',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],

                [
                    'attribute' => 's_machinesn',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 's_owner_name',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 's_owner_deptno',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 's_owner_deptname',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 's_status',
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
            'heading' => Yii::t('app', '签到记录'),
        ],
        'buttons1' => '{delete}',
        'deleteOptions' => [ // ajax delete parameters
            'url' => Url::to(['delete', 'id' => $model->ID]),
            'params' => ['id' => $model->ID],
        ],
    ]);

    ?>

</div>
