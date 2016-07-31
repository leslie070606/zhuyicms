<?php

namespace backend\controllers;

use Yii;
use common\models\ZyArtsets;
use backend\models\search\ArtsetsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Url;

/**
 * ZyartsetsController implements the CRUD actions for ZyArtsets model.
 */
class ZyartsetsController extends Controller {

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
     * Lists all ZyArtsets models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ArtsetsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ZyArtsets model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ZyArtsets model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        error_reporting( E_ALL&~E_NOTICE );
        $model = new ZyArtsets();

        if ($ee = Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            //$upfile = UploadedFile::getInstancesByName('ImgSelect');
            $upfile = UploadedFile::getInstances($model, 'image_ids');
            $dir = Yii::getAlias("@frontend") . "/web/uploads/" . date("Ymd");

            $imgId = '';
            //如果有图片
            if (count($upfile) > 0) {
                if (!is_dir($dir))
                    mkdir($dir, 0777, true);

                foreach ($upfile as $imgobjct) {

                    $fileName = date("HiiHsHis") . $imgobjct->baseName . "." . $imgobjct->extension;

                    $dirimg = $dir . "/" . $fileName;

                    //保存图片
                    if ($imgobjct->saveAs($dirimg)) {
                        $imgModel = new \common\models\ZyImages();
                        $uploadSuccessPath = "/uploads/" . date("Ymd") . "/" . $fileName;

                        $imgModel->url = $uploadSuccessPath;
                        if ($imgModel->save()) {
                            $imgId .= ',' . (string) $imgModel->attributes['image_id'];
                        } else {
                            return '';
                        }
                    }
                }
                $model->image_ids = $imgId;
            }
            
            //插入时间
            $model->create_time = time();
            
            //保存数据
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->art_id]);
            }
        } else {
            return $this->render('create', [
                        'model' => $model, 'imgurl' => '', 'initialPreview' => '',
            ]);
        }
    }

    /**
     * Updates an existing ZyArtsets model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        
        //读取model
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $upfile = UploadedFile::getInstances($model, 'image_ids');
            $dir = Yii::getAlias("@frontend") . "/web/uploads/" . date("Ymd");
            
            //读取原model
            $modelAL = $this->findModel($id);
            $imgId = '';
            //如果有图片
            if (count($upfile) > 0) {
                if (!is_dir($dir))
                    mkdir($dir, 0777, true);

                foreach ($upfile as $imgobjct) {

                    $fileName = date("HiiHsHis") . $imgobjct->baseName . "." . $imgobjct->extension;

                    $dirimg = $dir . "/" . $fileName;

                    //保存图片
                    if ($imgobjct->saveAs($dirimg)) {
                        $imgModel = new \common\models\ZyImages();
                        $uploadSuccessPath = "/uploads/" . date("Ymd") . "/" . $fileName;

                        $imgModel->url = $uploadSuccessPath;
                        if ($imgModel->save()) {
                            $imgId .= ',' . (string) $imgModel->attributes['image_id'];
                        } else {
                            return '';
                        }
                    }
                }
                $model->image_ids = $modelAL->image_ids.$imgId;
            }else{
                //没有更新图片
                $model->image_ids = $modelAL->image_ids;
            }
            
            //添加更新时间
            $model->update_time = time();
            //var_dump($model->save());
            if ($model->save()) {
              
                return $this->redirect(['view', 'id' => $model->art_id]);
            }
        } else {
            //读取显示图片
            $imgurl = '';
            $initialPreview = '';
            if ($model->image_ids) {
                $imgstr = $model->image_ids;
                $imgarr = explode(',', $imgstr);
                $imgarr = array_filter($imgarr);
                foreach ($imgarr as $imgid) {
                    //查询图片
                    $imgModel = new \common\models\ZyImages();
                    $img = $imgModel->findOne($imgid);
                    if ($img) {
                        $imgurl[] = Yii::$app->params['frontDomain'] . $img->url;

                        //设置删除
                        $initialPreview[] = array('url' => Url::toRoute('/zyartsets/imgdelete'), 'key' => $imgid . "$" . $id);
                    }
                }
            }

            return $this->render('update', [
                        'model' => $model, 'imgurl' => $imgurl, 'initialPreview' => $initialPreview,
            ]);
        }
    }

    /**
     * Deletes an existing ZyArtsets model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ZyArtsets model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ZyArtsets the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ZyArtsets::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUploadimage() {
        return true;
    }

    public function actionImgdelete() {
        if ($imgid = Yii::$app->request->post('key')) {
            $imgModel = new \common\models\ZyImages();

            $idarr = explode('$', $imgid);
            //删除 图片表
            $model = $imgModel->findOne($idarr[0]);
            $model->delete();

            $artmodel = new ZyArtsets();
            $artmodel = $artmodel->findOne($idarr[1]);
            $artmodel->image_ids = str_replace(','.$idarr[0], '', $artmodel->image_ids);
            $artmodel->save();
        }
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ['success' => true];
    }

}
