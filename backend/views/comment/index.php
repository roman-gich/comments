<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\editable\Editable;

//use 
/* @var $this yii\web\View */
/* @var $searchModel common\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            [
                'attribute' => 'id',
                'format' => 'raw',
                'hAlign'=>'center',
                'width'=>'90px',
                'value' => function ($model, $key, $index) {
                    return $model->id;
                },
            ],
            [
                'class'=>'kartik\grid\EditableColumn',
                'attribute'=>'is_active',
                'hAlign'=>'center',
                'width'=>'120px',
                'filter' => Html::activeDropDownList($searchModel, 'is_active', [
                    '' => 'All',
                    0 => 'New',
                    1 => 'Approved',
                    2 => 'Rejected',
                ],['class'=>'form-control']),
                'editableOptions'=> function ($model, $key, $index) {
                    return [
                        'formOptions' => ['action' => Url::to(['comment/editable'])],
                        'name'=>'is_active', 
                        'value' => $model->is_active,
                        'asPopover' => true,
                        'header' => 'Status',
                        'inputType' => Editable::INPUT_DROPDOWN_LIST,
                        'data' => [0 => 'New', 1 => 'Approved', 2 => 'Rejected'],
                        'options' => ['class'=>'form-control', 'prompt'=>'Select status...'],
                        'editableValueOptions' => [
                            'style' => 'border: none;',
                        ],
                        'displayValueConfig'=> [
                            0 => '<i class="glyphicon glyphicon-hourglass text-muted"></i> <span class="text-muted">new</span>',
                            1 => '<i class="glyphicon glyphicon-thumbs-up text-success"></i> <span class="text-success">approved</span>',
                            2 => '<i class="glyphicon glyphicon-thumbs-down text-warning"></i> <span class="text-warning">rejected</span>',
                        ],
                    ];
                }
            ],
            [
                'class'=>'kartik\grid\EditableColumn',
                'attribute'=>'value',
                'editableOptions'=> function ($model, $key, $index) {
                    return [
                        'formOptions' => ['action' => Url::to(['comment/editable'])],
                        'name'=>'value', 
                        'asPopover' => false,
                        'displayValue' => $model->value,
                        'inputType' => Editable::INPUT_TEXTAREA,
                        'value' => $model->value,
                        'header' => 'Comment',
                        'submitOnEnter' => false,
                        'editableValueOptions' => [
                            'style' => 'border: none; text-align: left;',
                        ],
                        'options' => [
                            'class'=>'form-control', 
                            'rows'=>5, 
                            'style'=>'width:400px', 
                            'placeholder'=>'Comment text...'
                        ]
                    ];
                },
            ],
            [
                'class'=>'kartik\grid\EditableColumn',
                'attribute'=>'user_name',
                'editableOptions'=> function ($model, $key, $index) {
                    return [
                        'formOptions' => ['action' => Url::to(['comment/editable'])],
                        'name'=>'user_name', 
                        'asPopover' => false,
                        'value' => $model->user_name,
                        'header' => 'Name',
                        'size'=>'md',
                        'editableValueOptions' => [
                            'style' => 'border: none; text-align: left;',
                        ],
                        'options' => ['class'=>'form-control', 'placeholder'=>'User name...']
                    ];
                },
            ],
            [
                'class'=>'kartik\grid\EditableColumn',
                'attribute'=>'user_email',
                'editableOptions'=> function ($model, $key, $index) {
                    return [
                        'formOptions' => ['action' => Url::to(['comment/editable'])],
                        'name'=>'user_email', 
                        'asPopover' => false,
                        'value' => $model->user_email,
                        'header' => 'Name',
                        'size'=>'md',
                        'editableValueOptions' => [
                            'style' => 'border: none; text-align: left;',
                        ],
                        'options' => ['class'=>'form-control', 'placeholder'=>'Enter person name...']
                    ];
                },
            ],

            // 'created_at',
            // 'updated_at',

//            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
        ],
    ]); ?>

</div>
