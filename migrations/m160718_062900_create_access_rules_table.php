<?php

use yii\db\Migration;

/**
 * Handles the creation for table `access_rules`.
 */
class m160718_062900_create_access_rules_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('rbac_access_rules', [
            'id' => $this->primaryKey(),
            'role_id' => $this->integer()->notNull(),
                'route_id' => $this->integer()->notNull(),
            ]);

        $this->createIndex(
                'idx-access-rules-role_id',
                'rbac_access_rules',
                'role_id'
            );

        $this->createIndex(
                'idx-access-rules-route_id',
                'rbac_access_rules',
                'route_id'
            );

        $this->addForeignKey(
                'fk-access-rules-role_id',
                'rbac_access_rules',
                'role_id',
                'rbac_role',
                'id',
                'CASCADE'
            );

        $this->addForeignKey(
                'fk-access-rules-route_id',
                'rbac_access_rules',
                'route_id',
                'rbac_route',
                'id',
                'CASCADE'
            );

        $data = $this->initialData();

        foreach ($data as $value) {
            $this->insert('rbac_access_rules', $value);
        }
    }

    private function initialData()
    {
        return [
            [
                'role_id' => 1,
                'route_id' => 1,
            ],
            [
                'role_id' => 1,
                'route_id' => 2,
            ],
            [
                'role_id' => 1,
                'route_id' => 3,
            ],
            [
                'role_id' => 1,
                'route_id' => 4,
            ],
            [
                'role_id' => 1,
                'route_id' => 5,
            ],
            [
                'role_id' => 1,
                'route_id' => 6,
            ],
            [
                'role_id' => 1,
                'route_id' => 7,
            ],
            [
                'role_id' => 1,
                'route_id' => 8,
            ],
            [
                'role_id' => 1,
                'route_id' => 9,
            ],
            [
                'role_id' => 1,
                'route_id' => 10,
            ],
            [
                'role_id' => 1,
                'route_id' => 11,
            ],
            [
                'role_id' => 1,
                'route_id' => 12,
            ],
            [
                'role_id' => 1,
                'route_id' => 13,
            ],
            [
                'role_id' => 1,
                'route_id' => 14,
            ],
            [
                'role_id' => 1,
                'route_id' => 15,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropForeignKey('fk-access-rules-role_id', 'rbac_access_rules');
        $this->dropForeignKey('fk-access-rules-route_id', 'rbac_access_rules');

        $this->dropIndex('idx-access-rules-role_id', 'rbac_access_rules');
        $this->dropIndex('idx-access-rules-route_id', 'rbac_access_rules');

        $this->dropTable('rbac_access_rules');
    }
}
