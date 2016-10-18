<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Song */
/* @var $albums array */

$this->title = 'Create Song';
$this->params['breadcrumbs'][] = ['label' => 'Songs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="song-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'albums' => $albums
    ]) ?>

</div>
