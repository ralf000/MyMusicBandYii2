<?php

use common\helpers\Helper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Albums';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Album', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'thumbnail',
                'label' => 'Image',
                'content' => function ($data) {
                    return $data->thumbnail ? '<img style="width: 100px" src="' . Helper::getHost() . $data->thumbnail . '">' : null;
                },
            ],
            [
                'attribute' => 'status',
                'label' => 'Status',
                'content' => function ($data) {
                    return ($data) ? 'Published' : 'Unpublished';
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
