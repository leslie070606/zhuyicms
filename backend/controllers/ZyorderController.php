<?php

namespace backend\controllers;

use Yii;
use common\models\ZyOrder;
use backend\models\search\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ZyOrderController implements the CRUD actions for ZyOrder model.
 */
class ZyorderController extends Controller
{
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
     * Lists all ZyOrder models.
     * @return mixed
     */
    public function actionIndex()
    {   
        $model = new \common\models\ZyOrder();
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		//测试短信
		$param = array('1','2');
		//\common\atm\Event::send("bbb.com",1,$testData);
		
		$event = 1;
    	$recipient = new \common\atm\Recipient();
    	$_ret = $recipient->receive($event, $param);

        return $this->render('index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ZyOrder model.
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
     * Creates a new ZyOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ZyOrder();
        if($model->load(Yii::$app->request->post())){
			//客服创建完的订单，已经跟设计师沟通过，状态初始值为待用户确认时间。
			$model->status = 
				\common\models\ZyOrder::STATUS_WAITING_USER_TO_CONFIRM_TIME;

			//见面时间
			$appointmentTime = $model->attributes['appointment_time'];
			$appointmentTime = strtotime($appointmentTime);
			$model->appointment_time = $appointmentTime;

			$model->create_time = time();
			$model->update_time = time();

			//发送短信
			$userId = $model->attributes['user_id'];
			$rows = \common\models\ZyUser::findOne($userId);
			if(!empty($rows)){
				$phone = $rows->phone;
			}else{
				$phone = '';
			}
		
			$designerId = $model->attributes['designer_id'];
			$dRows = \backend\models\DesignerBasic::findOne($designerId);
			$designerName = '';
			if(!empty($dRows)){
				$designerName = $dRows->name;
			}
			$sms = new \common\util\emaysms\Sms();
        	$ret = $sms->send(array($phone),'【住艺】尊敬的用户,设计师'. $designerName . '已回复了见面时间，请尽快到住艺微信公众号-我的订单中进行查看并确认。客服电话:4000-600-636');
			if($model->save()){
				return $this->redirect(['view','id' => $model->order_id]);
			}
		}else{
            return $this->render('create', [
                'model' => $model,
            ]);
		}

		/*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->order_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/
    }

    /**
     * Updates an existing ZyOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

		//原有的见面时间及见面地点。
		$orgAppTime = $model->appointment_time;
		$orgAppLocation = $model->appointment_location;

        if($model->load(Yii::$app->request->post())){
            //见面时间
            $appointmentTime = $model->attributes['appointment_time'];
            $appointmentTime = strtotime($appointmentTime);
            $model->appointment_time = $appointmentTime;

			$status = $model->attributes['status'];
			$model->status = $status;

			//-------新的短信需求V1.0.1----------
			if(isset($orgAppTime) &&!empty($orgAppTime)){
				/*
				$testData = array('1','2');
				\common\atm\Event::send("localhost",1,$testData);
				*/
			}

			$model->update_time = time();
			if($model->save()){
				return $this->redirect(['view','id' => $model->order_id]);
			}
		}else{
            return $this->render('create', [
                'model' => $model,
            ]);
		}
    }

    /**
     * Deletes an existing ZyOrder model.
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
     * Finds the ZyOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ZyOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ZyOrder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
