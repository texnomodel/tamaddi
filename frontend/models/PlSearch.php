<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Pl;

/**
 * PlSearch represents the model behind the search form of `frontend\models\Pl`.
 */
class PlSearch extends Pl
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'bank_id', 'kod', 'n_pl', 'vo', 'nn', 'client', 'client_id', 'vid', 'ter', 'pot1', 'pot2', 'sf', 'sf_pot', 'stos', 'del_flag', 'statrashod', 'diler_id', 'h_id'], 'integer'],
            [['n_dok', 'd_pl', 'rssvoy', 'rs', 's1', 'username', 'changedate', 'prim'], 'safe'],
            [['sena_pl', 'saldo', 'ost_pl'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Pl::find();

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
            'bank_id' => $this->bank_id,
            'kod' => $this->kod,
            'n_pl' => $this->n_pl,
            'd_pl' => $this->d_pl,
            'vo' => $this->vo,
            'nn' => $this->nn,
            'client' => $this->client,
            'client_id' => $this->client_id,
            'sena_pl' => $this->sena_pl,
            'saldo' => $this->saldo,
            'ost_pl' => $this->ost_pl,
            'vid' => $this->vid,
            'ter' => $this->ter,
            'pot1' => $this->pot1,
            'pot2' => $this->pot2,
            'sf' => $this->sf,
            'sf_pot' => $this->sf_pot,
            'changedate' => $this->changedate,
            'stos' => $this->stos,
            'del_flag' => $this->del_flag,
            'statrashod' => $this->statrashod,
            'diler_id' => $this->diler_id,
            'h_id' => $this->h_id,
        ]);

        $query->andFilterWhere(['like', 'n_dok', $this->n_dok])
            ->andFilterWhere(['like', 'rssvoy', $this->rssvoy])
            ->andFilterWhere(['like', 'rs', $this->rs])
            ->andFilterWhere(['like', 's1', $this->s1])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'prim', $this->prim]);

        return $dataProvider;
    }
}
