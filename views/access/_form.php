<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model juliardi\simplerbac\models\RbacAccessRules */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rbac-access-rules-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    echo $form->field($model, 'role_id')->widget(Select2::classname(), [
        'data' => $roleList,
        'options' => ['placeholder' => 'Select a role...'],
    ]);
     ?>
     <?php
     echo $form->field($model, 'route_id')->widget(Select2::classname(), [
         'data' => $routeList,
         'options' => ['placeholder' => 'Select a route...'],
     ]);
      ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
