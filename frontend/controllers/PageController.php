<?php
/**
 * Created by PhpStorm.
 * User: kudinov
 * Date: 05.10.2016
 * Time: 15:58
 */

namespace frontend\controllers;


use common\models\Blog;
use common\models\Page;
use frontend\models\ContactForm;
use tests\codeception\frontend\_pages\AboutPage;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PageController extends Controller
{

    /**
     * Displays blog page.
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect(Yii::$app->homeUrl);
    }

    public function actionAbout()
    {
        return $this->render('about', [
            'model' => Page::findOne(['id' => 1]) ?: false
        ]);
    }

    public function actionContacts()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['pressEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            $this->layout = 'page';
            return $this->render('contacts', [
                'model' => $model,
                'page' => Page::findOne(['id' => 2]) ?: false
            ]);
        }
    }
}