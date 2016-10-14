<?php

use common\helpers\Helper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model \common\models\Blog */
/* @var $searchModel backend\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blogs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Новая запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
//            'description',
//            'thumbnail',
            [
                'attribute' => 'thumbnail',
                'label' => 'Image',
                'content' => function ($data) {
                    return '<img style="width: 100px" src="' . Helper::getHost() . $data->thumbnail . '">';
                },
            ],
            [
                'attribute' => 'status',
                'label' => 'Status',
                'content' => function ($data) {
                    return ($data) ? 'Published' : 'Unpublished';
                }
            ],
//            'status',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
