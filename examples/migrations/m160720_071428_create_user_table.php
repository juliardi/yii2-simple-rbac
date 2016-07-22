<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user_table`.
 */
class m160720_071428_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('rbac_user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(100)->notNull(),
            'password' => $this->string(50)->notNull(),
            'authKey' => $this->text(),
            'accessToken' => $this->text(),
            'role_id' => $this->integer(),
        ]);

        $this->createIndex('idx-user-role_id', 'rbac_user', 'role_id');

        $this->addForeignKey(
            'fk-user-role_id',
            'rbac_user',
            'role_id',
            'rbac_role',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropForeignKey('fk-user-role_id', 'rbac_user');
        $this->dropIndex('idx-user-role_id', 'rbac_user');
        $this->dropTable('rbac_user');
    }
}
