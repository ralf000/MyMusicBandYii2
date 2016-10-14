<?php

use common\helpers\Helper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\GalleryImages */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Gallery Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-images-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'thumbnail',
                'value' => $model->thumbnail ? Helper::getHost() . $model->thumbnail : '',
                'format' => ['image', ['width' => '300']]
            ],
            [
                'attribute' => 'gallery_name_id',
                'label' => 'Gallery',
                'value' => \common\models\GalleryImages::getGalleryNameById($model->gallery_name_id)
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
        ],
    ]) ?>

</div>
