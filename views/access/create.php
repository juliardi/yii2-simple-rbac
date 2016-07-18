<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RbacAccessRules */

$this->title = 'Create Rbac Access Rules';
$this->params['breadcrumbs'][] = ['label' => 'Rbac Access Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rbac-access-rules-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'roleList' => $roleList,
        'routeList' => $routeList,
    ]) ?>

</div>
