<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SdEmployee */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sd Employees'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-employee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'e_pin',
            'e_name',
            'e_sex',
            'e_age',
            'e_idcard',
            'e_mobile',
            'e_dept_no',
            'e_duty',
            'e_class',
            'e_title',
            'e_pri',
            'e_grp',
            'e_tz',
            'e_fingerprint',
            'e_face',
            'e_card',
            'e_passwd',
            'e_photo',
            'e_checkin_dt',
            'e_resign_dt',
            'e_black_flag',
            'e_status',
        ],
    ]) ?>

</div>
