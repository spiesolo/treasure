<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SdMachine;

/**
 * SdMachineSearch represents the model behind the search form about `app\models\SdMachine`.
 */
class SdMachineSearch extends SdMachine
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'm_usercount', 'm_tmpcount', 'm_signcount', 'm_needfaceamount', 'm_facecount', 'm_errordelay', 'm_delay', 'm_area_ID', 'm_status'], 'integer'],
            [['m_sn', 'm_firmware', 'm_ipaddress', 'm_fpversion', 'm_faceversion', 'm_functionflag', 'm_stamp', 'm_opstamp', 'm_transtimes', 'm_transinterval', 'm_transflag', 'm_realtimetrans', 'm_encrypt', 'm_newtime', 'm_onlineinfo', 'm_style', 'm_name', 'm_address', 'm_pushver', 'm_language', 'm_pushcommkey'], 'safe'],
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
        $query = SdMachine::find();

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
            'm_usercount' => $this->m_usercount,
            'm_tmpcount' => $this->m_tmpcount,
            'm_signcount' => $this->m_signcount,
            'm_needfaceamount' => $this->m_needfaceamount,
            'm_facecount' => $this->m_facecount,
            'm_errordelay' => $this->m_errordelay,
            'm_delay' => $this->m_delay,
            'm_newtime' => $this->m_newtime,
            'm_area_ID' => $this->m_area_ID,
            'm_status' => $this->m_status,
        ]);

        $query->andFilterWhere(['like', 'm_sn', $this->m_sn])
            ->andFilterWhere(['like', 'm_firmware', $this->m_firmware])
            ->andFilterWhere(['like', 'm_ipaddress', $this->m_ipaddress])
            ->andFilterWhere(['like', 'm_fpversion', $this->m_fpversion])
            ->andFilterWhere(['like', 'm_faceversion', $this->m_faceversion])
            ->andFilterWhere(['like', 'm_functionflag', $this->m_functionflag])
            ->andFilterWhere(['like', 'm_stamp', $this->m_stamp])
            ->andFilterWhere(['like', 'm_opstamp', $this->m_opstamp])
            ->andFilterWhere(['like', 'm_transtimes', $this->m_transtimes])
            ->andFilterWhere(['like', 'm_transinterval', $this->m_transinterval])
            ->andFilterWhere(['like', 'm_transflag', $this->m_transflag])
            ->andFilterWhere(['like', 'm_realtimetrans', $this->m_realtimetrans])
            ->andFilterWhere(['like', 'm_encrypt', $this->m_encrypt])
            ->andFilterWhere(['like', 'm_onlineinfo', $this->m_onlineinfo])
            ->andFilterWhere(['like', 'm_style', $this->m_style])
            ->andFilterWhere(['like', 'm_name', $this->m_name])
            ->andFilterWhere(['like', 'm_address', $this->m_address])
            ->andFilterWhere(['like', 'm_pushver', $this->m_pushver])
            ->andFilterWhere(['like', 'm_language', $this->m_language])
            ->andFilterWhere(['like', 'm_pushcommkey', $this->m_pushcommkey]);

        return $dataProvider;
    }
}
