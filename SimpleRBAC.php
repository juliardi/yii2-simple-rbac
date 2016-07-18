<?php

namespace juliardi\simplerbac;
use yii\base\Module as BaseModule;
use yii\filters\AccessControl;

/**
 * @author Juliardi <juliardi93@gmail.com>
 */
class SimpleRbacModule extends BaseModule
{
    /**
     * @var string
     */
    public $id = 'simplerbac';
    /**
     * @var string
     */
    public $defaultRoute = 'access/index';

    /**
     * @var array
     */
    public $admins = [];

	/**
     * @var string The Administrator permission name.
     */
    public $adminPermission;

    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow'         => true,
                        'roles'         => ['@'],
                        'matchCallback' => [$this, 'checkAccess'],
                    ]
                ],
            ],
        ];
    }
    /**
     * Checks access.
     *
     * @return bool
     */
    public function checkAccess()
    {
        $user = \Yii::$app->user->identity;
        if (method_exists($user, 'getIsAdmin')) {
            return $user->getIsAdmin();
        } else if ($this->adminPermission) {
            return $this->adminPermission ? \Yii::$app->user->can($this->adminPermission) : false;
        } else {
            return isset($user->username) ? in_array($user->username, $this->admins) : false;
        }
    }
}
