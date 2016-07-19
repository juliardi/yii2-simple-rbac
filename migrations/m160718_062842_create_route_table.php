<?php

use yii\db\Migration;

/**
 * Handles the creation for table `route`.
 */
class m160718_062842_create_route_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('rbac_route', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
        ]);

        $data = $this->initialData();
        foreach ($data as $value) {
            $this->insert('rbac_route', $value);
        }
    }

    private function initialData()
    {
        return [
            ['name' => 'access/index'],
            ['name' => 'access/view'],
            ['name' => 'access/create'],
            ['name' => 'access/update'],
            ['name' => 'access/delete'],
            ['name' => 'role/index'],
            ['name' => 'role/view'],
            ['name' => 'role/create'],
            ['name' => 'role/update'],
            ['name' => 'role/delete'],
            ['name' => 'route/index'],
            ['name' => 'route/view'],
            ['name' => 'route/create'],
            ['name' => 'route/update'],
            ['name' => 'route/delete'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('rbac_route');
    }
}
