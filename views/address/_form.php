<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Phonebook;
use app\models\Address;

/* @var $this yii\web\View */
/* @var $model app\models\Address */
/* @var $form yii\widgets\ActiveForm */

$params = Yii::$app->request->get();



if(isset($params['idc']) && !isset($params['t'])){
    $data = Phonebook::find()->where(['id' => $params['idc']])->asArray()->all();
}else{
    $data[0]['unitName'] = "";
    $data[0]['facultyName'] = "";
    $data[0]['post'] = "";
    $data[0]['PIB'] = "";
    $data[0]['telephoneOut'] = "";
    $data[0]['telephoneIn'] = "";
    //$data['telephoneForward'] = "";
    $data[0]['email'] = "";
    $data[0]['corps'] = "";
    $data[0]['cabinet'] = "";
}
if(isset($params['t'])){
    $data = Address::find()->where(['id' => $params['idc']])->asArray()->all();
}
?>

<div class="phonebook">

    <?php $form = ActiveForm::begin();?>

    

<?= $form->field($model, 'type')->hiddenInput(['value'=> isset($params['idc']) ? 1 : 2])->label(false)?>
<?= $form->field($model, 'update_id')->hiddenInput(['value'=> isset($params['idc']) ? $params['idc'] : 0])->label(false)?>
<div class="row">
    <div class="col-md-3">
        <label class="control-label" for="address-facultyname">Назва факультету</strong><sup>(за наявності)</sup></label>
        
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'facultyName')->textInput(['maxlength' => true, 'value' => $data[0]['facultyName']])->label(false)?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <label class="control-label" for="address-unitname">Назва підрозділу</strong><sup>*</sup></label>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'unitName')->textInput(['maxlength' => true, 'value' => $data[0]['unitName']])->label(false) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <label class="control-label" for="address-post">Посада</strong></label>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'post')->textInput(['maxlength' => true, 'value' => $data[0]['post']])->label(false) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <label class="control-label" for="address-pib">ПІП контактної особи</strong><sup> (повністю)</sup></label>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'PIB')->textInput(['maxlength' => true, 'value' => $data[0]['PIB']])->label(false) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <label class="control-label" for="address-telephoneout">Номер телефону</strong><sup>*</sup></label>
    </div>
    <div class="col-md-6">
        <label class="control-label" for="address-telephoneout">Міський</strong><sup>*</sup></label>
        <?= $form->field($model, 'telephoneOut')->textInput(['maxlength' => true, 'value' => $data[0]['telephoneOut']])->label(false) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <label class="control-label" for="address-telephonein">Внутрішній</strong></label>
        <?= $form->field($model, 'telephoneIn')->textInput(['maxlength' => true, 'value' => $data[0]['telephoneIn']])->label(false) ?>
    </div>
</div>
<!-- <div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <label class="control-label" for="address-telephoneforward">Прямий</strong></label>
        <?// $form->field($model, 'telephoneForward')->textInput(['maxlength' => true, 'value' => $data[0]['telephoneForward']])->label(false) ?>
    </div>
</div> -->
<div class="row">
    <div class="col-md-3">
        <label class="control-label" for="address-email">Електронна пошта</strong></label>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'value' => $data[0]['email']])->label(false) ?>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <label class="control-label" for="address-corps">Адреса</strong><sup>*</sup></label>
    </div>
    <div class="col-md-6">
        <label class="control-label" for="address-corps">Корпус</strong><sup>*</sup></label>
        <?= $form->field($model, 'corps')->textInput(['maxlength' => true, 'value' => $data[0]['corps']])->label(false) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <label class="control-label" for="address-cabinet">Кабінет</strong><sup>*</sup></label>
        <?= $form->field($model, 'cabinet')->textInput(['maxlength' => true, 'value' => $data[0]['cabinet']])->label(false) ?>
    </div>
</div>

    <?= $form->field($model, 'is_active')->hiddenInput(['value'=> (!($model->isNewRecord) && !(isset($params['id']))) ? 2 : 1])->label(false)
                                                                    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Відправити' : 'Зберегти', ['class' => $model->isNewRecord ? 'btn btn-primary btn-lg' : 'btn btn-primary btn-lg']) ?>
    </div>

    <?php 
        ActiveForm::end(); 

        if(!(Yii::$app->user->isGuest)){
            echo Html::a('Відхилити', Url::to(Url::to(['check/create','itemId'=> $params['idc']]), true), ['class'=>'btn btn-danger']);
        }
    ?>



</div>
