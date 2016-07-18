<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RbacRole */

$this->title = 'Update Rbac Role: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Rbac Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rbac-role-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
