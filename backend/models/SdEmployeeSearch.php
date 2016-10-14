<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SdEmployee;

/**
 * SdEmployeeSearch represents the model behind the search form about `app\models\SdEmployee`.
 */
class SdEmployeeSearch extends SdEmployee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'e_age', 'e_status'], 'integer'],
            [['e_pin', 'e_name', 'e_sex', 'e_idcard', 'e_mobile', 'e_dept_no', 'e_duty', 'e_class', 'e_title', 'e_pri', 'e_grp', 'e_tz', 'e_fingerprint', 'e_face', 'e_card', 'e_passwd', 'e_photo', 'e_checkin_dt', 'e_resign_dt', 'e_black_flag'], 'safe'],
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
        $query = SdEmployee::find();

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
            'e_age' => $this->e_age,
            'e_checkin_dt' => $this->e_checkin_dt,
            'e_resign_dt' => $this->e_resign_dt,
            'e_status' => $this->e_status,
        ]);

        $query->andFilterWhere(['like', 'e_pin', $this->e_pin])
            ->andFilterWhere(['like', 'e_name', $this->e_name])
            ->andFilterWhere(['like', 'e_sex', $this->e_sex])
            ->andFilterWhere(['like', 'e_idcard', $this->e_idcard])
            ->andFilterWhere(['like', 'e_mobile', $this->e_mobile])
            ->andFilterWhere(['like', 'e_dept_no', $this->e_dept_no])
            ->andFilterWhere(['like', 'e_duty', $this->e_duty])
            ->andFilterWhere(['like', 'e_class', $this->e_class])
            ->andFilterWhere(['like', 'e_title', $this->e_title])
            ->andFilterWhere(['like', 'e_pri', $this->e_pri])
            ->andFilterWhere(['like', 'e_grp', $this->e_grp])
            ->andFilterWhere(['like', 'e_tz', $this->e_tz])
            ->andFilterWhere(['like', 'e_fingerprint', $this->e_fingerprint])
            ->andFilterWhere(['like', 'e_face', $this->e_face])
            ->andFilterWhere(['like', 'e_card', $this->e_card])
            ->andFilterWhere(['like', 'e_passwd', $this->e_passwd])
            ->andFilterWhere(['like', 'e_photo', $this->e_photo])
            ->andFilterWhere(['like', 'e_black_flag', $this->e_black_flag]);

        return $dataProvider;
    }
}
