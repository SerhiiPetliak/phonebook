<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Address */

$this->title = "Заявка із ID ".$model->id;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phonebook_table">

    <h1><?= Html::encode($this->title) ?></h1>

   <h1>Вашу заявку прийнято!</h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'type',
            'update_id',
            'unitName',
            'facultyName',
            'post',
            'PIB',
            'telephoneOut',
            'telephoneIn',
            'telephoneForward',
            'email:email',
            'corps',
            'cabinet',
            'is_active',
            'change_time',
        ],
    ]) ?>

</div>
