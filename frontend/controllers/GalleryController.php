<?php
/**
 * Created by PhpStorm.
 * User: kudinov
 * Date: 05.10.2016
 * Time: 15:58
 */

namespace frontend\controllers;


use common\models\Gallery;
use common\models\GalleryImages;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class GalleryController extends Controller
{

    /**
     * Displays blog page.
     * @return string
     */
    public function actionIndex()
    {
        $galleries = Gallery::findAll(['status' => 1]);
        $galleries = $this->setGalleriesThumbnail($galleries);
        return $this->render('index', [
            'galleries' => $galleries
        ]);
    }

    public function actionView()
    {
        $id = Yii::$app->request->get('id');
        $gallery = Gallery::findOne(['id' => $id, 'status' => '1']);
        $gallery = $this->setGalleryImages($gallery);
        $tags = GalleryImages::getTagsByGalleryId($id);
        if (!($id and $gallery))
            throw new NotFoundHttpException('Неверный id записи');
        return $this->render('view', [
            'gallery' => $gallery,
            'tags' => $tags
        ]);
    }

    private function setGalleriesThumbnail(array $galleries)
    {
        foreach ($galleries as $gallery) {
            /** @var Gallery $gallery */
            $gallery->thumbnail = GalleryImages::findOne(['gallery_name_id' => $gallery->id])['thumbnail'];
        }
        return $galleries;
    }

    /**
     * @param Gallery $gallery
     * @return void
     */
    private function setGalleryImages(Gallery $gallery)
    {
        $gallery->images = GalleryImages::findAll(['gallery_name_id' => $gallery->id]);
        return $gallery;
    }
    
}