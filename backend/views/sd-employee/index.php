<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SdEmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sd Employees');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-employee-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Sd Employee'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'e_pin',
            'e_name',
            'e_sex',
            'e_age',
            // 'e_idcard',
            // 'e_mobile',
            // 'e_dept_no',
            // 'e_duty',
            // 'e_class',
            // 'e_title',
            // 'e_pri',
            // 'e_grp',
            // 'e_tz',
            // 'e_fingerprint',
            // 'e_face',
            // 'e_card',
            // 'e_passwd',
            // 'e_photo',
            // 'e_checkin_dt',
            // 'e_resign_dt',
            // 'e_black_flag',
            // 'e_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
