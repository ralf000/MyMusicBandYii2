<?php

use yii\db\Migration;

/**
 * Handles the creation for table `slider`.
 */
class m161018_092523_create_slider_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('slider', [
            'id' => $this->primaryKey(),
            'title' => $this->string(200)->notNull(),
            'description' => $this->text(),
            'content' => $this->text()->notNull(),
            'link' => $this->string()->notNull(),
            'image' => $this->string(200)->notNull(),
            'thumbnail' => $this->string(200),
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
        $this->dropTable('slider');
    }
}
