<div class="col-md-4 content-right">

    <div class="categories">
        <h3>CATEGORIES</h3>

        <?= \app\components\CategoriesWidget::widget(); ?>

    </div>
    <div class="clearfix"></div>

    <hr>

    <div>
        <a href="<?= \yii\helpers\Url::to(['/admin']); ?>">Админка</a>
    </div>

    <?php if (!Yii::$app->user->isGuest): ?>
        <div>
            <a href="<?= \yii\helpers\Url::to(['/site/logout']); ?>">
                <?= Yii::$app->user->identity->username; ?> (Выход)
            </a>
        </div>

    <?php else: ?>
        <div>
            <a href="<?= \yii\helpers\Url::to(['/site/login']); ?>">Вход</a>
        </div>
        <div>
            <a href="<?= \yii\helpers\Url::to(['/site/signup']); ?>">Регистрация</a>
        </div>
    <?php endif; ?>

</div>