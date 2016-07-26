<?php

namespace juliardi\simplerbac\base;

use Yii;
use yii\db\ActiveRecord as BaseActiveRecord;

/**
 * @author Juliardi <juliardi93@gmail.com>
 */
class ActiveRecord extends BaseActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function getDb()
    {
        return Yii::$app->getModule('simplerbac')->db;
    }
}
