<?php

use yii\helpers\Html;

$this->title = 'Edit post'
?>

<div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('form',['post'=>$post]) ?>
</div>