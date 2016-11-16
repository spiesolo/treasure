<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use app\models\SdDepartment;
use app\models\SdEmployee;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SdDepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '部门管理');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-department-index">
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
            'attribute'=>'d_sn',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->d_sn,
                        '#',
                        ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdDepartment::find()->asArray()->all(), 'd_sn', 'd_sn'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '部门编号查询')],
            'format'=>'raw'
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute'=>'d_name',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->d_name,
                        '#',
                        ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'editableOptions' => function($model, $key, $index) {
                return [
                    'header' => Yii::t('app', '部门名称'),
                    'size' => 'md',
                    'afterInput' => function ($form, $widget) {
                    }];
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdDepartment::find()->asArray()->all(), 'd_name', 'd_name'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '部门名称查询')],
            'format'=>'raw'
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute'=>'d_parent_sn',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->d_parent_sn,
                        '#',
                        ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'editableOptions' => function($model, $key, $index) {
                return [
                    'header' => '上级部门编号',
                    'size' => 'md',
                    'afterInput' => function ($form, $widget) {
                    }];
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdDepartment::find()->asArray()->all(), 'd_sn', 'd_sn'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '部门编号查询')],
            'format'=>'raw'
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute'=>'d_admin',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->d_admin,
                        '#',
                        ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'editableOptions' => function($model, $key, $index) {
                return [
                    'header' => Yii::t('app', '部门负责人'),
                    'size' => 'md',
                    'afterInput' => function ($form, $widget) {
                    }];
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdEmployee::find()->asArray()->all(), 'e_name', 'e_name'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '负责人查询')],
            'format'=>'raw'
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute'=>'d_remark',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->d_remark,
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
            'filter'=>ArrayHelper::map(SdDepartment::find()->asArray()->all(), 'd_remark', 'd_remark'),
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

    // checkout http://demos.krajee.com/grid#gridview for detail configurations
    echo GridView::widget([
        'id' => 'sd-department-grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'filterRowOptions'=> ['class' => 'kartik-sheet-style'],
        'pjax' => true,
        // Table settings
        'bordered'=> true,
        'striped'=> true,
        'condensed'=> true,
        'responsive'=> false,
        'hover'=> true,
        'persistResize'=> false,
        // panel settings
        'panel'=>[
            'type'=> GridView::TYPE_PRIMARY,
            'heading' => Yii::t('app', '部门信息管理'),
            'after' => '<div class="clearfix"></div>',
        ],
        // toolbar settings
        'toolbar' => [
            ['content' =>
                Html::button('<i class="glyphicon glyphicon-plus"></i>',
                                [
                                    'type'=>'button', 'title'=>Yii::t('app', '创建部门'),
                                    'class'=>'btn btn-success',
                                    'onclick'=>'window.location.href="' . Url::to(['sd-department/create']) . '"',
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
            'fontAwesome'=>true,
            'target'=>'_blank',
        ],
    ]);

    ?>
</div>

<!--
<button type="button" class="btn btn-primary" onclick="var keys = $(&quot;#sd-department-grid&quot;).yiiGridView(&quot;getSelectedRows&quot;).length; krajeeDialog.alert(keys > 0 ? &quot;Downloaded &quot; + keys + &quot; selected &quot; + (keys === 1 ? &quot;book&quot; : &quot;books&quot;) + &quot; to your account.&quot; : &quot;No books selected for download.&quot;);"><i class="glyphicon glyphicon-download-alt"></i> Download Selected</button>
-->
