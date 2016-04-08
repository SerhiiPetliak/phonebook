<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PhonebookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Загальний довідник';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phonebook">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Додати', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-bordered table-striped resp_table'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'unitName',
            'facultyName',
            'post',
            'PIB',
            'telephoneOut',
            'telephoneIn',
            'email:email',
            'corps',
            'cabinet',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
