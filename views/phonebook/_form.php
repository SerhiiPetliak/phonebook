<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;
use app\models\Phonebook;

/* @var $this yii\web\View */
/* @var $model app\models\Phonebook */
/* @var $form yii\widgets\ActiveForm */

$allArray = Phonebook::find()->asArray()->all();

$units = [];
$facultys = [];
$post = [];
$pib = [];

foreach ($allArray as $key) {
    $units[] = $key['unitName'];
    $facultys[] = $key['facultyName'];
    $post[] = $key['post'];
    $pib[] = $key['PIB'];
}
?>

<div class="phonebook">


<?php

    $dt = Yii::$app->request->get();

    if(isset($dt['idc'])){
        echo "
    <div class='container-fluid'>
        <div class='col-md-6'>
            <table class='table table-bordered table-striped'>
                <caption class='big_white_text'>Оригінал</caption>
                <thead>
                    <tr>
                        <th>Поле</th>
                        <th>Зміст</th>
                    </tr>
                </thead>
                <tbody>";                   
                    echo "
                            <tr>
                                <td class='col-md-4'>Назва підрозділу</td>
                                <td class='col-md-8'><span class='"; if($model->unitName != $old->unitName){echo 'red_label';}else{echo '';} echo "'>".$old->unitName."</span></td>
                            </tr>
                            <tr>
                                <td>Факультет</td>
                                <td class='col-md-8'><span class='"; if($model->facultyName != $old->facultyName){echo 'red_label';}else{echo '';} echo "'>".$old->facultyName."</span></td>
                            </tr>
                            <tr>
                                <td>Посада</td>
                                <td class='col-md-8'><span class='"; if($model->post != $old->post){echo 'red_label';}else{echo '';} echo "'>".$old->post."</span></td>
                            </tr>
                            <tr>
                                <td>П.І.Б</td>
                                <td class='col-md-8'><span class='"; if($model->PIB != $old->PIB){echo 'red_label';}else{echo '';} echo "'>".$old->PIB."</span></td>
                            </tr>
                            <tr>
                                <td>Міський телефон</td>
                                <td class='col-md-8'><span class='"; if($model->telephoneOut != $old->telephoneOut){echo 'red_label';}else{echo '';} echo "'>".$old->telephoneOut."</span></td>
                            </tr>
                            <tr>
                                <td>Внутрішній телефон</td>
                                <td class='col-md-8'><span class='"; if($model->telephoneIn != $old->telephoneIn){echo 'red_label';}else{echo '';} echo "'>".$old->telephoneIn."</span></td>
                            </tr>
                            <tr>
                                <td>Прямий телефон</td>
                                <td class='col-md-8'><span class='"; if($model->telephoneForward != $old->telephoneForward){echo 'red_label';}else{echo '';} echo "'>".$old->telephoneForward."</span></td>
                            </tr>
                            <tr>
                                <td>Електронна пошта</td>
                                <td class='col-md-8'><span class='"; if($model->email != $old->email){echo 'red_label';}else{echo '';} echo "'>".$old->email."</span></td>
                            </tr>
                            <tr>
                                <td>Корпус</td>
                                <td class='col-md-8'><span class='"; if($model->corps != $old->corps){echo 'red_label';}else{echo '';} echo "'>".$old->corps."</span></td>
                            </tr>
                            <tr>
                                <td>Кабінет</td>
                                <td class='col-md-8'><span class='"; if($model->cabinet != $old->cabinet){echo 'red_label';}else{echo '';} echo "'>".$old->cabinet."</span></td>
                            </tr>
                        ";
                                      
            echo "
                </tbody>
            </table>
        </div>

        <div class='col-md-6'>
            <table class='table table-bordered table-striped'>
                <caption class='big_white_text'>Зміни</caption>
                <thead>
                    <tr>
                        <th class='col-md-4'>Поле</th>
                        <th class='col-md-8'>Зміст</th>
                    </tr>
                </thead>
                <tbody>";                    
                        echo "
                            <tr>
                                <td>Назва підрозділу</td>
                                <td><span class='"; if($model->unitName != $old->unitName){echo 'green_label';}else{echo '';} echo "'>".$model->unitName."</span></td>
                            </tr>
                            <tr>
                                <td>Факультет</td>
                                <td><span class='"; if($model->facultyName != $old->facultyName){echo 'green_label';}else{echo '';} echo "'>".$model->facultyName."</span></td>
                            </tr>
                            <tr>
                                <td>Посада</td>
                                <td><span class='"; if($model->post != $old->post){echo 'green_label';}else{echo '';} echo "'>".$model->post."</span></td>
                            </tr>
                            <tr>
                                <td>П.І.Б</td>
                                <td><span class='"; if($model->PIB != $old->PIB){echo 'green_label';}else{echo '';} echo "'>".$model->PIB."</span></td>
                            </tr>
                            <tr>
                                <td>Міський телефон</td>
                                <td><span class='"; if($model->telephoneOut != $old->telephoneOut){echo 'green_label';}else{echo '';} echo "'>".$model->telephoneOut."</span></td>
                            </tr>
                            <tr>
                                <td>Внутрішній телефон</td>
                                <td><span class='"; if($model->telephoneIn != $old->telephoneIn){echo 'green_label';}else{echo '';} echo "'>".$model->telephoneIn."</span></td>
                            </tr>
                            <tr>
                                <td>Прямий телефон</td>
                                <td><span class='"; if($model->telephoneForward != $old->telephoneForward){echo 'green_label';}else{echo '';} echo "'>".$model->telephoneForward."</span></td>
                            </tr>
                            <tr>
                                <td>Електронна пошта</td>
                                <td><span class='"; if($model->email != $old->email){echo 'green_label';}else{echo '';} echo "'>".$model->email."</span></td>
                            </tr>
                            <tr>
                                <td>Корпус</td>
                                <td><span class='"; if($model->corps != $old->corps){echo 'green_label';}else{echo '';} echo "'>".$model->corps."</span></td>
                            </tr>
                            <tr>
                                <td>Кабінет</td>
                                <td><span class='"; if($model->cabinet != $old->cabinet){echo 'green_label';}else{echo '';} echo "'>".$model->cabinet."</span></td>
                            </tr>
                            ";        
            echo "</tbody>
            </table>
        </div>
        </div>
        ";
    }
