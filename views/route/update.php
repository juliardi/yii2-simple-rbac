<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RbacRoute */

$this->title = 'Update Rbac Route: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Rbac Routes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rbac-route-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'routeList' => $routeList,
    ]) ?>

</div>
