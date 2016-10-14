<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SdDepartment;

/**
 * SdDepartmentSearch represents the model behind the search form about `app\models\SdDepartment`.
 */
class SdDepartmentSearch extends SdDepartment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'd_status'], 'integer'],
            [['d_sn', 'd_parent_sn', 'd_name', 'd_label', 'd_admin', 'd_duty', 'd_remark'], 'safe'],
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
        $query = SdDepartment::find();

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
            'd_status' => $this->d_status,
        ]);

        $query->andFilterWhere(['like', 'd_sn', $this->d_sn])
            ->andFilterWhere(['like', 'd_parent_sn', $this->d_parent_sn])
            ->andFilterWhere(['like', 'd_name', $this->d_name])
            ->andFilterWhere(['like', 'd_label', $this->d_label])
            ->andFilterWhere(['like', 'd_admin', $this->d_admin])
            ->andFilterWhere(['like', 'd_duty', $this->d_duty])
            ->andFilterWhere(['like', 'd_remark', $this->d_remark]);

        return $dataProvider;
    }
}
