<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Address */

$this->title = "Запис із ID ".$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Довідник заявок', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phonebook_table">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
        <?= Html::a('Видалити', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ви впевнені, що хочете видалити даний запис?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
            //'telephoneForward',
            'email:email',
            'corps',
            'cabinet',
            'is_active',
            'change_time',
        ],
    ]) ?>

</div>
