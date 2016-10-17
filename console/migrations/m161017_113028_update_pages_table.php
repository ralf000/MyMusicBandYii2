<?php

use yii\db\Migration;

class m161017_113028_update_pages_table extends Migration
{
    public function up()
    {
        $this->addColumn('pages', 'status', $this->smallInteger(1)->notNull()->defaultValue(0));
    }

    public function down()
    {
        return $this->dropColumn('pages', 'status');
    }
}
