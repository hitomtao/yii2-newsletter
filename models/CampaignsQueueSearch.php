<?php

namespace yiimodules\newsletter\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yiimodules\newsletter\models\CampaignsQueue;

/**
 * CampaignsQueueSearch represents the model behind the search form about `app\vendor\yiimodules\newsletter\models\CampaignsQueue`.
 */
class CampaignsQueueSearch extends CampaignsQueue
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'newsletter_campaigns_id', 'user_id', 'is_sent', 'created_by_user_id'], 'integer'],
            [['email', 'mobile', 'created_at', 'send_time', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CampaignsQueue::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'newsletter_campaigns_id' => $this->newsletter_campaigns_id,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'send_time' => $this->send_time,
            'is_sent' => $this->is_sent,
            'created_by_user_id' => $this->created_by_user_id,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'mobile', $this->mobile]);

        return $dataProvider;
    }
}
