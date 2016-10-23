<?php

namespace yiimodules\newsletter\models;

use Yii;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "newsletter_campaigns".
 *
 * @property integer $id
 * @property string $subject
 * @property string $type
 * @property string $body
 * @property integer $is_active
 * @property string $schedule_date_time
 * @property string $created_at
 * @property string $updated_at
 *
 * @property NewsletterCampaignsQueue[] $newsletterCampaignsQueues
 */
class Campaigns extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'newsletter_campaigns';
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
            [['subject', 'type', 'body'], 'required'],
            [['type', 'body'], 'string'],
            [['is_active'], 'integer'],
            [['schedule_date_time', 'created_at', 'updated_at'], 'safe'],
            [['subject'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject' => 'Subject',
            'type' => 'Type',
            'body' => 'Body',
            'is_active' => 'Status',
            'schedule_date_time' => 'Schedule Date Time',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsletterCampaignsQueues()
    {
        return $this->hasMany(NewsletterCampaignsQueue::className(), ['newsletter_campaigns_id' => 'id']);
    }
}
