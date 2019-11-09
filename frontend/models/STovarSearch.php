<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\STovar;

/**
 * STovarSearch represents the model behind the search form of `frontend\models\STovar`.
 */
class STovarSearch extends STovar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tz_id', 'kg', 'kat', 'brend', 'shtrixkod', 'qrkod', 'izm_id', 'kol_in', 'izm1', 'turi', 'resept', 'zavod_id', 'del_flag', 'upakavka', 'user_id', 'client_id', 'majbur_dori_id', 'miqdor', 'shart'], 'integer'],
            [['nom', 'nom_ru', 'nom_sh', 'shtrix', 'shtrix_in', 'shtrix_full', 'shtrix1', 'shtrix2', 'qr', 'shakl', 'internom', 'changedate'], 'safe'],
            [['aniq', 'minimal', 'maksimal', 'sotish'], 'number'],
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
        $query = STovar::find();

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
            'tz_id' => $this->tz_id,
            'kg' => $this->kg,
            'kat' => $this->kat,
            'brend' => $this->brend,
            'shtrixkod' => $this->shtrixkod,
            'qrkod' => $this->qrkod,
            'izm_id' => $this->izm_id,
            'kol_in' => $this->kol_in,
            'izm1' => $this->izm1,
            'turi' => $this->turi,
            'resept' => $this->resept,
            'aniq' => $this->aniq,
            'minimal' => $this->minimal,
            'maksimal' => $this->maksimal,
            'sotish' => $this->sotish,
            'zavod_id' => $this->zavod_id,
            'del_flag' => $this->del_flag,
            'upakavka' => $this->upakavka,
            'user_id' => $this->user_id,
            'client_id' => $this->client_id,
            'changedate' => $this->changedate,
            'majbur_dori_id' => $this->majbur_dori_id,
            'miqdor' => $this->miqdor,
            'shart' => $this->shart,
        ]);

        $query->andFilterWhere(['like', 'nom', $this->nom])
            ->andFilterWhere(['like', 'nom_ru', $this->nom_ru])
            ->andFilterWhere(['like', 'nom_sh', $this->nom_sh])
            ->andFilterWhere(['like', 'shtrix', $this->shtrix])
            ->andFilterWhere(['like', 'shtrix_in', $this->shtrix_in])
            ->andFilterWhere(['like', 'shtrix_full', $this->shtrix_full])
            ->andFilterWhere(['like', 'shtrix1', $this->shtrix1])
            ->andFilterWhere(['like', 'shtrix2', $this->shtrix2])
            ->andFilterWhere(['like', 'qr', $this->qr])
            ->andFilterWhere(['like', 'shakl', $this->shakl])
            ->andFilterWhere(['like', 'internom', $this->internom]);

        return $dataProvider;
    }
}
