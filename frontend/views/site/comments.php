<?php
use yii\captcha\Captcha;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use common\models\Comment;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ReviewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?php 
        $query = Comment::find()->where(['is_active' => 1])->orderBy(['id' => SORT_DESC]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        
        \yii\widgets\Pjax::begin();
        
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => [
                'class' => 'comment',
                'itemprop' => 'comment',
                'itemscope' => '',
                'itemtype' => 'http://schema.org/Comment',
            ],
            'itemView' => '_comment',
        ]);
        
        \yii\widgets\Pjax::end();
        
    ?>
    
    <h2>Leave a comment</h2>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'user_name') ?>

                <?= $form->field($model, 'user_email') ?>
            
                <?= $form->field($model, 'value')->textArea(['rows' => '6']) ?>
                
                <?= $form->field($model, 'captcha')->widget(Captcha::className()) ?>
            
                <div class="form-group">
                    <?= Html::submitButton('Post comment', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
