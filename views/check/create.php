<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Check */

$this->title = 'Відхилити заявку';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phonebook">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
