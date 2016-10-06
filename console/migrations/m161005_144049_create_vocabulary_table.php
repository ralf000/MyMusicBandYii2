<?php

use yii\db\Migration;

/**
 * Handles the creation for table `vocabulary`.
 */
class m161005_144049_create_vocabulary_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('vocabulary', [
            'id' => $this->primaryKey(),
            'value' => $this->string(100)->notNull(),
            'dep_table' => $this->string(100)->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('vocabulary');
    }
}
