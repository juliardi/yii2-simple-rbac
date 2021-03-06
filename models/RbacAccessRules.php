<?php

namespace juliardi\simplerbac\models;

/**
 * This is the model class for table "rbac_access_rules".
 *
 * @property int $id
 * @property int $role_id
 * @property int $route_id
 * @property RbacRole $role
 * @property RbacRoute $route
 */
class RbacAccessRules extends \juliardi\simplerbac\base\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rbac_access_rules';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_id', 'route_id'], 'required'],
            [['role_id', 'route_id'], 'integer'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => RbacRole::className(), 'targetAttribute' => ['role_id' => 'id']],
            [['route_id'], 'exist', 'skipOnError' => true, 'targetClass' => RbacRoute::className(), 'targetAttribute' => ['route_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role ID',
            'route_id' => 'Route ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(RbacRole::className(), ['id' => 'role_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoute()
    {
        return $this->hasOne(RbacRoute::className(), ['id' => 'route_id']);
    }
}
