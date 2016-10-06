<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vocabulary".
 *
 * @property integer $id
 * @property string $value
 * @property string $dep_table
 *
 * @property Menu[] $menus
 */
class Vocabulary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vocabulary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value'], 'required'],
            [['value', 'dep_table'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
            'dep_table' => 'Dep Table',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::className(), ['type_id' => 'id']);
    }
}
