<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
#use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use app\models\SdArea;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SdAreaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '门禁区域管理');
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="sd-area-index">
    <?php

    $gridColumns = [
        [
            'class' => 'kartik\grid\SerialColumn',
            'contentOptions' => ['class' => 'kartik-sheet-style'],
            'width' => '5%',
            'header' => '',
            'headerOptions' => ['class' => 'kartik-sheet-style']
        ],
        [
            'class' => 'kartik\grid\RadioColumn',
            'width' => '5%',
            'headerOptions' => ['class' => 'kartik-sheet-style'],
        ],
        [
            'attribute'=>'a_sn',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->a_sn,
                        '#',
                        ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdArea::find()->asArray()->all(), 'a_sn', 'a_sn'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '编号查询')],
            'format'=>'raw'
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute'=>'a_name', 
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->a_name,
                        '#',
                        ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'editableOptions' => function($model, $key, $index) {
                return [
                    'header' => '区域名称',
                    'size' => 'md',
                    'afterInput' => function ($form, $widget) {
                    }];
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdArea::find()->asArray()->all(), 'a_name', 'a_name'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '名称查询')],
            'format'=>'raw'
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute'=>'a_parent_sn',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->a_parent_sn,
                        '#',
                        ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'editableOptions' => function($model, $key, $index) {
                return [
                    'header' => '上级区域编号',
                    'size' => 'md',
                    'afterInput' => function ($form, $widget) {
                    }];
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdArea::find()->asArray()->all(), 'a_sn', 'a_sn'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '编号查询')],
            'format'=>'raw'
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute'=>'a_remark',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->a_remark,
                        '#',
                        ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'editableOptions' => function($model, $key, $index) {
                return [
                    'header' => Yii::t('app', '备注'),
                    'size' => 'md',
                    'afterInput' => function ($form, $widget) {
                    }];
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdArea::find()->asArray()->all(), 'a_remark', 'a_remark'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '备注查询')],
            'format'=>'raw'
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
            'width'=>'9%',
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
        'exportConfig'=> true,
        'panel'=>[
            'type'=> GridView::TYPE_PRIMARY,
            'heading'=> '门禁区域管理',
        ],
        // set the toolbar
        'toolbar' => [
            ['content' =>
                Html::button('<i class="glyphicon glyphicon-plus"></i>',
                                [
                                    'type'=>'button', 'title'=>Yii::t('app', '创建区域'),
                                    'class'=>'btn btn-success',
                                    'onclick'=>'window.location.href="' . Url::to(['sd-area/create']) . '"',
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
            'fontAwesome'=>true
        ],
    ]);

    ?>
</div>
