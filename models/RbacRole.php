<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rbac_role".
 *
 * @property integer $id
 * @property string $name
 *
 * @property RbacAccessRules[] $rbacAccessRules
 * @property RbacUser[] $rbacUsers
 */
class RbacRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rbac_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
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
        return $this->hasMany(RbacAccessRules::className(), ['role_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRbacUsers()
    {
        return $this->hasMany(RbacUser::className(), ['role_id' => 'id']);
    }
}
