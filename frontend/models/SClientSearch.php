<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\SClient;

/**
 * SClientSearch represents the model behind the search form of `frontend\models\SClient`.
 */
class SClientSearch extends SClient
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'iduz', 'kod', 'komu', 'vazir', 'obl', 'tuman', 'flag', 'active', 'user_id', 'uyu_type', 'garaj', 'garaj_turi', 'glav_id', 'client_tur', 'arendachi_kodi', 'jivoy', 'tja', 'avto', 'tez', 'stos', 'tods', 'komputer', 'printer', 'skaner', 'esp', 'telinternet', 'nik', 'edit_it', 'del_flag', 'kolin', 'iamhere', 'at91', 'tender_n', 'xizmat_n', 'disp_n', 'yaxlitlash', 'yaxlitlash_in', 'seriya', 'ichkitovar', 'lasttz_id', 'lastta_id', 'lis'], 'integer'],
            [['nom', 'userpass', 'adress', 'manzil', 'indeks', 'boss', 'tel', 'rs', 'mr', 'inn', 'okonh', 'bank', 'kod_bank', 's1', 'flag1', 'flag2', 'gorod', 'tugashsana', 'changedate', 'arendachi_nomi', 'sana', 'srok', 'prim', 'tods_sana', 'sayt', 'email', 'masul1', 'telsms1', 'masul2', 'telsms2', 'primoferta', 'sanaforma1', 'sanaoplata', 'oferta', 'ssana', 'snomer', 'diamhere', 'prikname', 'prikdate', 'filenom', 'tender_d', 'xizmat_d', 'disp_d', 'vaqt_in', 'vaqtout', 'kim', 'tarmoq'], 'safe'],
            [['summa', 'ost_n_sbor', 'ost_n_posh', 'foiz', 'foiz_in', 'chegirma'], 'number'],
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
        $query = SClient::find();

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
            'iduz' => $this->iduz,
            'kod' => $this->kod,
            'komu' => $this->komu,
            'vazir' => $this->vazir,
            'obl' => $this->obl,
            'tuman' => $this->tuman,
            'flag' => $this->flag,
            'active' => $this->active,
            'tugashsana' => $this->tugashsana,
            'user_id' => $this->user_id,
            'changedate' => $this->changedate,
            'uyu_type' => $this->uyu_type,
            'garaj' => $this->garaj,
            'garaj_turi' => $this->garaj_turi,
            'glav_id' => $this->glav_id,
            'client_tur' => $this->client_tur,
            'arendachi_kodi' => $this->arendachi_kodi,
            'jivoy' => $this->jivoy,
            'tja' => $this->tja,
            'avto' => $this->avto,
            'sana' => $this->sana,
            'srok' => $this->srok,
            'tez' => $this->tez,
            'stos' => $this->stos,
            'tods_sana' => $this->tods_sana,
            'tods' => $this->tods,
            'komputer' => $this->komputer,
            'printer' => $this->printer,
            'skaner' => $this->skaner,
            'esp' => $this->esp,
            'telinternet' => $this->telinternet,
            'sanaforma1' => $this->sanaforma1,
            'sanaoplata' => $this->sanaoplata,
            'oferta' => $this->oferta,
            'nik' => $this->nik,
            'summa' => $this->summa,
            'edit_it' => $this->edit_it,
            'ssana' => $this->ssana,
            'ost_n_sbor' => $this->ost_n_sbor,
            'ost_n_posh' => $this->ost_n_posh,
            'del_flag' => $this->del_flag,
            'kolin' => $this->kolin,
            'iamhere' => $this->iamhere,
            'diamhere' => $this->diamhere,
            'prikdate' => $this->prikdate,
            'at91' => $this->at91,
            'tender_n' => $this->tender_n,
            'tender_d' => $this->tender_d,
            'xizmat_n' => $this->xizmat_n,
            'xizmat_d' => $this->xizmat_d,
            'disp_n' => $this->disp_n,
            'disp_d' => $this->disp_d,
            'vaqt_in' => $this->vaqt_in,
            'vaqtout' => $this->vaqtout,
            'yaxlitlash' => $this->yaxlitlash,
            'yaxlitlash_in' => $this->yaxlitlash_in,
            'foiz' => $this->foiz,
            'foiz_in' => $this->foiz_in,
            'chegirma' => $this->chegirma,
            'seriya' => $this->seriya,
            'ichkitovar' => $this->ichkitovar,
            'lasttz_id' => $this->lasttz_id,
            'lastta_id' => $this->lastta_id,
            'lis' => $this->lis,
        ]);

        $query->andFilterWhere(['like', 'nom', $this->nom])
            ->andFilterWhere(['like', 'userpass', $this->userpass])
            ->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'manzil', $this->manzil])
            ->andFilterWhere(['like', 'indeks', $this->indeks])
            ->andFilterWhere(['like', 'boss', $this->boss])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'rs', $this->rs])
            ->andFilterWhere(['like', 'mr', $this->mr])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'okonh', $this->okonh])
            ->andFilterWhere(['like', 'bank', $this->bank])
            ->andFilterWhere(['like', 'kod_bank', $this->kod_bank])
            ->andFilterWhere(['like', 's1', $this->s1])
            ->andFilterWhere(['like', 'flag1', $this->flag1])
            ->andFilterWhere(['like', 'flag2', $this->flag2])
            ->andFilterWhere(['like', 'gorod', $this->gorod])
            ->andFilterWhere(['like', 'arendachi_nomi', $this->arendachi_nomi])
            ->andFilterWhere(['like', 'prim', $this->prim])
            ->andFilterWhere(['like', 'sayt', $this->sayt])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'masul1', $this->masul1])
            ->andFilterWhere(['like', 'telsms1', $this->telsms1])
            ->andFilterWhere(['like', 'masul2', $this->masul2])
            ->andFilterWhere(['like', 'telsms2', $this->telsms2])
            ->andFilterWhere(['like', 'primoferta', $this->primoferta])
            ->andFilterWhere(['like', 'snomer', $this->snomer])
            ->andFilterWhere(['like', 'prikname', $this->prikname])
            ->andFilterWhere(['like', 'filenom', $this->filenom])
            ->andFilterWhere(['like', 'kim', $this->kim])
            ->andFilterWhere(['like', 'tarmoq', $this->tarmoq]);

        return $dataProvider;
    }
}
