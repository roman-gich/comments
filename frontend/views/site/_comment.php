<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<div class="comment_title">
    <span class="comment_author text-success"><?= $model->user_name ?></span>
    <meta itemprop="dateCreated" content="<?= date('Y-m-d', strtotime($model->created_at)) ?>">
    <span class="comment_date text-muted" itemprop="author"><?= date('M d, Y / H:i:s', strtotime($model->created_at)) ?></span>
</div>
<div class="comment_text" itemprop="text">
<?= HtmlPurifier::process($model->value) ?>    
</div>