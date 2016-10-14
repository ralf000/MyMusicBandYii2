<?php

namespace common\components;

use common\models\Vocabulary;

class ActiveRecord extends \yii\db\ActiveRecord
{
    /**
     * @param int $id
     * @return Vocabulary
     */
    public static function getValueFromVocabulary(int $id) : Vocabulary
    {
        return (new Vocabulary())->findOne(['id' => $id]);
    }
    
}