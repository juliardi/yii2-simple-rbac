<?php

namespace juliardi\simplerbac;

use yii\base\Module as BaseModule;
use yii\db\Connection;
use yii\di\Instance;

/**
 * @author Juliardi <juliardi93@gmail.com>
 */
class Module extends BaseModule
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
     * {@inheritdoc}
     */
    public $controllerNamespace = 'juliardi\simplerbac\controllers';

    /**
     * @var yii\db\Connection Database connection used by extension
     */
    public $db;

    public function init()
    {
        $this->db = Instance::ensure($this->db, Connection::className());
        parent::init();
    }
}
