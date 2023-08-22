<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id'=> 'login-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
<?= $form->field($model, 'name') ?>

<?= Html::submitButton('Succes', ['class' => 'btn btn-primary']) ?>
<p>
        If you interested in my project, you can write to me on my @mail ( ^w^) - vadironxx@gmail.com
    </p>
       
<?php ActiveForm::end() ?>