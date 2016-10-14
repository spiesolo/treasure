<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SdSignin;

/**
 * SdSigninSearch represents the model behind the search form about `app\models\SdSignin`.
 */
class SdSigninSearch extends SdSignin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 's_workstatus', 's_verifytype', 's_workcode', 's_status'], 'integer'],
            [['s_owner_pin', 's_signtime', 's_machinesn', 's_owner_name', 's_owner_deptno', 's_owner_deptname'], 'safe'],
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
        $query = SdSignin::find();

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
            's_signtime' => $this->s_signtime,
            's_workstatus' => $this->s_workstatus,
            's_verifytype' => $this->s_verifytype,
            's_workcode' => $this->s_workcode,
            's_status' => $this->s_status,
        ]);

        $query->andFilterWhere(['like', 's_owner_pin', $this->s_owner_pin])
            ->andFilterWhere(['like', 's_machinesn', $this->s_machinesn])
            ->andFilterWhere(['like', 's_owner_name', $this->s_owner_name])
            ->andFilterWhere(['like', 's_owner_deptno', $this->s_owner_deptno])
            ->andFilterWhere(['like', 's_owner_deptname', $this->s_owner_deptname]);

        return $dataProvider;
    }
}
