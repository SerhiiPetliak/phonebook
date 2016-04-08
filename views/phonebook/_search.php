<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PhonebookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phonebook-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'unitName') ?>

    <?= $form->field($model, 'facultyName') ?>

    <?= $form->field($model, 'post') ?>

    <?= $form->field($model, 'PIB') ?>

    <?php // echo $form->field($model, 'telephoneOut') ?>

    <?php // echo $form->field($model, 'telephoneIn') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'corps') ?>

    <?php // echo $form->field($model, 'cabinet') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
