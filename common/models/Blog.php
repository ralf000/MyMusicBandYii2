<?php

namespace common\models;

use common\helpers\Helper;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "blog".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $thumbnail
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Blog extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog';
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
            [['title', 'content'], 'required'],
            [['content'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 200],
            [['thumbnail'], 'filter', 'filter' => 'strip_tags'],
            [['title'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'thumbnail' => 'Thumbnail',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function setAttributes($values, $safeOnly = true)
    {
        if (array_key_exists('thumbnail', $values)) {
            if (preg_match('~src=[\"\']http\://'
                . end(explode('.', Yii::$app->request->hostInfo))
                . '(.+)[\"\']~U', $values['thumbnail'], $result))
                $values['thumbnail'] = $result[1];
        }
        parent::setAttributes($values, $safeOnly);
    }
}
