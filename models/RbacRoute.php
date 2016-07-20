<?php

namespace juliardi\simplerbac\models;

/**
 * This is the model class for table "rbac_route".
 *
 * @property int $id
 * @property string $name
 * @property RbacAccessRules[] $rbacAccessRules
 */
class RbacRoute extends \juliardi\simplerbac\base\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rbac_route';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRbacAccessRules()
    {
        return $this->hasMany(RbacAccessRules::className(), ['route_id' => 'id']);
    }
}
