<?php

use yii\db\Migration;

/**
 * Handles the creation for table `menu`.
 */
class m161005_144054_create_menu_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('menu', [
            'id' => $this->primaryKey(),
            'name' => $this->string(30)->notNull(),
            'link' => $this->string(200)->notNull(),
            'type_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ]);
        $this->addForeignKey('fk_menu_type', 'menu', 'type_id', 'vocabulary', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_menu_type', 'menu');
        $this->dropTable('menu');
    }
}
