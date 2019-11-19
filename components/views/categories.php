<?php if (!empty($categories)): ?>

    <ul>
        <?php foreach ($categories as $category): ?>
            <li><a href="<?= \yii\helpers\Url::to([
                    'category/view',
                    'id' => $category['id']
                ]); ?>"><?= $category['name']; ?></a></li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>
