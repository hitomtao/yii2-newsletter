<?php

namespace yiimodules\newsletter;

use Yii;
use yiimodules\newsletter\models\Campaigns;
use yiimodules\newsletter\models\CampaignsQueue;

/**
 * newsletter module definition class
 */
class Module extends \yii\base\Module
{
	public $enableFlashMessages = true;
	
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'yiimodules\newsletter\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
	
	/*
		arr['campaignId'] = ''
		arr['userId'] = ''
		arr['email'] = ''
		arr['mobile'] = ''
	*/
	
	public function addContact($campaignId,$contact){
		$campaigns = Campaigns::findOne($campaignId);
		if($campaigns===null){
			return false;
		}
		$model = new CampaignsQueue();
		$model->newsletter_campaigns_id = $campaignId;
		$model->user_id 				= $contact['userId'];
		$model->email 					= $contact['email'];
		$model->mobile 					= $contact['mobile'];
		$model->send_time = $campaigns->schedule_date_time;
		$model->created_by_user_id = Yii::$app->user->getId();
		if($model->save()){
			return true;
		} else{
			return false;
		}
	}
}
