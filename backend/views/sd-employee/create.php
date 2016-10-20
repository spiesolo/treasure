<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdEmployee */

$this->title = Yii::t('app', 'Create Sd Employee');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sd Employees'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-employee-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
