<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation for table `blog`.
 */
class m161003_093741_create_blog_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('blog', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100)->notNull()->unique(),
            'description' => $this->string(200),
            'content' => $this->text()->notNull(),
            'thumbnail' => $this->string(),
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
        $this->dropTable('blog');
    }
}
