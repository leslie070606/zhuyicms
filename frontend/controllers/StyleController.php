<?php

namespace frontend\controllers;

use Yii;
use common\models\Style;
use backend\models\search\StyleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StyleController implements the CRUD actions for Style model.
 */
class StyleController extends Controller {

    public $layout = false;

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Style models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new StyleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionChoicestyle() {

        //判断用户是否登录
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        $userId = $session->get("user_id");
        if (!isset($userId) || empty($userId)) {
            $_cookieSts = \common\controllers\BaseController::checkLoginCookie();
            if ($_cookieSts) {
                $userId = $session->get("user_id");
            } else {
                $userId = '';
            }
        }

        if (!$userId) {
            return $this->redirect(['user/login']);
        }
        
        //判断是否已经有风格测试
        $styleModel = new Style();
        $userStyle = $styleModel->findOne(['user_id'=>$userId]);
        if(count($userStyle)>0){
            return $this->redirect(['project/match_designer']);
        }

        if (Yii::$app->request->get('g')) {

            $styleModel = new Style();
            $styleModel->user_id = $userId;
            $styleModel->choice_style = Yii::$app->request->get('g');
            $res = $styleModel->save();

            return Yii::$app->request->get('g');
        }

        return $this->render('choicestyle');
    }

    public function actionWechat() {

        return $this->renderPartial('wechat');
    }

    //风格测试
    public function actionTest() {
        echo "ok";
        return $this->render('style_test');
    }

    //风格测试报告
    public function actionReport() {

        //Yii::$app->request->post();
        $newdata = Yii::$app->request->get('newdata');
        $style = explode(',', $newdata);

        $jsonstyle = json_encode($style);

        $model = new Style();

        $model->user_id = 1;
        $model->type = $jsonstyle;
        $v = $model->save();

        $num = $style[0] + $style[2] + $style[4];

        $styleArr = array(
            $style[1] => $style[0] / $num * 100,
            $style[3] => $style[2] / $num * 100,
            $style[5] => $style[4] / $num * 100,
        );
        //echo "<pre>";
        //print_r($model);
        return $this->render('report', ['v' => $v]);
    }

    //风格报告分享
    public function actionShare() {

        $tokenModel = new \app\components\Token();

        // 获取JS签名
        $jsarr = $tokenModel->getSignature();

        return $this->render('share', ['jsarr' => $jsarr]);
    }

    //微信授权
    public function actionShou() {
        $code = $_GET['code'];

        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx36e36094bd446689&secret=1d8f874eda186deee2c8a81b577fe094&code=" . $code . "&grant_type=authorization_code";

        $res = $this->doCurlGetRequest($url);

        $res = json_decode($res, TRUE);

        $urlUser = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $res['access_token'] . "&openid=" . $res['openid'] . "";
        $userinfo = $this->doCurlGetRequest($urlUser);
        echo "<spen style='font-size: 45px; font-weight: 15px;'><pre>";
        print_r(json_decode($userinfo, TRUE));
    }

    /**
     * Displays a single Style model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Style model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Style();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->style_id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Style model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->style_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Style model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Style model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Style the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Style::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    private function doCurlGetRequest($url, $data = array(), $timeout = 10) {
        if ($url == "" || $timeout <= 0) {
            return false;
        }
        if ($data != array()) {
            $url = $url . '?' . http_build_query($data);
        }

        $con = curl_init((string) $url);
        curl_setopt($con, CURLOPT_HEADER, false);
        curl_setopt($con, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($con, CURLOPT_TIMEOUT, (int) $timeout);

        // 访问https 需要设置
        curl_setopt($con, CURLOPT_SSL_VERIFYPEER, false); // 信任任何证书 
        curl_setopt($con, CURLOPT_SSL_VERIFYHOST, 0); // 检查证书中是否设置域名（为0也可以，就是连域名存在与否都不验证了）

        return curl_exec($con);
    }

}
