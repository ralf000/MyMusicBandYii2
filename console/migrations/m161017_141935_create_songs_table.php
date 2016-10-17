<?php

use yii\db\Migration;

/**
 * Handles the creation for table `songs`.
 */
class m161017_141935_create_songs_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('songs', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)->notNull(),
            'link' => $this->string(300)->notNull(),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(0),
            'album_id' => $this->integer()->notNull()
        ]);
        $this->addForeignKey('fk_album', 'songs', 'album_id', 'albums', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_album', 'songs');
        $this->dropTable('songs');
    }
}
