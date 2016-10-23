<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Newsletter Campaigns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newsletter-campaigns-index">

    <h1><?= Html::encode($this->title) ?></h1>
	
	<?= $this->render('/_alert', [
		'module' => Yii::$app->getModule('newsletter'),
	]) ?>

	<?= $this->render('/_menu') ?>	

    <p>
        <?= Html::a('Create Newsletter Campaigns', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'subject',
            //'type',
            'body:ntext',
            'is_active',
            'schedule_date_time',
            // 'created_at',
            // 'updated_at',
            ['class' => 'yii\grid\ActionColumn','template'=>'{update} {delete}'],
        ],
    ]); ?>
</div>
