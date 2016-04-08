<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Phonebook */

$this->title = 'Редагування контакту: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Загальний довідник', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редагування';
?>
<div class="phonebook">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'old' => $old,
    ]) ?>

</div>
