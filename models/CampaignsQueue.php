<?php

namespace yiimodules\newsletter\models;

use Yii;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "newsletter_campaigns_queue".
 *
 * @property string $id
 * @property integer $newsletter_campaigns_id
 * @property integer $user_id
 * @property string $email
 * @property string $mobile
 * @property string $created_at
 * @property string $send_time
 * @property integer $is_sent
 * @property integer $created_by_user_id
 * @property string $updated_at
 *
 * @property NewsletterCampaigns $newsletterCampaigns
 */
class CampaignsQueue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'newsletter_campaigns_queue';
    }
	
	public function behaviors()
	{
		return [
			[
				'class' => TimestampBehavior::className(),
				'createdAtAttribute' => 'created_at',
				'updatedAtAttribute' => 'updated_at',
				'value' => new Expression('NOW()'),
			],
		];
	}	

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['newsletter_campaigns_id'], 'required'],
            [['newsletter_campaigns_id', 'user_id', 'is_sent', 'created_by_user_id'], 'integer'],
            [['created_at', 'send_time', 'updated_at'], 'safe'],
            [['email'], 'string', 'max' => 150],
            [['mobile'], 'string', 'max' => 20],
            [['newsletter_campaigns_id'], 'exist', 'skipOnError' => true, 'targetClass' => Campaigns::className(), 'targetAttribute' => ['newsletter_campaigns_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'newsletter_campaigns_id' => 'Newsletter Campaigns ID',
            'user_id' => 'User ID',
            'email' => 'Email',
            'mobile' => 'Mobile',
            'created_at' => 'Created At',
            'send_time' => 'Send Time',
            'is_sent' => 'Is Sent',
            'created_by_user_id' => 'Created By User ID',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampaign()
    {
        return $this->hasOne(Campaigns::className(), ['id' => 'newsletter_campaigns_id']);
    }
	
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id']);
    }
	
}
