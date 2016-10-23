<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yiimodules\newsletter\models\Campaigns;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\vendor\yiimodules\newsletter\models\CampaignsQueue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="campaigns-queue-form">

    <?php $form = ActiveForm::begin(); ?>

	<?php
	$items = ArrayHelper::map(Campaigns::find()->all(), 'id', 'subject');
	?>
	<?= $form->field($model, 'newsletter_campaigns_id')->dropDownList($items); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
