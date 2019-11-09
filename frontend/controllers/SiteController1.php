<?php
namespace frontend\controllers;

use frontend\models\Asos;
use frontend\models\AsosSlave;
use frontend\models\Pl;
use frontend\models\Slave;
use frontend\models\STovar;
use frontend\models\UserInOut;
use Yii;
use yii\base\InvalidParamException;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup','index'],
                'rules' => [
                    [
                        'actions' => ['signup','index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        $koldel = Yii::$app->request->post('koldel');
        $kolindel = Yii::$app->request->post('kolindel');
        $idav=Yii::$app->request->post('idav');
        if($koldel){
            AsosSlave::updateAll(['kol_ost'=>$koldel],['id'=>$idav]);
        }
        if($kolindel){
            AsosSlave::updateAll(['kol_in_ost'=>$kolindel],['id'=>$idav]);
        }
        AsosSlave::updateAll(['kol_ost'=>$koldel,'kol_in_ost'=>$kolindel],['id'=>$idav]);
        $summa = Yii::$app->request->post('summa');

        $idupd=Yii::$app->request->post('andnac');

        Asos::updateAll(['summa'=>$summa],['id'=>$idupd]);


        $id = Yii::$app->request->post('iddel');
        $idup = Yii::$app->request->post('idup');
        $kol = Yii::$app->request->post('kol');
        $kolin = Yii::$app->request->post('kolin');
        if(Yii::$app->request->post('andnac')) {
            $andnac = Yii::$app->request->post('andnac');
            Asos::updateAll(['diler_id' => 1], ['id' => $andnac]);
            $this->redirect(['/site/index']);
        }
        if(Yii::$app->request->post('andnacdel')) {
            $andnac = Yii::$app->request->post('andnacdel');
            AsosSlave::deleteAll(['asos_id' => $andnac]);
            $this->redirect(['/site/index']);
        }
        AsosSlave::deleteAll(['id'=>$id]);
        //AsosSlave::updateAll(['kol_ost'=>$kol,'kol_in_ost'=>$kolin],['id'=>$idup]);

        $id = Yii::$app->request->post('iddel');
        $idup = Yii::$app->request->post('idup');
        $kol = Yii::$app->request->post('kol');
        $kolin = Yii::$app->request->post('kolin');
        $andnac = Yii::$app->request->post('andnac');
        Asos::updateAll(['diler_id'=>1],['id'=>$andnac]);
        AsosSlave::deleteAll(['id'=>$id]);


        $date = date("Y-m-d");
        $s = Asos::find()->where(['sana'=>$date])->andWhere(['diler_id'=>0])->one();
        if($s['sana'] == null){

            $model = new Asos();
            $model->client_id = Yii::$app->getUser()->identity->client_id;
            $model->user_id = Yii::$app->getUser()->id;
            $model->xodim_id = Yii::$app->getUser()->id;
            $model->sana = $date;
            $model->diler_id= "0";
            $model->tur_oper = 2;
            $model->summa= $summa;
            $model->save();
        }

        $sotil = AsosSlave::find()->where(['asos_id'=>$s['id']])->orderBy(['id'=>SORT_DESC])->all();
     return $this->render('index',[

             'sotil'=>$sotil
         ]);
    }

    public function actionCart(){

        $session = Yii::$app->session;

        if(isset($_POST['pid'])){
            $pid =$_POST['pid'];
            $i=0;
//            if($_SESSION['cart2']){
//                foreach ($_SESSION['cart2'] as $item){
//                    $i++;
//                }
//                $_SESSION['cart2'][$i]=$pid;
//            }else{
            $_SESSION['new'][]=$pid;
//            }

        }

        $carts = AsosSlave::find()->where(['tovar_id'=>$session['new']])->all();
        return $this->render('cart',[
            'carts'=>$carts,
        ]);
    }

    public function actionAdd()
    {

        $asos = Yii::$app->request->post('asos_id');
        $idin = Yii::$app->request->post('id');
        $idsup = Yii::$app->request->post('idsup');
        $asosiy = Yii::$app->request->post('asosiy');
        $ichki = Yii::$app->request->post('ichki');
        $nom = Yii::$app->request->post('nom');
        $data = Yii::$app->request->post('data');


        $sotil = AsosSlave::find()->where(['asos_id'=>$asos])->orderBy(['id'=>SORT_DESC])->all();

        if($data){
        $query = AsosSlave::find()->select('asos_slave.id as ids,asos_slave.sotish as sot,asos_slave.sotish_in as sotin,asos_slave.kol_ost as kns,asos_slave.kol_in_ost as kolin,s_tovar.nom as nom , s_tovar.id as idt')
            ->from('asos_slave,asos,s_tovar')
            ->where('asos.id = asos_slave.asos_id and asos_slave.del_flag = 1 and (asos.tur_oper = 1 or asos.tur_oper=4 or asos.tur_oper=5) and s_tovar.id = asos_slave.tovar_id and (asos_slave.kol_ost>0 or asos_slave.kol_in_ost>0) and s_tovar.id = '.Yii::$app->request->post('data').' and asos.client_id = '.Yii::$app->getUser()->identity->client_id)
            ->all();

        if(Yii::$app->request->post('ichki') || Yii::$app->request->post('asosiy')) {

            $mod = new AsosSlave();
            $mod->tovar_nom = $nom;
            $mod->tovar_id = $idin;
            $mod->asos_id = $asos;
            $mod->kol_in = $ichki;
            $mod->kol_in_ost = 0;
            $mod->kol_ost = $idsup;
            $mod->kol = $asosiy;
            $mod->user_id=Yii::$app->getUser()->id;

            $mod->save();

            $sotil = AsosSlave::find()->where(['asos_id'=>$asos])->orderBy(['id'=>SORT_DESC])->all();
            return $this->render('view',[

                'asos'=>$asos,
                'sotil'=>$sotil,
                'query'=>$query
            ]);
        }

            return $this->render('view',[

                'asos'=>$asos,
                'sotil'=>$sotil,
                'query'=>$query
            ]);
        }
        else{
            $query = AsosSlave::find()->select('asos_slave.id as ids,asos_slave.sotish as sot,asos_slave.sotish_in as sotin,asos_slave.kol_ost as kns,asos_slave.kol_in_ost as kolin,s_tovar.nom as nom , s_tovar.id as idt')
                ->from('asos_slave,asos,s_tovar')
                ->where('asos.id = asos_slave.asos_id and asos_slave.del_flag = 1 and (asos.tur_oper=1 or asos.tur_oper=4 or asos.tur_oper=5)and s_tovar.id = asos_slave.tovar_id and (asos_slave.kol_ost>0 or asos_slave.kol_in_ost>0) and asos.client_id = ' .Yii::$app->getUser()->identity->client_id )
                ->limit(10)->all();

            if(Yii::$app->request->post('ichki') || Yii::$app->request->post('asosiy')) {

                $mod = new AsosSlave();
                $mod->tovar_nom = $nom;
                $mod->tovar_id = $idin;
                $mod->asos_id = $asos;
                $mod->kol_in_ost = $idsup;
                $mod->kol_ost = $idsup;
                $mod->kol_in_ost = 0;
                $mod->kol_ost = $idsup;
                $mod->user_id=Yii::$app->getUser()->id;

                $mod->save();

                $sotil = AsosSlave::find()->where(['asos_id'=>$asos])->orderBy(['id'=>SORT_DESC])->all();
                return $this->render('view',[

                    'asos'=>$asos,
                    'sotil'=>$sotil,
                    'query'=>$query
                ]);
            }

            return $this->render('view',[

                'asos'=>$asos,
                'sotil'=>$sotil,
                'query'=>$query
            ]);
        }
        }

    /**
     * Logs in a user.
     *
     * @return mixed
     */

    public function actionKarzina(){
        $idjo = Yii::$app->request->post('iddel');
        $koldel = Yii::$app->request->post('koldel');
        $kolindel = Yii::$app->request->post('kolindel');
        $kolinjoriy = Yii::$app->request->post('kolinjoriy');
        $koljoriy   = Yii::$app->request->post('koljoriy');
        $ostatid    = Yii::$app->request->post('idsup');
        $summa = Yii::$app->request->post('summa');
        $kols = Yii::$app->request->post('kols');
        $idupd=Yii::$app->request->post('andnac');
        $idav=Yii::$app->request->post('idav');
        AsosSlave::updateAll(['kol_ost'=>$koldel,'kol_in_ost'=>$kolindel],['id'=>$idav]);
        Asos::updateAll(['summa'=>$summa,'kol'=>$kols],['id'=>$idupd]);


        $idup = Yii::$app->request->post('idup');
        $kol = Yii::$app->request->post('kol');
        $kolin = Yii::$app->request->post('kolin');
        if(Yii::$app->request->post('andnac')) {
            $andnac = Yii::$app->request->post('andnac');
            Asos::updateAll(['diler_id' => 1], ['id' => $andnac]);
            $this->redirect(['/site/index']);
        }
        if(Yii::$app->request->post('andnacdel')) {
            $andnac = Yii::$app->request->post('andnacdel');
            AsosSlave::deleteAll(['asos_id' => $andnac]);
            $this->redirect(['/site/index']);
        }

        AsosSlave::deleteAll(['id'=>$idjo]);
        AsosSlave::updateAll(['kol'=>$kol,'kol_in'=>$kolin],['id'=>$idup]);

        $date = date("Y-m-d");

        $id = Yii::$app->request->post('tavarid');

        $asosid = Yii::$app->request->post('asosid');

        $asosiy = Yii::$app->request->post('asosiyson');

        $ichki = Yii::$app->request->post('ichkison');

        $kolinoldin = Yii::$app->request->post('kolinoldin');

        $kololdin = Yii::$app->request->post('kololdin');

        $kolost = $koljoriy-$asosiy;
        $kolinost = $kolinjoriy-$ichki;

        AsosSlave::updateAll(['kol_ost'=>$kolost,'kol_in_ost'=>$kolinost],['id'=>$ostatid]);

        $nom = Yii::$app->request->post('tavarnomi');
        if(Yii::$app->request->post('asosiyson') || Yii::$app->request->post('ichkison')) {

            $model = new AsosSlave();

            $model->tovar_nom = $nom;
            $model->tovar_id = $id;
            $model->asos_id = $asosid;
            /*if($asosiy==null){
                $model->kol_ost = 0;
            
            else{
                $model->kol_ost = $kololdin-$asosiy;
            }
            if($ichki==null){
                $model->kol_in_ost = 0;
            }
            else{
                $model->kol_in_ost =$kolinoldin - $ichki;
            }*/
            if($asosiy==null){
                $model->kol = 0;
            }
            else{
                $model->kol = $asosiy;
            }
            if($ichki==null){
                $model->kol_in = 0;
            }
            else{
                $model->kol_in = $ichki;
            }
            if($asosiy==null){
                $model->summa = 0;
            }
            else{
                $model->summa = $asosiy*Yii::$app->request->post('sot');
            }
            if($ichki==null){
                $model->summa_in = 0;
            }
            else{
                $model->summa_in = Yii::$app->request->post('sotin')*$ichki;
            }
            if($asosiy==null){
                $model->sotish = 0;
            }
            else{
                $model->sotish = Yii::$app->request->post('sot');
            }
            if($ichki==null){
                $model->sotish_in = 0;
            }
            else{
                $model->sotish_in = Yii::$app->request->post('sotin');
            }

            $model->summa_all = Yii::$app->request->post('sotin')*$ichki + Yii::$app->request->post('sot')*$asosiy;
            $model->user_id="2";
            $model->save();

            //$s = Asos::find()->where(['sana'=>$date])->andWhere(['diler_id'=>0])->one();
            $s = Asos::find()->where(['sana'=>$date])->andWhere(['del_flag'=>1])->andWhere(['tur_oper'=>2])->andWhere(['diler_id'=>0])->andWhere(['user_id'=>Yii::$app->getUser()->identity->id])->andWhere(['client_id'=>Yii::$app->getUser()->identity->client_id])->one();
            $sotil = AsosSlave::find()->where(['asos_id'=>$s['id']])->orderBy(['id'=>SORT_DESC])->all();

            return $this->render('index',[

                'sotil'=>$sotil,
                'asosid'=>$asosid,
                'ostatid'=> $ostatid
            ]);
        }
        //$s = Asos::find()->where(['sana'=>$date])->andWhere(['diler_id'=>0])->one();
        $s = Asos::find()->where(['sana'=>$date])->andWhere(['del_flag'=>1])->andWhere(['tur_oper'=>2])->andWhere(['diler_id'=>0])->andWhere(['user_id'=>Yii::$app->getUser()->identity->id])->andWhere(['client_id'=>Yii::$app->getUser()->identity->client_id])->one();

        $sotil = AsosSlave::find()->where(['asos_id'=>$s['id']])->orderBy(['id'=>SORT_DESC])->all();
        return $this->render('index',[

            'sotil'=>$sotil,
            'asosid'=>$asosid,
            'ostatid'=> $ostatid
        ]);
    }
    public function actionOmbor()
    {

        /*        $query = (new Query())
            ->select('z.nom as znom,d.nom as dnom,s.kol_ost*s.sena as q,s.kol_in_ost*s.sena_in as q_in, s.kol_ost*s.sena+s.kol_in_ost*s.sena_in as q_all,s.kol*s.sotish+s.kol_in*s.sotish_in as sotiladi,s.*,t.nom as s_tovar,z.nom as s_zavod,d.nom as s_diler')
            ->from('asos a,asos_slave s,s_tovar t,s_zavod z,s_diler d')
            ->where(['or', ['a.tur_oper' => 1], ['a.tur_oper' => 4], ['a.tur_oper' => 5]])
            ->andWhere(['or', ['>', 's.kol_ost', 0], ['>', 's.kol_in_ost', 0]])
            ->andWhere(['d.id' => 'a.diler_id'])
            ->andWhere(['z.id' => 't.zavod_id'])
            ->andWhere(['t.id' => 's.tovar_id'])
            ->andWhere(['a.id' => 's.asos_id'])
            ->andWhere(['s.del_flag' => 1])
            ->orderBy('t.nom', 's.srok');*/

//            'sql' => $query->createCommand()->sql,

        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT s.kol_ost as kolOost, z.nom as znom,d.nom as dnom,s.kol_ost*s.sena as q,s.kol_in_ost*s.sena_in as q_in, s.kol_ost*s.sena+s.kol_in_ost*s.sena_in as q_all,s.kol*s.sotish+s.kol_in*s.sotish_in as sotiladi,s.*,t.nom as s_tovar,z.nom as s_zavod,d.nom as s_diler
            FROM asos a,asos_slave s,s_tovar t,s_zavod z,s_diler d 
            where (a.tur_oper=1 or a.tur_oper=4 or a.tur_oper=5) and (s.kol_ost>0 or s.kol_in_ost>0)
            
            and d.id=a.diler_id and z.id=t.zavod_id and t.id=s.tovar_id
            and a.id=s.asos_id and s.del_flag=1
            
            order by t.nom,s.srok',
            'sort' => [
                'attributes' => [],
            ],
            'pagination' => false,
        ]);
        $models = $dataProvider->getModels();

        $dataProvider2 = new SqlDataProvider([
            'sql' => 'SELECT nom FROM s_diler',
            'pagination' => false,
        ]);
        $models2 = $dataProvider2->getModels();

        return $this->render('ombor', [
            'dataProvider' => $dataProvider,
            'models' => $models,
            'models2' => $models2,
        ]);
    }

    /**
     * Displays haridor qarz haqida.
     */
    public function actionClientQarz()
    {
        /*
        $haridor = Yii::$app->request->post('haridor');
        $date1 = Yii::$app->request->post('date1');
        $date2 = Yii::$app->request->post('date2');
        if(!$haridor) $haridor='';
        if(!$date1) $date1 = date('Y-m-01');
        if($date2) $date2 = date('Y-m-d');
//        echo Yii::$app->request->post('date1').' ----- '.Yii::$app->request->post('date2').' '.Yii::$app->request->post('haridor');
        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT sum(qarz_summa) as summa,sum(sum_epos_ch) as epos FROM asos WHERE del_flag=1 AND tur_oper=2 AND h_id="'.$haridor.'" AND sana<"'.$date1.'"',
            'sort' => [
                'attributes' => [],
            ],
            'pagination' => false,
        ]);

        $models = $dataProvider->getModels();


        $dataProvider2 = new SqlDataProvider([
            'sql' => 'SELECT id, nom FROM s_haridor WHERE id>1',
            'sort' => [
                'attributes' => [],
            ],
            'pagination' => false,
        ]);
        $models2 = ArrayHelper::map($dataProvider2->getModels(), 'id', 'nom');


        return $this->render('client-qarz', [
            'dataProvider' => $dataProvider,
            'models' => $models,
            'models2' => $models2,
        ]);
        */

        $haridor = Yii::$app->request->post('haridor');
        $date1 = Yii::$app->request->post('date1');
        $date2 = Yii::$app->request->post('date2');
        if(!$haridor) $haridor='';
        if(!$date1) $date1 = date('Y-m-01');
        if(!$date2) $date2 = date('Y-m-d');

        $b = Yii::$app->db->createCommand('SELECT IFNULL(SUM(qarz_summa),0)+IFNULL(SUM(sum_epos_ch),0) as summa FROM asos WHERE del_flag=1 AND tur_oper=2 AND h_id="'.$haridor.'" AND sana<"'.$date1.'"')->queryOne();
        $b2=0;
        $e = Yii::$app->db->createCommand('SELECT sena_pl, vid FROM pl WHERE del_flag=1 AND h_id="'.$haridor.'" AND d_pl<"'.$date1.'"')->queryAll();
        foreach ($e as $item) {
            if($item['vid']==7 || $item['vid']==17 || $item['vid']==20) $b2+=$item['sena_pl'];
            else if($item['vid']==8 || $item['vid']==18) $b['summa']+=$item['sena_pl'];
        }
        $danq = $b['summa'] - $b2;

        $b = Yii::$app->db->createCommand('SELECT IFNULL(SUM(qarz_summa),0)+IFNULL(SUM(sum_epos_ch),0) as summa FROM asos WHERE del_flag=1 AND tur_oper=2 AND h_id="'.$haridor.'" AND sana BETWEEN "'.$date1.'" AND "'.$date2.'"')->queryOne();
        $b2=0;
        $e = Yii::$app->db->createCommand('SELECT sena_pl, vid FROM pl WHERE del_flag=1 AND h_id="'.$haridor.'" AND d_pl BETWEEN "'.$date1.'" AND "'.$date2.'" ')->queryAll();
        foreach ($e as $item) {
            if($item['vid']==7 || $item['vid']==17 || $item['vid']==20) $b2+=$item['sena_pl'];
            else if($item['vid']==8 || $item['vid']==18) $b['summa']+=$item['sena_pl'];
        }
        $gachaq = $b['summa'] - $b2;

        $haridorlar = ArrayHelper::map(Yii::$app->db->createCommand('SELECT id, nom FROM s_haridor WHERE id>1')->queryAll(), 'id', 'nom');

        $query = Asos::find()->where('del_flag=1')->andWhere('tur_oper=2')->andWhere(['h_id' => $haridor])->andWhere(['between', 'sana', $date1, $date2]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query2 = Pl::find()->where(['between', 'd_pl', $date1, $date2])->andWhere('del_flag=1')->andWhere(['h_id' => $haridor]);
        $dataProvider2 = new ActiveDataProvider([
            'query' => $query2,
        ]);

        return $this->render('client-qarz', [
            'danq' => $danq,
            'chiqim' => (int)$b['summa'],
            'kirim' => $b2,
            'gachaq' => $gachaq,
            'haridorlar' => $haridorlar,
            'dataProvider' => $dataProvider,
            'dataProvider2' => $dataProvider2,
        ]);
    }

    public function actionKun()
    {
        $date = date("Y-m-d");

        $s = Asos::find()->where(['sana'=>$date])->andWhere(['diler_id'=>1])->all();

        return $this->render('kun',[

            's'=>$s
        ]);
    }
    public function actionView($id){


        $query = AsosSlave::find()->where(['asos_slave.del_flag'=>1])
            ->select('asos_slave.id as ids,asos_slave.sotish as sot,asos_slave.sotish_in as sotin,asos_slave.kol_ost as kns,asos_slave.kol_in_ost as kolin,s_tovar.nom as nom , s_tovar.id as idt')
            ->innerJoin('asos','asos.id = asos_slave.asos_id and (asos.tur_oper=1 or asos.tur_oper=4 or asos.tur_oper=5)')
            ->innerJoin('s_tovar','s_tovar.id = asos_slave.tovar_id and (asos_slave.kol_ost>0 or asos_slave.kol_in_ost>0) and (s_tovar.shtrix='.$id.' or s_tovar.shtrix1='.$id.' or s_tovar.shtrix2='.$id.' or s_tovar.shtrix_full='.$id.' )')
            ->all();

        return $this->render('view',[

            'query'=>$query

        ]);
    }
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