?>

    <?php $form = ActiveForm::begin(); ?>


<div class="row">
    <div class="col-md-3">
        <label class="control-label" for="phonebook-facultyname">Назва факультету</strong><sup>(за наявності)</sup></label>
        
    </div>
    <div class="col-md-6">
        <?php

            echo $form->field($model, 'facultyName')->widget(TypeaheadBasic::classname(), [
                'data' => $facultys,
                'pluginOptions' => ['highlight' => true],
            ])->label(false);
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <label class="control-label" for="phonebook-facultyname">Назва підрозділу</strong><sup>*</sup></label>
    </div>
    <div class="col-md-6">
        <?php
            echo $form->field($model, 'unitName')->widget(TypeaheadBasic::classname(), [
                'data' => $units,
                'pluginOptions' => ['highlight' => true],
            ])->label(false);
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <strong>Посада</strong>
    </div>
    <div class="col-md-6">
        <?php
            echo $form->field($model, 'post')->widget(TypeaheadBasic::classname(), [
                'data' => $post,
                'pluginOptions' => ['highlight' => true],
            ])->label(false);
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <label class="control-label" for="phonebook-pib">ПІП контактної особи</strong><sup> (повністю)</sup></label>
    </div>
    <div class="col-md-6">
        <?php
            echo $form->field($model, 'PIB')->widget(TypeaheadBasic::classname(), [
                'data' => $pib,
                'pluginOptions' => ['highlight' => true],
            ])->label(false);
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <strong>Номер телефону</strong><sup>*</sup>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'telephoneOut')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <?= $form->field($model, 'telephoneIn')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<!-- <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <?php// $form->field($model, 'telephoneForward')->textInput(['maxlength' => true]) ?>
    </div>
</div> -->
<div class="row">
    <div class="col-md-3">
        <strong>Електронна пошта</strong>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label(false) ?>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <strong>Адреса</strong><sup>*</sup>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'corps')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <?= $form->field($model, 'cabinet')->textInput(['maxlength' => true]) ?>
    </div>
</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Додати' : 'Оновити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); 

        $dt = Yii::$app->request->get();

        if(isset($dt['idc'])){

            if(!(Yii::$app->user->isGuest)){
                echo Html::a('Відхилити', Url::to(Url::to(['check/create','itemId'=> $dt['idc']]), true), ['class'=>'btn btn-danger']);
            }

        }
    ?>

</div>
