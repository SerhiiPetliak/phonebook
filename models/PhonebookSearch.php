<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Phonebook;

/**
 * PhonebookSearch represents the model behind the search form about `app\models\Phonebook`.
 */
class PhonebookSearch extends Phonebook
{

    public $phones;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['unitName', 'facultyName', 'post', 'PIB', 'telephoneOut', 'telephoneIn', 'email', 'corps', 'cabinet', 'phones'], 'safe'],
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
        $query = Phonebook::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'unitName', $this->unitName])
            ->andFilterWhere(['like', 'facultyName', $this->facultyName])
            ->andFilterWhere(['like', 'post', $this->post])
            ->andFilterWhere(['like', 'PIB', $this->PIB])
            
            ->andFilterWhere(['or',
                ['like', 'telephoneOut', $this->phones],
                ['like', 'telephoneIn', $this->phones],
                //['like', 'telephoneForward', $this->phones],
            ])

            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'corps', $this->corps])
            ->andFilterWhere(['like', 'cabinet', $this->cabinet]);

        return $dataProvider;
    }
}
