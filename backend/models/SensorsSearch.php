<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sensors;

/**
 * SensorsSearch represents the model behind the search form about `app\models\Sensors`.
 */
class SensorsSearch extends Sensors
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'TransInterval', 'OnLine', 'RelatedEquipment', 'Alarm'], 'integer'],
            [['MacSN', 'MacName', 'Ver', 'IP', 'NewTime'], 'safe'],
            [['CurTemperature', 'CurHumidity', 'TempLowLimit', 'TempHighLimit', 'HumiLowLimit', 'HumiHighLimit', 'TempLowerThreshold', 'TempUpperThreshold', 'HumiLowerThreshold', 'HumiUpperThreshold'], 'number'],
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
        $query = Sensors::find();

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
            'TransInterval' => $this->TransInterval,
            'OnLine' => $this->OnLine,
            'NewTime' => $this->NewTime,
            'RelatedEquipment' => $this->RelatedEquipment,
            'Alarm' => $this->Alarm,
            'CurTemperature' => $this->CurTemperature,
            'CurHumidity' => $this->CurHumidity,
            'TempLowLimit' => $this->TempLowLimit,
            'TempHighLimit' => $this->TempHighLimit,
            'HumiLowLimit' => $this->HumiLowLimit,
            'HumiHighLimit' => $this->HumiHighLimit,
            'TempLowerThreshold' => $this->TempLowerThreshold,
            'TempUpperThreshold' => $this->TempUpperThreshold,
            'HumiLowerThreshold' => $this->HumiLowerThreshold,
            'HumiUpperThreshold' => $this->HumiUpperThreshold,
        ]);

        $query->andFilterWhere(['like', 'MacSN', $this->MacSN])
            ->andFilterWhere(['like', 'MacName', $this->MacName])
            ->andFilterWhere(['like', 'Ver', $this->Ver])
            ->andFilterWhere(['like', 'IP', $this->IP]);

        return $dataProvider;
    }
}
