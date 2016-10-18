<?php

namespace common\models;

use common\helpers\Helper;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "slider".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $link
 * @property string $image
 * @property string $thumbnail
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Slide extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider';
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
            [['title', 'content', 'link', 'image'], 'required'],
            [['description', 'content'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'image', 'thumbnail'], 'string', 'max' => 200],
            [['link'], 'string', 'max' => 255],
            ['image', 'filter', 'filter' => function ($value) {
                return str_replace(Helper::getHost(), '', $value);
            }],
            ['thumbnail', 'filter', 'filter' => function ($value) {
                return str_replace([Helper::getHost(), 'source'], ['', 'web'], $this->image);
            }],
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
            'link' => 'Link',
            'image' => 'Image',
            'thumbnail' => 'Thumbnail',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
