<?php

namespace juliardi\simplerbac\base;

use Yii;
use juliardi\simplerbac\models\RbacRoute;
use juliardi\simplerbac\models\RbacAccessRules;
use yii\web\Controller;
use yii\web\HttpException;

/**
 *
 */
class Controller extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function beforeAction($action)
    {
        $route = $this->id.'/'.$action->id;
        $roleModel = Yii::$app->user->identity->role;
        $routeModel = RbacRoute::findOne(['name' => $route]);
        $accessRule = RbacAccessRules::findOne([
            'role_id' => $roleModel->id,
            'route_id' => $routeModel->id,
        ]);

        if (is_null($accessRule)) {
            throw new HttpException(403, 'Unauthorized');
        }

        return parent::beforeAction($action);
    }
}
