<?php

use yii\db\Migration;

/**
 * Handles the creation for table `role`.
 */
class m160718_061659_create_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('rbac_role', [
            'id' => $this->primaryKey(),
            'name' => $this->string(20)->notNull(),
        ]);

        $data = $this->initialData();
        foreach ($data as $value) {
            $this->insert('rbac_role', $value);
        }
    }

    private function initialData()
    {
        return [
            ['name' => 'superadmin'],
            ['name' => 'guest'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('rbac_role');
    }
}
