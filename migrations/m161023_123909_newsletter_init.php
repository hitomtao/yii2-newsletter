<?php

use yii\db\Migration;
use yii\db\Schema;

class m161023_123909_newsletter_init extends Migration
{
    public function up()
    {
        $this->createTable('{{newsletter_campaigns}}', [
            'id' 					=> Schema::TYPE_PK,
            'subject'             	=> Schema::TYPE_STRING . '(45) NOT NULL',
            'type'                	=> "enum('EMAIL','SMS')",
            'body'        			=> Schema::TYPE_TEXT . '(1000) NOT NULL',
            'is_active'             => Schema::TYPE_BOOLEAN,
            'schedule_date_time'  	=> Schema::TYPE_TIMESTAMP,
            'created_at' 			=> Schema::TYPE_DATETIME,
            'updated_at'         	=> Schema::TYPE_DATETIME,
        ]);

        $this->createTable('{{newsletter_campaigns_queue}}', [
            'id' 						=> Schema::TYPE_PK,
            'newsletter_campaigns_id'   => Schema::TYPE_INTEGER,
            'user_id'                	=> Schema::TYPE_INTEGER,
            'email'        				=> Schema::TYPE_STRING . '(150)',
            'mobile'            		=> Schema::TYPE_STRING . '(20)',
            'created_at'  				=> Schema::TYPE_DATETIME,
            'send_time' 				=> Schema::TYPE_TIMESTAMP,
            'is_sent'         			=> Schema::TYPE_BOOLEAN,
            'created_by_user_id'        => Schema::TYPE_INTEGER,
            'updated_at'         		=> Schema::TYPE_DATETIME,
        ]);
		
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk_queue_newsletter_campaigns_id',
            'newsletter_campaigns_queue',
            'newsletter_campaigns_id',
            'newsletter_campaigns',
            'id',
            'CASCADE'
        );
		
		
    }

    public function down()
    {
		$this->dropTable('{{newsletter_campaigns}}');
		$this->dropTable('{{newsletter_campaigns_queue}}');
    }
}
