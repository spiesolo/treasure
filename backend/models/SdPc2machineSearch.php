<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SdPc2machine;

/**
 * SdPc2machineSearch represents the model behind the search form about `app\models\SdPc2machine`.
 */
class SdPc2machineSearch extends SdPc2machine
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'p_orderid', 'p_status'], 'integer'],
            [['p_machinesn', 'p_ordercontent', 'p_ordertime', 'p_sendouttime', 'p_responsetime', 'p_responsevalue', 'p_execflag'], 'safe'],
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
        $query = SdPc2machine::find();

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
            'ID' => $this->ID,
            'p_orderid' => $this->p_orderid,
            'p_ordertime' => $this->p_ordertime,
            'p_sendouttime' => $this->p_sendouttime,
            'p_responsetime' => $this->p_responsetime,
            'p_status' => $this->p_status,
        ]);

        $query->andFilterWhere(['like', 'p_machinesn', $this->p_machinesn])
            ->andFilterWhere(['like', 'p_ordercontent', $this->p_ordercontent])
            ->andFilterWhere(['like', 'p_responsevalue', $this->p_responsevalue])
            ->andFilterWhere(['like', 'p_execflag', $this->p_execflag]);

        return $dataProvider;
    }
}
