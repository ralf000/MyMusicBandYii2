<?php

use common\helpers\Helper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\GalleryImagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model common\models\GalleryImages */

$this->title = 'Gallery Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-images-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Gallery Images', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'thumbnail',
                'label' => 'Image',
                'content' => function ($data) {
                    return '<img style="width: 100px" src="' . Helper::getHost() . $data->thumbnail . '">';
                },
            ],
//            'gallery_name_id',
            [
                'attribute' => 'gallery_name_id',
                'label' => 'Gallery',
                'content' => function ($data) {
                    return \common\models\GalleryImages::getGalleryNameById($data->gallery_name_id);
                }
            ],
            [
                'attribute' => 'created_at',
                'value' => $model->created_at,
                'format' => ['date', 'H:i:s dd-MM-Y'],
            ],
            [
                'attribute' => 'updated_at',
                'value' => $model->updated_at,
                'format' => ['date', 'H:i:s dd-MM-Y'],
            ],
             'tag',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
