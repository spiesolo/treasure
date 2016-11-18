<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use app\models\SdEmployee;
use app\models\SdDepartment;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SdEmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '员工管理');
//$this->params['breadcrumbs'][] = $this->title;
?>


<div class="sd-employee-index">
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
            'attribute'=>'e_pin',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->e_pin,
                    '#',
                    ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdEmployee::find()->asArray()->all(), 'e_pin', 'e_pin'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '工号查询')],
            'format'=>'raw'
        ],


        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute'=>'e_name',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->e_name,
                    '#',
                    ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'editableOptions' => function($model, $key, $index) {
                return [
                    'header' => '姓名',
                    'size' => 'md',
                    'afterInput' => function ($form, $widget) {
                    }];
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdEmployee::find()->asArray()->all(), 'e_name', 'e_name'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '姓名查询')],
            'format'=>'raw'
        ],


        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute'=>'e_sex',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                $value = $model->e_sex == '0' ? Yii::t('app', '男') : Yii::t('app', '女');
                return Html::a($value,
                    '#',
                    ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'editableOptions' => function($model, $key, $index) {
                return [
                    'header' => '性别',
                    'size' => 'md',
                    'afterInput' => function ($form, $widget) {
                    }];
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map([['id'=>'0','name'=>'男'],['id'=>'1','name'=>'女']],'id','name'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '性别查询')],
            'format'=>'raw'
        ],


        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute'=>'e_age',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->e_age,
                    '#',
                    ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'editableOptions' => function($model, $key, $index) {
                return [
                    'header' => '年龄',
                    'size' => 'md',
                    'afterInput' => function ($form, $widget) {
                    }];
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdEmployee::find()->asArray()->all(), 'e_age', 'e_age'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '年龄查询')],
            'format'=>'raw'
        ],


        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute'=>'e_mobile',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->e_mobile,
                    '#',
                    ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'editableOptions' => function($model, $key, $index) {
                return [
                    'header' => '电话',
                    'size' => 'md',
                    'afterInput' => function ($form, $widget) {
                    }];
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdEmployee::find()->asArray()->all(), 'e_mobile', 'e_mobile'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '电话查询')],
            'format'=>'raw'
        ],


        [
//            'class' => 'kartik\grid\EditableColumn',
            'attribute'=>'e_dept_no',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                $dep = SdDepartment::findOne(['d_sn'=>$model->e_dept_no]);
                $value = $dep? $dep->d_name :'';
                return Html::a($value,
                    '#',
                    ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
//            'editableOptions' => function($model, $key, $index) {
//                return [
//                    'header' => '部门',
//                    'size' => 'md',
//                    'afterInput' => function ($form, $widget) {
//                    }];
//            },
            'filterType'=>GridView::FILTER_SELECT2,
//            'filter'=>ArrayHelper::map(SdEmployee::find()->asArray()->all(), 'e_dept_no', 'e_dept_no'),
            'filter'=>ArrayHelper::map(SdEmployee::find()->select('*')->join('LEFT JOIN', 'SD_department','SD_employee.e_dept_no = SD_department.d_sn')->asArray()->all(), 'e_dept_no', 'd_name'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '部门查询')],
            'format'=>'raw'
        ],


        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute'=>'e_duty',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->e_duty,
                    '#',
                    ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'editableOptions' => function($model, $key, $index) {
                return [
                    'header' => '职责',
                    'size' => 'md',
                    'afterInput' => function ($form, $widget) {
                    }];
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdEmployee::find()->asArray()->all(), 'e_duty', 'e_duty'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '职责查询')],
            'format'=>'raw'
        ],


        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute'=>'e_pri',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                $value = Yii::t('app', '普通用户');
                if ($model->e_pri == '0') $value = Yii::t('app', '普通用户');
                if ($model->e_pri == '2') $value = Yii::t('app', '登记员');
                if ($model->e_pri == '6') $value = Yii::t('app', '管理员');
                if ($model->e_pri == '10') $value = Yii::t('app', '用户自定义');
                if ($model->e_pri == '14') $value = Yii::t('app', '超级管理员');
                return Html::a($value,
//                return Html::a(SdEmployee::find()->select('*')->join('LEFT JOIN', 'SD_role','SD_employee.e_pri = SD_role.r_value')->asArray()->one(["ID"=>$model->ID])->r_name,

                    '#',
                    ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'editableOptions' => function($model, $key, $index) {
                return [
                    'header' => '权限',
                    'size' => 'md',
                    'afterInput' => function ($form, $widget) {
                    }];
            },
            'filterType'=>GridView::FILTER_SELECT2,
//            'filter'=>ArrayHelper::map(SdEmployee::find()->asArray()->all(), 'e_pri', 'e_pri'),
            'filter'=>ArrayHelper::map(SdEmployee::find()->select('*')->join('LEFT JOIN', 'SD_role','SD_employee.e_pri = SD_role.r_value')->asArray()->all(), 'e_dept_no', 'r_name'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '权限查询')],
            'format'=>'raw'
        ],


        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute'=>'e_checkin_dt',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->e_checkin_dt,
                    '#',
                    ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'editableOptions' => function($model, $key, $index) {
                return [
                    'header' => '入职日期',
                    'size' => 'md',
                    'afterInput' => function ($form, $widget) {
                    }];
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdEmployee::find()->asArray()->all(), 'e_checkin_dt', 'e_checkin_dt'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '入职查询')],
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
        'panel'=>[
            'type'=> GridView::TYPE_PRIMARY,
            'heading'=> '人员管理',
        ],
        // set the toolbar
        'toolbar' => [
            ['content' =>
                Html::button('<i class="glyphicon glyphicon-plus"></i>',
                    [
                        'type'=>'button', 'title'=>Yii::t('app', '登记员工'),
                        'class'=>'btn btn-success',
                        'onclick'=>'window.location.href="' . Url::to(['sd-employee/create']) . '"',
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
