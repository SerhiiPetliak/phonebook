<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use app\models\Address;
/* @var $this yii\web\View */

$this->title = 'Сторінка адміна';
?>
<div class="phonebook">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php 
        $address = Address::find()->where(['is_active' => 1])->count();
    ?>
    <p>
        <?= Html::a('Нових заявок <span class="badge">'.$address.'</span>', Url::to(['address/index', 'AddressSearch[is_active]' => '1']), ['class' => 'btn btn-primary btn-lg']) ?>
        
    </p>
    <p>
        <?= Html::a('Довідник', ['phonebook/index'], ['class' => 'btn btn-primary btn-lg']) ?>
    </p>

    
</div>
