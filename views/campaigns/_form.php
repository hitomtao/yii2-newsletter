<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\vendor\yiimodules\newsletter\models\NewsletterCampaigns */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="newsletter-campaigns-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<div class="form-group">
		<div class="row">
		<div class="col-md-5">
		<label><?= $model->getAttributeLabel('schedule_date_time'); ?></label>
		<?php
		if($model->schedule_date_time=="0000-00-00 00:00:00"){
			$model->schedule_date_time = \Yii::$app->formatter->asDatetime(time(), "php:d M Y h:i a");
		}
		echo DateTimePicker::widget([
		'model' => $model,
		'attribute' => 'schedule_date_time',
		'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
		'pluginOptions' => [
			'autoclose'=>true,
			'format' => 'dd-M-yyyy hh:ii'
		]
		]);
		?>
		</div>
		</div>
	</div>	

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'body')->widget(\yii\redactor\widgets\Redactor::className()) ?>

    <?= $form->field($model, 'is_active')->dropDownList(array("1"=>"Active","0"=>"InActive")) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-lg btn-primary' : 'btn btn-lg btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
