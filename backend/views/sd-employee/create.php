<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdEmployee */

$this->title = Yii::t('app', '员工登记');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '员工管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
