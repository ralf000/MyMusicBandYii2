<?php

namespace backend\controllers;

use common\models\Gallery;
use Yii;
use common\models\GalleryImages;
use backend\models\GalleryImagesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GalleryImagesController implements the CRUD actions for GalleryImages model.
 */
class GalleryImagesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all GalleryImages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GalleryImagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GalleryImages model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GalleryImages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GalleryImages();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'galleries' => $this->getGalleries(),
                'tags' => $this->getTags(),
            ]);
        }
    }

    /**
     * Updates an existing GalleryImages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'galleries' => $this->getGalleries(),
                'tags' => $this->getTags(),
            ]);
        }
    }

    /**
     * Deletes an existing GalleryImages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GalleryImages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GalleryImages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GalleryImages::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function getGalleries()
    {
        $output = [];
        foreach (Gallery::find()->all() as $gallery) {
            /* @var $gallery Gallery */
            $output[$gallery->id] = $gallery->name;
        }
        return $output ?: [];
    }

    protected function getTags()
    {
        $output = [];
        foreach (GalleryImages::find()->all() as $model) {
            /* @var $model GalleryImages */
            if (!array_key_exists($model->tag, $output))
                $output[$model->tag] = $model->tag;
        }
        return $output ?: [];
    }
}
