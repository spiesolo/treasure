<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\detail\DetailView;
use app\models\SdDepartment;
use app\models\SdEmployee;

/* @var $this yii\web\View */
/* @var $model app\models\SdDepartment */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sd Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-department-view">

    <h1></h1>

    <?php

    $attributes = [
        [
            'columns' => [
                [
                    'attribute' => 'ID',
                    'valueColOptions'=>['style'=>'width:30%'],
                    'displayOnly' => true,
                ],
                [
                    'attribute' => 'd_sn',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'd_name',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 'd_parent_sn',
                    'valueColOptions'=>['style'=>'width:30%'],
                    'type' => DetailView::INPUT_SELECT2,
                    'widgetOptions' => [
                        'data' => ArrayHelper::map(SdDepartment::find()->asArray()->all(), 'd_sn', 'd_sn'),
                        'options' => ['placeholder' => Yii::t('app', '-- 选择 --')],
                        'pluginOptions' => ['allowClear' => true],
                    ],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'd_admin',
                    'valueColOptions'=>['style'=>'width:30%'],
                    'type' => DetailView::INPUT_SELECT2,
                    'widgetOptions' => [
                        'data' => ArrayHelper::map(SdEmployee::find()->asArray()->all(), 'e_name', 'e_name'),
                        'options' => ['placeholder' => Yii::t('app', '-- 选择 --')],
                        'pluginOptions' => ['allowClear' => true],
                    ],
                ],
                [
                    'attribute' => 'd_remark',
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
            'heading' => Yii::t('app', '部门信息'),
        ],
        'deleteOptions' => [ // ajax delete parameters
            'url' => Url::to(['delete', 'id' => $model->ID]),
            'params' => ['id' => $model->ID],
        ],
    ]);

    ?>

</div>
