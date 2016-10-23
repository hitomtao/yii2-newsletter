<h1>Newsletter Dashboard</h1>
<ul class="list-group">
	<li class="list-group-item">
		<a href="<?php echo Yii::$app->urlManager->createUrl(['/newsletter/campaigns/index']); ?>">Manage campaigns</a>
		<p class="text-muted">Create campaign with subject, message and schedule time.</p>
	</li>
	<li class="list-group-item">
		<a href="<?php echo Yii::$app->urlManager->createUrl(['/newsletter/campaigns-queue/index']); ?>">Message queue</a>
		<p class="text-muted">Add contact to campaigns for sending emails.</p>
	</li>
</ul>