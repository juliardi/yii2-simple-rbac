<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RbacAccessRules */

$this->title = 'Update Rbac Access Rules: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rbac Access Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rbac-access-rules-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'roleList' => $roleList,
        'routeList' => $routeList,
    ]) ?>

</div>
