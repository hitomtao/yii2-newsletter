<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\vendor\yiimodules\newsletter\models\CampaignsQueueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Add new contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campaigns-queue-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	
	<?= $this->render('/_alert', [
		'module' => Yii::$app->getModule('newsletter'),
	]) ?>

	<?= $this->render('/_menu') ?>		

    <p>
        <?= Html::a('Create Campaigns Queue', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'campaign.subject',
            //'user_id',
            'email:email',
            //'mobile',
            'created_at',
            'send_time',
			[
				'attribute' => 'gender',
				'header'	=> 'Gender',
				'filter' => Html::ActiveDropDownList($searchModel, 'gender',[''=>'All','MALE'=>'Male','FEMALE'=>'Female'],['class'=>'form-control']),
				'value' => function ($model) {
					return (isset($model->user->profile) && ($model->user->profile->gender == "MALE"))
						? '<center class="text-success">Male</center>'
						: '<center class="text-success">Female</center>';
				},
				'format' => 'html',
			],
			[
				'attribute' => 'country_id',
				'header'	=> 'Country',
				'filter' => Html::ActiveDropDownList($searchModel, 'country_id',ArrayHelper::map(\app\models\PlacesCountry::find()->asArray()->all(), 'id', 'name'),['prompt'=>'All','class'=>'form-control']),
				'value' => function ($model) {
					return (isset($model->user->profile) && ($model->user->profile->places_country_id != ""))
						? '<center class="text-success">'.$model->user->profile->country->name.'</center>'
						: '<center class="text-success"></center>';
				},
				'format' => 'html',
			],
			[
				'attribute'=>'is_sent',
				'value'=> function($model){
					return ($model->is_sent==0) ? "Pending" : "Sent";
				}
			],
            // 'created_by_user_id',
            // 'updated_at',

			['class' => 'yii\grid\ActionColumn','template'=>'{update} {delete}'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
