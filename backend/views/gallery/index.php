<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model \common\models\Gallery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Galleries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Gallery', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
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

    <?= Html::a('Added Images', ['/gallery-images'], ['class' => 'btn btn-warning pull-left'])?>
</div>
