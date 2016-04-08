<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AddressSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="address-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'update_id') ?>

    <?= $form->field($model, 'unitName') ?>

    <?= $form->field($model, 'facultyName') ?>

    <?php // echo $form->field($model, 'post') ?>

    <?php // echo $form->field($model, 'PIB') ?>

    <?php // echo $form->field($model, 'telephoneOut') ?>

    <?php // echo $form->field($model, 'telephoneIn') ?>

    <?php // echo $form->field($model, 'telephoneForward') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'corps') ?>

    <?php // echo $form->field($model, 'cabinet') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <?php // echo $form->field($model, 'change_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>