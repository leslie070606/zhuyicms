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
class StyleController extends Controller
{   
    public $layout=false;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
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
    public function actionIndex()
    {   
        $searchModel = new StyleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    //风格测试
    public function actionTest(){
        
        return $this->render('style_test');
    }
    
    //风格测试报告
    public function actionReport(){
        
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
            $style[1] => $style[0]/$num*100,
            $style[3] => $style[2]/$num*100,
            $style[5] => $style[4]/$num*100,
        );
        //echo "<pre>";
        //print_r($model);
        return $this->render('report',['v'=>$v]);
    }
    
    //风格报告分享
    public function actionShare(){
        
        $tokenModel = new \app\components\Token();
        
        $jsptoken = $tokenModel->getJspticket();
        
        var_dump($jsptoken);
        
        return $this->render('share');
    }

    /**
     * Displays a single Style model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Style model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
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
    public function actionUpdate($id)
    {
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
    public function actionDelete($id)
    {
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
    protected function findModel($id)
    {
        if (($model = Style::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
