<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SdSignin */

$this->title = Yii::t('app', 'Create Sd Signin');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sd Signins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sd-signin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
