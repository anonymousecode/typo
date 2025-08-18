<?php
use yii\helpers\Html;
?>

<!-- button -->
<p>
    <?= Html::a('Create',['post/create'],['class'=>'btn btn-primary'])?>
</p>

<?php foreach ($posts as $post): ?>
    <h2><?= $post->title ?></h2>
    <p><?= \yii\helpers\StringHelper::truncateWords($post->content, 50) ?></p>
    <a href="<?= \yii\helpers\Url::to(['post/view', 'id' => $post->id]) ?>">Read more</a>
<?php endforeach; ?>
