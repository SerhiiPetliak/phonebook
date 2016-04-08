<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Statuses;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
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
            //'text:ntext',
            'unitName',
            'post',
            'PIB',
            'telephoneOut',
            'telephoneIn',
            //'telephoneForward',
            //'email:email',
            'corps',
            'cabinet',
            [
                'attribute' => 'is_active',
                'value' => 'is_active',
                'filter' => ArrayHelper::map(Statuses::find()->all(), 'id','status'),
            ],
            'facultyName',
            'change_time',
            [
                'label' => Дії,
                'format' => 'raw',
                'value' => function($data){

                    $val = "";

                    $val .= '<a href="/web/index.php?r=address/view&id='.$data->id.'" title="Переглянути" aria-label="Переглянути" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>';

                    if($data->type == 1){
                        $val .= "<a href='index.php?r=phonebook/update&id=".$data->update_id."&idc=".$data->id."'><i class='glyphicon glyphicon-pencil'></i></a>";
                    }else{
                        $val .= "<a href='index.php?r=address/update&id=".$data->id."&idc=".$data->id."'><i class='glyphicon glyphicon-pencil'></i></a>";
                    }

                    $val .= '<a href="/web/index.php?r=check/create&itemId='.$data->id.'" title="Відхилити" aria-label="Відхилити" data-confirm="Ви впевнені, що хочете відхилити дану заявку?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-ban-circle"></span></a>';
                    
                    $val .= '<a href="/web/index.php?r=address/delete&id='.$data->id.'" title="Видалити" aria-label="Видалити" data-confirm="Ви впевнені, що хочете видалити цей елемент?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>';
                    
                    return $val;
                }
            ],
        ],
    ]); ?>
</div>
