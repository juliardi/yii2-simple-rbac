<?php

namespace juliardi\simplerbac;

use yii\base\Module as BaseModule;

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
}
