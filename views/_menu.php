<?php
use yii\bootstrap\Nav;
?>

<?= Nav::widget([
    'options' => [
        'class' => 'nav-tabs',
        'style' => 'margin-bottom: 15px',
    ],
    'items' => [
        [
            'label'   => 'Manage campaigns',
            'url'     => ['/newsletter/campaigns/index'],
        ],
        [
            'label'   => 'Campaigns queue',
            'url'     => ['/newsletter/campaigns-queue/index'],
            'visible' => true,
        ],
    ],
]) ?>
