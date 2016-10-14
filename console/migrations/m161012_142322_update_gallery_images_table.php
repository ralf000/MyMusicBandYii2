<?php

use yii\db\Migration;

class m161012_142322_update_gallery_images_table extends Migration
{
    public function up()
    {
        $this->addColumn('gallery_images', 'tag', $this->string(100)->notNull());
    }

    public function down()
    {
       $this->dropColumn('gallery_images', 'tag');
    }
}
