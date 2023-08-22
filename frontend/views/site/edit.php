<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


$form = ActiveForm::begin([
    'id'=> 'login-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
<?= $form->field($model, 'name')->textInput() ?>
<?= $form->field($model, 'typeName')->textInput() ?>
<?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
       
<?php ActiveForm::end() ?>