<?php

namespace juliardi\simplerbac\base;

use Yii;
use juliardi\simplerbac\models\RbacRole;
use juliardi\simplerbac\models\RbacRoute;
use juliardi\simplerbac\models\RbacAccessRules;
use yii\web\Controller;
use yii\web\HttpException;

/**
 * @author Juliardi <juliardi93@gmail.com>
 */
class Controller extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        $roleModel = $this->getRoleModel();
        $routeModel = $this->getRouteModel($action);

        $accessRule = RbacAccessRules::findOne([
            'role_id' => $roleModel->id,
            'route_id' => $routeModel->id,
        ]);

        if (is_null($accessRule)) {
            throw new HttpException(403, 'Unauthorized');
        }

        return true;
    }

    private function getRoleModel()
    {
        $user = Yii::$app->user;
        if ($user->isGuest) {
            $roleModel = RbacRole::findOne(['name' => 'guest']);
        } else {
            $roleModel = Yii::$app->user->identity->getRole();
        }

        return $roleModel;
    }

    private function getRouteModel($action)
    {
        $route = $this->id.'/'.$action->id;

        $routeModel = RbacRoute::findOne(['name' => $route]);

        if (is_null($routeModel)) {
            throw new HttpException(500, 'Internal Server Error');
        } else {
            return $routeModel;
        }
    }
}
