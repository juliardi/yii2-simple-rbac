<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use juliardi\simplerbac\assets\AppAsset;

AppAsset::register($this);

$currentRoute = Yii::$app->controller->id.'/'.Yii::$app->controller->action->id;
$availableRoute = [
    'access/index' => 'Access Rules Manager',
    'role/index' => 'Roles Manager',
    'route/index' => 'Routes',
];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <div class="col-md-3">
            <div class="list-group">
                <?php foreach ($availableRoute as $route => $text) {
    ?>
                <a href="<?= Url::toRoute($route) ?>" class="list-group-item <?= $currentRoute == $route ? 'active' : '' ?>">
                    <i class="glyphicon glyphicon-chevron-right"></i>
                    <?= $text ?>
                </a>
                <?php

} ?>
            </div>
        </div>
        <div class="col-md-8">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
