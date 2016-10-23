<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\vendor\yiimodules\newsletter\models\CampaignsQueue */

$this->title = 'Create new contact';
$this->params['breadcrumbs'][] = ['label' => 'Campaigns Queues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campaigns-queue-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
