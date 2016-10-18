<?php

namespace common\models;

use common\helpers\Helper;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "albums".
 *
 * @property integer $id
 * @property string $name
 * @property string $year
 * @property string $thumbnail
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Song[] $songs
 */
class Album extends ActiveRecord
{

    /**
     * @var array Song models
     */
    public $songs = [];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'albums';
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
            [['name', 'year', 'thumbnail'], 'required'],
            [['status', 'year', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['thumbnail'], 'string', 'max' => 255],
            ['thumbnail', 'filter', 'filter' => function ($value) {
                return str_replace(Helper::getHost(), '', $value);
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
            'name' => 'Name',
            'year' => 'Year',
            'thumbnail' => 'Thumbnail',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSongs()
    {
        return $this->hasMany(Song::className(), ['album_id' => 'id']);
    }
}
