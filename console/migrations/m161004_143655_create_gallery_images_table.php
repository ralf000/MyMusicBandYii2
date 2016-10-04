<?php

use yii\db\Migration;

/**
 * Handles the creation for table `gallery_images`.
 */
class m161004_143655_create_gallery_images_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('gallery_images', [
            'id' => $this->primaryKey(),
            'image' => $this->string(200)->notNull(),
            'thumbnail' => $this->string(200),
            'gallery_name_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ]);
        $this->addForeignKey('fk_gallery_name', 'gallery_images', 'gallery_name_id', 'gallery', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_gallery_name', 'gallery_images');
        $this->dropTable('gallery_images');
    }
}
