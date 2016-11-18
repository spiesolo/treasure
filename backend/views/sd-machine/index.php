<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use kartik\grid\GridView;

use app\models\SdArea;
use app\models\SdMachine;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SdMachineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sd Machines');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-machine-index">

    <?php
    $gridColumns = [
        [
            'class' => 'kartik\grid\SerialColumn',
            'contentOptions' => ['class' => 'kartik-sheet-style'],
            'width' => '10px',
            'header' => '',
            'headerOptions' => ['class' => 'kartik-sheet-style']
        ],
        [
            'class' => 'kartik\grid\RadioColumn',
            'width' => '10px',
            'headerOptions' => ['class' => 'kartik-sheet-style'],
        ],
        [
            'class'=>'kartik\grid\ExpandRowColumn',
            'width'=>'10px',
            'value'=>function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail'=>function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_expand-row-details', ['model'=>$model]);
            },
            'headerOptions'=>['class'=>'kartik-sheet-style'],
            'expandOneOnly'=>true,
        ],
        [
            'attribute'=>'m_sn',
            'hAlign'=>'center',
            'vAlign'=>'middle',
            'width' => '50px',
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdMachine::find()->asArray()->all(), 'm_sn', 'm_sn'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '序列号查询')],
            'format'=>'raw'
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute'=>'m_name',
            'hAlign'=>'center',
            'vAlign'=>'middle',
            'width' => '50px',
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdMachine::find()->asArray()->all(), 'm_name', 'm_name'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '设备名查询')],
            'format'=>'raw'
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute'=>'m_address',
            'hAlign'=>'center',
            'vAlign'=>'middle',
            'width' => '50px',
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdMachine::find()->asArray()->all(), 'm_address', 'm_address'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '设备安装地点查询')],
            'format'=>'raw'
        ],
        [
            'attribute'=>'m_newtime',
            'hAlign'=>'center',
            'vAlign'=>'middle',
            'width' => '30px',
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '联机时间查询')],
            'format'=>'raw',
            'filterType'=>GridView::FILTER_DATE,
            'filterWidgetOptions'=>[
                'pluginOptions'=>['format' => 'yyyy-mm-dd', 'autoClose'=>true, 'language'=>'zh-CN'],
            ],
        ],
        [
            'attribute'=>'m_area_ID',
            'hAlign'=>'center',
            'vAlign'=>'middle',
            'width' => '50px',
            'format'=>'raw',
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdArea::find()->asArray()->all(), 'ID', 'a_name'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '区域查询')],
        ],
        [
            'class'=>'kartik\grid\ActionColumn',
            'header' => Yii::t('app', '操作'),
            'width'=>'10%',
            'dropdown'=> false,
            'dropdownOptions'=>['class'=>'pull-right'],
            'viewOptions'=>['title'=>'This will launch the book details page. Disabled for this demo!', 'data-toggle'=>'tooltip'],
            'updateOptions'=>['title'=>Yii::t('app', '修改记录'), 'data-toggle'=>'tooltip'],
            'deleteOptions'=>['title'=>Yii::t('app', '删除记录'), 'data-toggle'=>'tooltip'],
            'headerOptions'=>['class'=>'kartik-sheet-style'],
        ],
        [
            'class'=>'kartik\grid\CheckboxColumn',
            'width'=>'10px',
            'headerOptions'=>['class'=>'kartik-sheet-style'],
        ],
    ];

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'filterRowOptions'=> ['class' => 'kartik-sheet-style'],
        'pjax' => true,
        // UI parameters
        'bordered'=> true,
        'striped'=> true,
        'condensed'=> true,
        'responsive'=> false,
        'hover'=> true,
        'persistResize'=> false,
        'panel'=>[
            'type'=> GridView::TYPE_PRIMARY,
            'heading'=> Yii::t('app', '门禁设备管理'),
        ],
        // set the toolbar
        'toolbar' => [
            ['content' =>
                Html::button('<i class="glyphicon glyphicon-plus"></i>',
                    [
                        'type'=>'button', 'title'=>Yii::t('app', '创建区域'),
                        'class'=>'btn btn-success',
                        'onclick'=>'window.location.href="' . Url::to(['sd-machine/create']) . '"',
                    ]
                ) . ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>',
                    ['index'],
                    ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('app', '刷新')])
            ],
            '{export}',
            '{toggleData}',
        ],
        // set export properties
        'export' => [
            'fontAwesome' => true,
            'target' => '_blank', // open in new tag
        ],
    ]);
    ?>
</div>
