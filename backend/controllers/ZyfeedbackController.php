<?php

namespace backend\controllers;

use Yii;
use common\models\ZyFeedback;
use backend\models\search\FeedbackSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ZyfeedbackController implements the CRUD actions for ZyFeedback model.
 */
class ZyfeedbackController extends Controller {

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
     * Lists all ZyFeedback models.
     * @return mixed
     */
    public function actionIndex() {
        //$searchModel = new FeedbackSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = ZyFeedback::find();
        $model->joinWith(['zy_user']);
        $pages = new \yii\data\Pagination(['totalCount' => $model->count(), 'pageSize' => '15']);
        $model = $model->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', [
                    'model' => $model,
                    'pages' => $pages,
        ]);
    }

    /**
     * Displays a single ZyFeedback model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        if (!empty($model->user_id)) {
            $_uModel = \common\models\ZyUser::findOne(['user_id' => $model->user_id]);
        } else {
            $_uModel = null;
        }

        return $this->render('view', [
                    'model' => $model,
                    'umodel' => $_uModel
        ]);
    }

    /**
     * Creates a new ZyFeedback model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new ZyFeedback();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->feedback_id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ZyFeedback model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->feedback_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ZyFeedback model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ZyFeedback model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ZyFeedback the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ZyFeedback::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
