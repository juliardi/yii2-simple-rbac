<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RbacRole */

$this->title = 'Create Rbac Role';
$this->params['breadcrumbs'][] = ['label' => 'Rbac Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rbac-role-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
