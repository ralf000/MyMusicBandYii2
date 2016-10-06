<?php

namespace common\models;

use common\components\ActiveRecord;
use common\helpers\Helper;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property string $name
 * @property string $link
 * @property string $sort_order
 * @property integer $type_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Vocabulary $type
 */
class Menu extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'link', 'sort_order', 'type_id'], 'required'],
            [['sort_order', 'type_id'], 'integer'],
            [['name'], 'string', 'max' => 30],
            [['link'], 'string', 'max' => 200],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vocabulary::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'link' => 'Link',
            'sort_order' => 'Sort order',
            'type_id' => 'Type ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Vocabulary::className(), ['id' => 'type_id']);
    }

    /**
     * get Menu Types
     * @return array
     */
    public function getMenuTypes() : array
    {
        return (new Vocabulary())->findAll(['dep_table' => (new Menu)->tableName()]);
    }

    public function getDropDownList(array $array): array
    {
        $output = [];
        foreach ($array as $val) {
            $output[$val->id] = ucfirst($val->value);
        }
        return $output ?: null;
    }

    /**
     * Получить все модели из таблицы menu
     * @return array|null
     */
    public static function getMainMenu() : array
    {
        return (new self)->find()->orderBy('sort_order')->all();
    }

    /**
     * Получает меню, оформленное для виджета Menu
     * @param array $menu
     * @return null
     */
    public static function handledFromMenuWidget(array $menu)
    {
        $output = [];
        foreach ($menu as $item) {
            $output[] = ['label' => $item->name, 'url' => [$item->link]];
        }
        return $output ?: null;
    }

    /**
     * @return int
     */
    public static function getNumMenuItems() : int
    {
        return count(self::getMainMenu());
    }
}
