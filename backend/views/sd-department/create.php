<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdDepartment */

$this->title = Yii::t('app', 'Create Sd Department');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sd Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-department-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
