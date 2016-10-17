<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "albums".
 *
 * @property integer $id
 * @property string $name
 * @property string $thumbnail
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Songs[] $songs
 */
class Album extends \yii\db\ActiveRecord
{
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
    public function rules()
    {
        return [
            [['name', 'thumbnail', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['thumbnail'], 'string', 'max' => 255],
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
        return $this->hasMany(Songs::className(), ['album_id' => 'id']);
    }
}
