<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
#use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use app\models\SdSignin;


/* @var $this yii\web\View */
/* @var $searchModel app\models\SdSigninSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '签到记录管理');
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="sd-signin-index">
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
            'attribute'=>'s_owner_pin',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->s_owner_pin,
                    '#',
                    ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdSignin::find()->asArray()->all(), 's_owner_pin', 's_owner_pin'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '工号查询')],
            'format'=>'raw'
        ],
        [
            'attribute'=>'s_signtime',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->s_signtime,
                    '#',
                    ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdSignin::find()->asArray()->all(), 's_signtime', 's_signtime'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '时间查询')],
            'format'=>'raw'
        ],
        [
            'attribute'=>'s_owner_name',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->s_owner_name,
                    '#',
                    ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdSignin::find()->asArray()->all(), 's_owner_name', 's_owner_name'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '姓名查询')],
            'format'=>'raw'
        ],
        [
            'attribute'=>'s_owner_deptname',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->s_owner_deptname,
                    '#',
                    ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdSignin::find()->asArray()->all(), 's_owner_deptname', 's_owner_deptname'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '部门查询')],
            'format'=>'raw'
        ],
        [
            'attribute'=>'s_verifytype',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->s_verifytype,
                    '#',
                    ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdSignin::find()->asArray()->all(), 's_verifytype', 's_verifytype'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '签到类型查询')],
            'format'=>'raw'
        ],
        [
            'attribute'=>'s_machinesn',
            'vAlign'=>'middle',
            'width'=>'36px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->s_machinesn,
                    '#',
                    ['title'=>'View author detail', 'onclick'=>'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(SdSignin::find()->asArray()->all(), 's_machinesn', 's_machinesn'),
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>Yii::t('app', '签到机器查询')],
            'format'=>'raw'
        ],
        [
            'class'=>'kartik\grid\ActionColumn',
            'template'=>'{view}{delete}',
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
            'heading'=> '签到记录管理',
        ],
        // set the toolbar
        'toolbar' => [
            ['content' =>
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


