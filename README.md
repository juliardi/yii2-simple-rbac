Yii2 Simple RBAC ![Status](https://img.shields.io/badge/status-development-yellow.svg) [![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
================
Simple RBAC module for Yii 2 Framework

<b>Caution : This package is still in development stage. Please do not use it for now.</b>

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist juliardi/yii2-simple-rbac "*"
```

or add

```
"juliardi/yii2-simple-rbac": "*"
```

to the require section of your `composer.json` file and then run

```
php composer.phar update
```

Setup
-----

Once the extension is installed, you must first set it up by :

1. Register yii2-simple-rbac as a module in `config\web.php`. Add this code before `return $config;` statement :
    
    ```
    $config['bootstrap'][] = 'simplerbac';
        $config['modules']['simplerbac'] = [
            'class' => 'juliardi\simplerbac\Module',
            'db' => 'db', //you can change this in case you are using different database for access control
        ];
    ```

2. Run migrations
    
    ```
    php yii migrate/up --migrationPath=@juliardi/simplerbac/migrations
    ```
    or in case you are using different database (we assume here as `db2`):
    
    ```
    php yii migrate/up --migrationPath=@juliardi/simplerbac/migrations --db=db2
    ```

3. Create 'user' table with a foreign key to table 'rbac_role'. You can see an example of yii2 migrations in `examples\migrations` directory.
4. Generate the model and CRUD of 'user' table using Gii
5. Implements `juliardi\simplerbac\base\UserRbacInterface` in your User model. You can see an example of yii2 model in `examples\models` directory.
6. You can now access it by visiting :
```
http://yourproject.dev/index.php?r=simplerbac
```

Usage
-----

Once the extension is configured, simply use it by :

1. Extends `juliardi/simplerbac/base/Controller` in your controller
2. That's all. You can set your access rules for your action by accessing :
```
http://yourproject.dev/index.php?r=simplerbac
```
