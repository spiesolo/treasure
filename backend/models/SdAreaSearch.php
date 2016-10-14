<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SdArea;

/**
 * SdAreaSearch represents the model behind the search form about `app\models\SdArea`.
 */
class SdAreaSearch extends SdArea
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'a_status'], 'integer'],
            [['a_sn', 'a_parent_sn', 'a_name', 'a_remark'], 'safe'],
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
        $query = SdArea::find();

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
            'a_status' => $this->a_status,
        ]);

        $query->andFilterWhere(['like', 'a_sn', $this->a_sn])
            ->andFilterWhere(['like', 'a_parent_sn', $this->a_parent_sn])
            ->andFilterWhere(['like', 'a_name', $this->a_name])
            ->andFilterWhere(['like', 'a_remark', $this->a_remark]);

        return $dataProvider;
    }
}
