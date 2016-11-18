<?php
/**
 * Created by PhpStorm.
 * User: yhzheng
 * Date: 16-11-18
 * Time: 下午2:02
 */
use kartik\detail\DetailView;
?>

<?
    $attributes = [
        [
            'group' => true,
            'label' => Yii::t('app', '序列号') . '# ' . $model->m_sn,
            'rowOptions' => ['class' => 'primary'],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'm_ipaddress',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 'm_firmware',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'm_fpversion',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 'm_faceversion',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'm_pushver',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 'm_usercount',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'm_signcount',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 'm_tmpcount',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'm_facecount',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 'm_needfaceamount',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'm_delay',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 'm_errordelay',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute' => 'm_transtimes',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
                [
                    'attribute' => 'm_transinterval',
                    'valueColOptions'=>['style'=>'width:30%'],
                ],
            ],
        ],
    ];

    echo DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
        'mode' => 'view',
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'hover' =>  true,
        'hAlign' => 'center',
        'vAlign' => 'middle',
        ]);
?>