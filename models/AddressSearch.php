<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Address;

/**
 * AddressSearch represents the model behind the search form about `app\models\Address`.
 */
class AddressSearch extends Address
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_active','type'], 'integer'],
            [['unitName', 'facultyName', 'post', 'PIB', 'telephoneOut', 'telephoneIn', 'telephoneForward', 'email', 'corps', 'cabinet', 'change_time'], 'safe'],
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
        $query = Address::find();

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
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'unitName', $this->unitName])
            ->andFilterWhere(['like', 'facultyName', $this->facultyName])
            ->andFilterWhere(['like', 'post', $this->post])
            ->andFilterWhere(['like', 'PIB', $this->PIB])
            ->andFilterWhere(['like', 'telephoneOut', $this->telephoneOut])
            ->andFilterWhere(['like', 'telephoneIn', $this->telephoneIn])
            ->andFilterWhere(['like', 'telephoneForward', $this->telephoneForward])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'corps', $this->corps])
            ->andFilterWhere(['like', 'change_time', $this->change_time])            
            ->andFilterWhere(['like', 'cabinet', $this->cabinet]);

        return $dataProvider;
    }
}
