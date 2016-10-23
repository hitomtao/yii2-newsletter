<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\vendor\yiimodules\newsletter\models\NewsletterCampaigns */

$this->title = 'Update Newsletter Campaigns: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Newsletter Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="newsletter-campaigns-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
