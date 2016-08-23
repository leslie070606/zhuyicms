<?php

namespace backend\controllers;

use Yii;
use common\models\ZySearchHot;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ZysearchhotController implements the CRUD actions for ZyProject model.
 */
class ZysearchhotController extends Controller {

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
     * Mr.hao
     * 搜索热门推荐管理 首页列表
     * @return type null
     */
    public function actionIndex() {
        $model = ZySearchHot::find();
        $model->joinWith(['zyj_designer_basic']);
        $pages = new \yii\data\Pagination(['totalCount' => $model->count(), 'pageSize' => '15']);

        $model = $model->orderBy('hot_sort')->offset($pages->offset)->limit($pages->limit)->all();


        return $this->render('index', ['model' => $model, 'pages' => $pages]);
    }

    /**
     * 添加\编辑 设计师排序
     * @return type null
     */
    public function actionAddAndEdit() {
        $_id = Yii::$app->request->post('id');
        $model = new ZySearchHot();
        $model->hot_search_id = $_id;
        $model->hot_designer_id = intval(Yii::$app->request->post('hot_designer_id'));
        $model->hot_sort = intval(Yii::$app->request->post('hot_sort'));
        $model->hot_status = 1;
        $model->hot_uptime = strval(time());
        if ($_id) {
            $res = $model->updateAll($model, ['hot_search_id' => $_id]);
        } else {
            $res = $model->save();
        }
        if ($res) {
            echo '1';
        } else {
            echo '0';
        }
        exit();
    }

    /**
     * Deletes an existing ZySearchHot model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ZySearchHot model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ZySearchHot the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ZySearchHot::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
