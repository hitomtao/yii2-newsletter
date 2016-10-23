<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\vendor\yiimodules\newsletter\models\NewsletterCampaigns */

$this->title = 'Create Newsletter Campaigns';
$this->params['breadcrumbs'][] = ['label' => 'Newsletter Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newsletter-campaigns-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
