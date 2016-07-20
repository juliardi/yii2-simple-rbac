<?php

namespace juliardi\simplerbac\controllers;

use Yii;
use juliardi\simplerbac\base\Controller;
use juliardi\simplerbac\models\RbacRole;
use juliardi\simplerbac\models\RbacRoute;
use juliardi\simplerbac\models\RbacAccessRules;
use juliardi\simplerbac\models\RbacAccessRulesSearch;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AccessController implements the CRUD actions for RbacAccessRules model.
 */
class AccessController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all RbacAccessRules models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RbacAccessRulesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RbacAccessRules model.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RbacAccessRules model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RbacAccessRules();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $roleList = ArrayHelper::map(RbacRole::find()->all(), 'id', 'name');
            $routeList = ArrayHelper::map(RbacRoute::find()->all(), 'id', 'name');

            return $this->render('create', [
                'model' => $model,
                'roleList' => $roleList,
                'routeList' => $routeList,
            ]);
        }
    }

    /**
     * Updates an existing RbacAccessRules model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $roleList = ArrayHelper::map(RbacRole::find()->all(), 'id', 'name');
            $routeList = ArrayHelper::map(RbacRoute::find()->all(), 'id', 'name');

            return $this->render('update', [
                'model' => $model,
                'roleList' => $roleList,
                'routeList' => $routeList,
            ]);
        }
    }

    /**
     * Deletes an existing RbacAccessRules model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RbacAccessRules model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @return RbacAccessRules the loaded model
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RbacAccessRules::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
