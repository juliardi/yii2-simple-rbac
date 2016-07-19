<?php

use juliardi\simplerbac\models\RbacRole;
use juliardi\simplerbac\models\RbacRoute;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel juliardi\simplerbac\models\RbacAccessRulesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rbac Access Rules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rbac-access-rules-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rbac Access Rules', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Role',
                'attribute' => 'role_id',
                'filter' => ArrayHelper::map(RbacRole::find()->all(), 'id', 'name'),
                'value' => function($data) {
                    return $data->role->name;
                }
            ],
            [
                'label' => 'Route',
                'attribute' => 'route_id',
                'filter' => ArrayHelper::map(RbacRoute::find()->all(), 'id', 'name'),
                'value' => function($data) {
                    return $data->route->name;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
