<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdRunlog */

$this->title = Yii::t('app', 'Create Sd Runlog');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sd Runlogs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-runlog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
