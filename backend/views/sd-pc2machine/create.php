<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdPc2machine */

$this->title = Yii::t('app', 'Create Sd Pc2machine');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sd Pc2machines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-pc2machine-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
