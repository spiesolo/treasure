<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;
use app\models\SdArea;

/* @var $this yii\web\View */
/* @var $model app\models\SdArea */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '区域管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-area-view">
    <h1></h1>

    <?php

    $attributes = [
        [
            'columns' => [
                [
                    'attribute' => 'a_sn',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 'a_parent_sn',
                    'valueColOptions'=>['style'=>'width:30%'],
                    'type' => DetailView::INPUT_SELECT2,
                    'widgetOptions' => [
                        'data' => ArrayHelper::map(SdArea::find()->asArray()->all(), 'a_parent_sn', 'a_parent_sn'),
                        'options' => ['placeholder' => Yii::t('app', '-- 选择 --')],
                        'pluginOptions' => ['allowClear' => true],
                    ],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'a_name',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 'a_remark',
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
            'heading' => Yii::t('app', '区域信息'),
        ],
        'deleteOptions' => [ // ajax delete parameters
            'url' => Url::to(['delete', 'id' => $model->ID]),
            'params' => ['id' => $model->ID],
        ],
    ]);

    ?>

</div>
