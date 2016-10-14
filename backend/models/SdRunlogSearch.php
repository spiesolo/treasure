<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SdRunlog;

/**
 * SdRunlogSearch represents the model behind the search form about `app\models\SdRunlog`.
 */
class SdRunlogSearch extends SdRunlog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'r_type', 'r_status'], 'integer'],
            [['r_content', 'r_logtime', 'r_operator', 'r_operateitem'], 'safe'],
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
        $query = SdRunlog::find();

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
            'r_type' => $this->r_type,
            'r_logtime' => $this->r_logtime,
            'r_status' => $this->r_status,
        ]);

        $query->andFilterWhere(['like', 'r_content', $this->r_content])
            ->andFilterWhere(['like', 'r_operator', $this->r_operator])
            ->andFilterWhere(['like', 'r_operateitem', $this->r_operateitem]);

        return $dataProvider;
    }
}
