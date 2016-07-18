<?php

use yii\db\Migration;

/**
 * Handles the creation for table `route`.
 */
class m160718_062842_create_route_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('rbac_route', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
        ]);

        $this->insert('rbac_route', [
            'name' => 'route/example'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('rbac_route');
    }
}
