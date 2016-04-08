<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\models\Address;

AppAsset::register($this);

$address = Address::find()->where(['is_active' => 1])->count();

if($address == 0){
    $txt = "transparent_block";
    $tlink = "";
}else{
    $txt = "cred";
    $tlink = "1";
}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Телефонний довідник',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            
            Yii::$app->user->isGuest ? (
                '<li class="mmenu_item">'.
                    Html::a(Html::tag('span',
                    Html::tag('i', '', ['class' => 'glyphicon glyphicon-plus']).
                    Html::tag('span', ' Новий контакт', ['class' => ''])
                 ), Url::to('index.php?r=address/create'))
                .'</li>'.
                '<li class="mmenu_item">'.
                    Html::a(Html::tag('span',
                    Html::tag('i', '', ['class' => 'glyphicon glyphicon-plus']).
                    Html::tag('span', ' Перевірити статус заявки', ['class' => ''])
                 ), Url::to('index.php?r=check'))
                .'</li>'
            ) : (

                /*'<li class="mmenu_item">'.
                    Html::a(Html::tag('span',
                    Html::tag('i', '', ['class' => 'glyphicon glyphicon-user']).
                    Html::tag('span', ' Увійти', ['class' => ''])
                 ), Url::to('index.php?r=site/login'))
                .'</li>'.*/
            '<li class="mmenu_item">'.
                Html::a(Html::tag('span',
                    Html::tag('i', '', ['class' => '']).
                    Html::tag('span', ' Довідник', ['class' => ''])
                 ), Url::to('index.php?r=phonebook/index'))
            .'</li>' 
            .'<li class="mmenu_item">'.
                Html::a(Html::tag('span',
                    Html::tag('i', '', ['class' => '']).
                    Html::tag('span', ' Заявки <span class="badge '.$txt.'">'.$address.'</span>', ['class' => ''])
                 ), Url::to(['address/index', 'AddressSearch[is_active]' => $tlink]))
            .'</li>' 
            /*.'<li class="mmenu_item">'.
                Html::a(Html::tag('span',
                    Html::tag('i', '', ['class' => '']).
                    Html::tag('span', ' Адмінка', ['class' => ''])
                 ), Url::to('index.php?r=site/admin'))
            .'</li>'*/    

                .'<li class="mmenu_item">'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Вийти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container main_container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="text-center">&copy; Лабораторія інформаційних систем та комп'ютерних технологій <?= date('Y') ?></p>

        <!--<p class="pull-right"><?// Yii::powered() ?></p>-->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
