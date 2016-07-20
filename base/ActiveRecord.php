<?php

namespace juliardi\simplerbac\base;

use Yii;
use yii\db\ActiveRecord;

/**
 * @author Juliardi <juliardi93@gmail.com>
 */
class ActiveRecord extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function getDb()
    {
        return Yii::$app->getModule('simplerbac')->db;
    }
}
