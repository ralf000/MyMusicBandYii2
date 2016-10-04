<?php

namespace common\helpers;

use Yii;

class Helper
{
    public static function getHost(){
        return 'http://' . end(explode('.', Yii::$app->request->hostInfo));
    }
}