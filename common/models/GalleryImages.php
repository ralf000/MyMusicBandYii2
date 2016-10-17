<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Query;

/**
 * This is the model class for table "gallery_images".
 *
 * @property integer $id
 * @property string $image
 * @property string $thumbnail
 * @property integer $gallery_name_id
 * @property string $tag
 *
 * @property Gallery $galleryName
 */
class GalleryImages extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_images';
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
            [['image', 'gallery_name_id', 'tag'], 'required'],
            [['gallery_name_id', 'created_at', 'updated_at'], 'integer'],
            [['image', 'thumbnail'], 'string', 'max' => 200],
            [['tag'], 'string', 'max' => 100],
            [['gallery_name_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gallery::className(), 'targetAttribute' => ['gallery_name_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'thumbnail' => 'Thumbnail',
            'gallery_name_id' => 'Gallery Name ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'tag' => 'Tag',
        ];
    }

    public function setAttributes($values, $safeOnly = true)
    {
        parent::setAttributes($values, $safeOnly);
        $this->image = str_replace('http://' . end(explode('.', $_SERVER['HTTP_HOST'])), '', $this->image);
        $this->thumbnail = str_replace('source', 'web', $this->image);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalleryName()
    {
        return $this->hasOne(Gallery::className(), ['id' => 'gallery_name_id']);
    }

    /**
     * @param int $id
     * @return string|null
     */
    public static function getGalleryNameById(int $id)
    {
        return Gallery::findOne(['id' => $id]) ? Gallery::findOne(['id' => $id])['name'] : null;
    }

    /**
     * @param int $id
     * @return array|bool
     */
    public static function getTagsByGalleryId(int $id)
    {
        return GalleryImages::find()->select('tag')->where(['gallery_name_id' => $id])->distinct()->all() ?: false;
    }

}
