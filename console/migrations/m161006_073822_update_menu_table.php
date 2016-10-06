<?php

use yii\db\Migration;

class m161006_073822_update_menu_table extends Migration
{
    public function up()
    {
        $this->addColumn('menu', 'sort_order', $this->smallInteger(1)->after('link')->notNull()->defaultValue(0));
    }

    public function down()
    {
        $this->dropColumn('menu', 'sort_order');
    }

}
