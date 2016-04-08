<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Відстеження заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phonebook">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= $this->render('_findForm', [
        'model' => $model
    ]) ?>
    
    
</div>
