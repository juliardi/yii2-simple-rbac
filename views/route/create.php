<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model juliardi\simplerbac\models\RbacRoute */

$this->title = 'Create Rbac Route';
$this->params['breadcrumbs'][] = ['label' => 'Rbac Routes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rbac-route-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'routeList' => $routeList,
    ]) ?>

</div>
