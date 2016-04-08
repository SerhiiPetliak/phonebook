<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */

$this->title = 'Запорізький національний університет';

?>
<div class="phonebook">

    <h1 class="text-center"><a href="http://www.znu.edu.ua" class="title_link"><?= Html::encode($this->title) ?></a></h1>
    <!--p>
        <?php// Html::a('Подати заявку', ['address/create'], ['class' => 'btn btn-success']) ?>
    </p-->

    <?php 

        $dataProvider->setPagination(['pageSize' => 6]); 

        Pjax::begin();
        
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary'=>"",
        'tableOptions' => [
            'class' => 'table table-bordered table-striped resp_table'
        ],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            //'id',
            'unitName',
            'post',
            'PIB',
            [
                'attribute' => 'phones',
                'label' => 'Телефони',
                'filter' => '<input type="text" class="form-control" '
                .' name="PhonebookSearch[phones]" '
                .' value="'.$searchModel->phones.'" />',
                'format' => 'raw',
                'value' => function($data){
                    return $data->telephoneOut."<br>".$data->telephoneIn;//."<br>".$data->telephoneForward;
                }
            ],       
            'email:email',
            'corps',
            'cabinet',
            'facultyName',
            [
                'label' => 'Дії',
                'format' => 'raw',
                'value' => function($data){
                    return "<a href='index.php?r=address/create&idc=".$data->id."' title='Знайшли неточність?'><i class='glyphicon glyphicon-pencil'></i></a>";
                }

            ]
        ],
    ]); 

    Pjax::end();

    ?>
</div>
