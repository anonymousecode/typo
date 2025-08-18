<?php
// use Yii;
use yii\helpers\Html;
?>

<h1><?= $post->title ?></h1>

<?php if (!Yii::$app->user->isGuest && Yii::$app->user->id == $post->author_id):?> 
    <?= Html::a('Edit',['post/update','id' => $post->id],['class'=>'btn btn-warning']) ?>
    <?= Html::a('Delete',['post/delete','id' => $post->id],['class'=>'btn btn-danger', 'data' => [
            'confirm' => 'Are you sure you want to delete this post?',
            'method' => 'post',
        ],]) ?>

<?php endif; ?>
<h6 class="text-muted"><?= $post->author ?></h6>
<p><?= nl2br($post->content) ?></p>
