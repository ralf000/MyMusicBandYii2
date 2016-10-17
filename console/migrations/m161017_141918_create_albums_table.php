<?php

use yii\db\Migration;

/**
 * Handles the creation for table `albums`.
 */
class m161017_141918_create_albums_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('albums', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->notNull(),
            'thumbnail' => $this->string()->notNull(),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('albums');
    }
}
