<?php

use yii\db\Migration;

/**
 * Handles the creation for table `gallery`.
 */
class m161004_143452_create_gallery_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('gallery', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->notNull(),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('gallery');
    }
}
