<?php

namespace backend\controllers;

use Yii;
use common\models\ZyProject;
use backend\models\search\ProjectSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ZyprojectController implements the CRUD actions for ZyProject model.
 */
class ZyprojectController extends Controller {

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
     * Lists all ZyProject models.
     * @return mixed
     */
    public function actionIndex() {
        //$searchModel = new ProjectSearch();        
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//        return $this->render('index', [
//                    'searchModel' => $searchModel,
//                    'dataProvider' => $dataProvider,
//        ]);

        $query = ZyProject::find();
        $query->joinWith(['zy_user']);

        $query->select('zy_user.nickname,zy_project.*');

        $w = $this->_getZyProjectIndexSearch();

        $query->where($w)->orderBy(' zy_project.project_id desc ');

        $pages = new \yii\data\Pagination(['totalCount' => $query->count('zy_project.project_id'), 'pageSize' => '15']);

        $model = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', [
                    'model' => $model,
                    'pages' => $pages,
                    'getParams' => Yii::$app->request->get()
        ]);
    }

    private function _getZyProjectIndexSearch() {
        $_params = Yii::$app->request->get();
        if (empty($_params)) {
            return '1';
        }
        foreach ($_params as $k => $v) {
            $_params[$k] = addslashes($v);
        }
        unset($_params['page']);
        unset($_params['per-page']);
        if (empty($_params)) {
            return '1';
        }
        $w = '1';
        if ($_params['project_id']) {
            $w .= ' and zy_project.project_id="' . $_params['project_id'] . '" ';
        }
        if ($_params['budget_design_work_x']) {
            $w .= ' and zy_project.budget_design_work>="' . $_params['budget_design_work_x'] . '" ';
        }
        if ($_params['budget_design_work_s']) {
            $w .= ' and zy_project.budget_design_work<="' . $_params['budget_design_work_s'] . '" ';
        }
        if ($_params['service_type']) {
            $w .= ' and zy_project.service_type="' . $_params['service_type'] . '" ';
        }
        if ($_params['designer_level']) {
            $w .= ' and zy_project.designer_level="' . $_params['designer_level'] . '" ';
        }if ($_params['city']) {
            $w .= ' and zy_project.city="' . $_params['city'] . '" ';
        }
        if ($_params['compound']) {
            $w .= ' and zy_project.compound like "%' . $_params['compound'] . '%" ';
        }if ($_params['budget_design_x']) {
            $w .= ' and zy_project.budget_design>="' . $_params['budget_design_x'] . '" ';
        }
        if ($_params['budget_design_s']) {
            $w .= ' and zy_project.budget_design<="' . $_params['budget_design_s'] . '" ';
        }
        if ($_params['home_type']) {
            $w .= ' and zy_project.home_type like "%' . $_params['home_type'] . '%" ';
        }
        if ($_params['nickname']) {
            $w .= ' and zy_user.nickname like "%' . $_params['nickname'] . '%" ';
        }
        if ($_params['work_time_x']) {
            $w .= ' and zy_project.work_time>="' . $_params['work_time_x'] . '" ';
        }
        if ($_params['work_time_s']) {
            $w .= ' and zy_project.work_time<="' . $_params['work_time_s'] . '" ';
        }
        if ($_params['project_status']) {
            $w .= ' and zy_project.project_status="' . $_params['project_status'] . '" ';
        }
        if ($_params['covered_area_x']) {
            $w .= ' and zy_project.covered_area>="' . $_params['covered_area_x'] . '" ';
        }
        if ($_params['covered_area_s']) {
            $w .= ' and zy_project.covered_area<="' . $_params['covered_area_s'] . '" ';
        }
        if (isset($_params['is_rengong'])) {
            if (empty($_params['is_rengong'])) {
                $w .= ' and zy_project.is_rengong is null ';
            } else {
                $w .= ' and zy_project.is_rengong="' . $_params['is_rengong'] . '" ';
            }
        }


        return $w;
    }

    /**
     * Displays a single ZyProject model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ZyProject model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new ZyProject();

        if ($model->load(Yii::$app->request->post())) {
            $model->project_num = $this->createProNum();
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->project_id]);
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ZyProject model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->project_id]);
        } else {
            if($model->use_area=='undefined'){
                $model->use_area = '';
            }
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ZyProject model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ZyProject model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ZyProject the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ZyProject::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function createProNum() {
        $arr = range(1, 10);

        shuffle($arr);
        $phonestr = '';
        foreach ($arr as $values) {
            $phonestr = $phonestr . $values;
        }
        $phonestr = substr($phonestr, 3, 4);
        $phonestr = substr(time(), -2) . $phonestr;
        return $phonestr;
    }

    //查看匹配设计师
    public function actionMatchjson($id) {
        $model = $this->findModel($id);
        $pagination = new \yii\data\Pagination(['totalCount' => 10, 'pageSize' => 3]);
        return $this->render('matchjson',['model'=>$model,'pagination'=>$pagination]);
    }

}
