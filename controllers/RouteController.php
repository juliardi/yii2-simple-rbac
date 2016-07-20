<?php

namespace juliardi\simplerbac\controllers;

use Yii;
use juliardi\simplerbac\base\Controller;
use juliardi\simplerbac\models\RbacRoute;
use juliardi\simplerbac\models\RbacRouteSearch;
use dmstr\helpers\Metadata;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RouteController implements the CRUD actions for RbacRoute model.
 */
class RouteController extends Controller
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
     * Lists all RbacRoute models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RbacRouteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RbacRoute model.
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
     * Creates a new RbacRoute model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RbacRoute();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $routeList = $this->generateRouteList();

            return $this->render('create', [
                'model' => $model,
                'routeList' => $routeList,
            ]);
        }
    }

    /**
     * Updates an existing RbacRoute model.
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
            $routeList = $this->generateRouteList();

            return $this->render('update', [
                'model' => $model,
                'routeList' => $routeList,
            ]);
        }
    }

    /**
     * @return array
     */
    public function generateRouteList()
    {
        $routeList = array();
        $controllers = Metadata::getModuleControllers();
        // var_dump($controllers);
        foreach ($controllers as $controller) {
            $objController = Yii::$app->createController($controller['name'].'/')[0];

            $actions = Metadata::getControllerActions($objController);
            foreach ($actions as $action) {
                $routeName = $objController->id.'/'.$action['name'];
                $routeList[$routeName] = $routeName;
            }
        }

        return $routeList;
    }

    /**
     * Deletes an existing RbacRoute model.
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
     * Finds the RbacRoute model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @return RbacRoute the loaded model
     *
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RbacRoute::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
