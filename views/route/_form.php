<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model juliardi\simplerbac\models\RbacRoute */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rbac-route-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    echo $form->field($model, 'name')->widget(Select2::classname(), [
        'data' => $routeList,
        'options' => ['placeholder' => 'Select a route...'],
    ]);
     ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
