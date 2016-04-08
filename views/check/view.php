<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Check;

/* @var $this yii\web\View */
/* @var $model app\models\Address */

$this->title = "Перевірка статусу заявки номер ".$model->id;
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="phonebook">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        $status = $model->is_active;

        switch ($status) {
            case '1':
                $statusText = "Чекає на обробку модератором";
                break;
            case '2':
                $statusText = "Оброблено";
                break;
            case '3':
                $statusText = "Відхилено";
                $commentArr = Check::find()->where(['itemId' => $model->id])->all();
                break;
        }
    ?>

    <table class="table table-bordered table-striped">
        <tr>
            <td class="col-md-3"><strong>Заявка номер</strong></td>
            <td class="col-md-9"><?php echo $model->id;?></td>
        </tr>
        <tr>
            <td><strong>Статус</strong></td>
            <td><?php echo $statusText;?></td>
        </tr>
        <?php
            if($status == 3){
                echo '
                    <tr>
                        <td><strong>Коментар</strong></td>
                        <td>'.$commentArr[0]["comment"].'</td>
                    </tr>
                ';
            }
        ?>
    </table>

</div>
