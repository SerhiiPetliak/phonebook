<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Address */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phonebook">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'searchId')->textInput()->label('Номер вашої заявки') ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Знайти' : 'Знайти', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
