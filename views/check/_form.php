<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Check */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="check-form">

    <?php 
    	$form = ActiveForm::begin(); 
    	$dt = Yii::$app->request->get();
    ?>

    <?= $form->field($model, 'itemId')->hiddenInput(['value'=> $dt['itemId']])->label(false)?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Відхилити' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
