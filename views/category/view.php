<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>

<?php if (!empty($posts)): ?>
    <?php foreach ($posts as $post): ?>
        <div class="content-grid">
            <div class="content-grid-info">
                <?= Html::img('@web/images/post1.jpg', ['alt' => '']); ?>
                <div class="post-info">
                    <h4>
                        <a href="<?= Url::to(['post/view', 'id' => $post->id]); ?>"><?= $post->title; ?></a>
                        July 30, 2014 / 27 Comments</h4>
                    <p><?= $post->excerpt; ?></p>
                    <a href="<?= Url::to(['post/view', 'id' => $post->id]); ?>">READ MORE</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <?= LinkPager::widget(['pagination' => $pages]); ?>
<?php else: ?>
    <h3>В этой категории записей пока нет..</h3>
<?php endif; ?>
