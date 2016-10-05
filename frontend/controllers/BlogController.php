<?php
/**
 * Created by PhpStorm.
 * User: kudinov
 * Date: 05.10.2016
 * Time: 15:58
 */

namespace frontend\controllers;


use common\models\Blog;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BlogController extends Controller
{

    /**
     * Displays blog page.
     * @return string
     */
    public function actionIndex()
    {
        $model = new Blog();
        $articles = $model->findAll(['status' => 1]);
        return $this->render('index', [
            'articles' => $articles
        ]);
    }

    public function actionArticle()
    {
        $model = new Blog();
        $id = Yii::$app->request->get('id');
        $article = $model->findOne(['id' => $id]);
        if (!($id || $article))
            throw new NotFoundHttpException('Неверный id записи');
        return $this->render('article', [
            'article' => $article
        ]);
    }
}