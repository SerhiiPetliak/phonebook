<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Phonebook */

$this->title = "Запис із ID ".$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Загальний довідник', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phonebook">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Змінити', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
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
        ],
    ]) ?>

</div>
