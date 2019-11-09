<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Asos;

/**
 * AsosSearch represents the model behind the search form of `frontend\models\Asos`.
 */
class AsosSearch extends Asos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'client_id', 'kassa_id', 'xodim_id', 'kol', 'user_id', 'del_flag', 'tur_oper', 'diler_id', 'print_flag', 'ombor_id', 'filial_id', 'shartnoma_id', 'woywo_bill_type', 'qarz_flag', 'h_id', 'pl_id', 'dollar'], 'integer'],
            [['seriya', 'nomer', 'sana', 'qabul_sana', 'changedate', 'qarz_kim', 'qarz_izoh'], 'safe'],
            [['summa', 'sum_naqd', 'sum_plastik', 'sum_epos', 'cheg_n', 'cheg_p', 'cheg_e', 'sum_naqd_ch', 'sum_plast_ch', 'sum_epos_ch', 'summa_ch', 'qarz_summa', 'kurs', 'sum_d'], 'number'],
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
        $query = Asos::find();

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
            'client_id' => $this->client_id,
            'kassa_id' => $this->kassa_id,
            'xodim_id' => $this->xodim_id,
            'sana' => $this->sana,
            'qabul_sana' => $this->qabul_sana,
            'summa' => $this->summa,
            'sum_naqd' => $this->sum_naqd,
            'sum_plastik' => $this->sum_plastik,
            'sum_epos' => $this->sum_epos,
            'cheg_n' => $this->cheg_n,
            'cheg_p' => $this->cheg_p,
            'cheg_e' => $this->cheg_e,
            'sum_naqd_ch' => $this->sum_naqd_ch,
            'sum_plast_ch' => $this->sum_plast_ch,
            'sum_epos_ch' => $this->sum_epos_ch,
            'summa_ch' => $this->summa_ch,
            'kol' => $this->kol,
            'changedate' => $this->changedate,
            'user_id' => $this->user_id,
            'del_flag' => $this->del_flag,
            'tur_oper' => $this->tur_oper,
            'diler_id' => $this->diler_id,
            'print_flag' => $this->print_flag,
            'ombor_id' => $this->ombor_id,
            'filial_id' => $this->filial_id,
            'shartnoma_id' => $this->shartnoma_id,
            'woywo_bill_type' => $this->woywo_bill_type,
            'qarz_summa' => $this->qarz_summa,
            'qarz_flag' => $this->qarz_flag,
            'h_id' => $this->h_id,
            'pl_id' => $this->pl_id,
            'kurs' => $this->kurs,
            'dollar' => $this->dollar,
            'sum_d' => $this->sum_d,
        ]);

        $query->andFilterWhere(['like', 'seriya', $this->seriya])
            ->andFilterWhere(['like', 'nomer', $this->nomer])
            ->andFilterWhere(['like', 'qarz_kim', $this->qarz_kim])
            ->andFilterWhere(['like', 'qarz_izoh', $this->qarz_izoh]);

        return $dataProvider;
    }
}
