<?php

namespace common\models;

use common\helpers\Helper;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "songs".
 *
 * @property integer $id
 * @property string $name
 * @property string $link
 * @property integer $status
 * @property integer $album_id
 *
 * @property Album $album
 */
class Song extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'songs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'link', 'album_id'], 'required'],
            [['status', 'album_id'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['link'], 'string', 'max' => 300],
            ['link', 'filter', 'filter' => function ($value) {
                return str_replace(Helper::getHost(), '', $value);
            }],
            [['album_id'], 'exist', 'skipOnError' => true, 'targetClass' => Album::className(), 'targetAttribute' => ['album_id' => 'id']],
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
            'status' => 'Status',
            'album_id' => 'Album ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbum()
    {
        return $this->hasOne(Album::className(), ['id' => 'album_id']);
    }
}
