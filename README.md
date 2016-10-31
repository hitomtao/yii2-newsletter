#Newsletter Management Yii2 Module
Complete newsletter management module for Yii2 based web application, Ready to integrate

* Easy to install
* Create Unlimited newsletters
* Html enabled emails

### 1. Download

yii2-newsletter can be installed using composer. Run following command to download and
install yii2-newsletter:

```bash
composer require "yiimodules/yii2-newsletter:dev-master"
```

### 2. Configure

Add following lines to your main configuration file to access this module via web URL:

```php
'modules' => [
	'newsletter' => [
		'class' => 'yiimodules\newsletter\Module',
	],
],
```

#### Configure text editor module

```php
'modules' => [
	'redactor' => 'yii\redactor\RedactorModule',
],
```


### 3. Update database schema

The last thing you need to do is updating your database schema by applying the
migrations. Make sure that you have properly configured `db` application component
and run the following command:

```bash
$ php yii migrate/up --migrationPath=@vendor/yiimodules/yii2-newsletter/migrations
```

## Run module?

```bash
$ http://localhost/YOUR-PROJECT-NAME/web/index.php?r=newsletter
```

## Add enteries to created campaign

```php
// To Insert contact in newsletter campaign
$contact = array(
	'userId'		=> $user->id,
	'email'			=> $user->email,
	'mobile'		=> $user->profile->mobile
);
$campaignId 	= 	$campaignId;
Yii::$app->getModule('newsletter')->addContact($campaignId,$contact))
```
