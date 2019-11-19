<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'username'); ?>
<?= $form->field($model, 'password')->passwordInput(); ?>

<div class="form-group">
    <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end() ?>
