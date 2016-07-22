<?php

namespace frontend\controllers;

use yii;
use yii\web\Controller;
use frontend\models;
use frontend\services;

class OrderController extends Controller {

    public $layout = false;

    public function actionIndex() {

        $request = Yii::$app->request->get('params');
        $dataRetrived = array();
        if ($request) {

            $dearr = explode('$', $request);
            $dataRetrived['user_id'] = $dearr[0];
            $dataRetrived['project_id'] = $dearr[1];

            //是否人工匹配
            if (!$dearr[2]) {
                return 3; //未选设计师
            } else {

                $dataRetrived['designer_ids'] = explode(',', $dearr[2]);
            }
            
          //  return $dataRetrived['designer_ids'][1];
        }

        $designerIds = $dataRetrived['designer_ids'];

        //创建三个订单，并且设置状态为待设计师确认。
        foreach ($designerIds as $d) {
            $data = array(
                'user_id' => $dataRetrived['user_id'],
                'project_id' => $dataRetrived['project_id'],
                'designer_id' => $d,
                'status' => \frontend\models\Order::STATUS_WAITING_DESIGNER_TO_CONFIRM,
                'appointment_time' => time(),
                'appointment_location' => '见面地点',
                'remark' => '订单',
                'service_type' => 0, //客服创建为1,用户:0
                'create_time' => time(),
                'update_time' => time(),
            );
            $orderModel = new \frontend\models\Order();
            $res = $orderModel->addOrder($data);

            if (!$res) {
                return 0; //为插入失败
            }
        }
        return 1; //插入成功
    }

    public function actionSetStatus($orderId, $status) {
        $orderModel = new \frontend\models\Order();
        $orderModel->setStatus($orderId, $status);
    }

    public function actionTest() {
        echo ("test action!!!");
        $orderModule = new \frontend\services\Order(1);
        $orderModule->test();
    }

    public function actionList() {
        $userId =1;
        $orderM = new \frontend\models\Order();
        $ret = $orderM->getOrdersByUserId($userId);
        return $this->render("list", ['data' => $ret]);
    }

    public function actionChange() {

        $request = Yii::$app->request;
        if (!$request->isAjax) {
            return false;
        }
        $params = $request->get('params');
        $params = explode(',', $params);
        $orderId = $params[1];
        $orderModel = new \frontend\models\Order();
        $orderRet = $orderModel->getOrderById($orderId);

        $orderStatus = $orderRet->status;
        switch ($orderStatus) {
            case \frontend\models\Order::STATUS_WAITING_USER_TO_CONFIRM_TIME:
                //从前台传过来的时间。
                $appointmentTime = $params[0];
                $newSts = \frontend\models\Order::STATUS_WAITING_MEETING;

                //$orderRet->appointment_time = $appointmentTime;
                $orderRet->status = $newSts;
                $orderRet->update_time = time();
                $orderRet->save();
                break;
            default:
                break;
        }
    }

    public function actionCooperation() {
        $request = Yii::$app->request;
        if (!$request->isAjax) {
            return false;
        }
        $params = $request->get('params');
        $params = explode(',', $params);

        $orderId = $params[0];
        $orderModel = new \frontend\models\Order();
        $orderRet = $orderModel->getOrderById($orderId);

        $orderStatus = $orderRet->status;
        switch ($orderStatus) {
            case \frontend\models\Order::STATUS_MET_DONE:
                $yesNo = $params[1];
                if ($yesNo == 'yes') {
                    $newSts = \frontend\models\Order::STATUS_MET_NOT_DEEP_COOPERATION;
                } elseif ($yesNo == 'no') {
                    $newSts = \frontend\models\Order::STATUS_MET_DEEP_COOPERATION;
                }

                $orderRet->status = $newSts;
                $orderRet->update_time = time();
                $orderRet->save();
                break;
            default:
                break;
        }
    }

}
