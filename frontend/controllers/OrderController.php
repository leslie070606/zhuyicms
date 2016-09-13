<?php

namespace frontend\controllers;

use yii;
use yii\web\Controller;
use frontend\models;
use frontend\services;

class OrderController extends \common\controllers\BaseController {

    public $layout = false;

    public function actionIndex() {
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        $userId = $session->get("user_id");
        if (!isset($userId) || empty($userId)) {
            $_cookieSts = \common\controllers\BaseController::checkLoginCookie();
            if (!$_cookieSts) {
                return 0;
            }
        }

        $request = Yii::$app->request->get('params');

        $dataRetrived = array();
        if ($request) {
            $dearr = explode('$', $request);
            $dataRetrived['user_id'] = $dearr[0];
            $dataRetrived['project_id'] = $dearr[1];

            //是否人工匹配
            if (!$dearr[2]) {
                $model = new \common\models\ZyProject();
                $project = $model->findOne(['project_id' => $dearr[1]]);
                $project->is_rengong = '1';
                $project->save();
                return 3; //未选设计师
                //跳转到人工服务
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
                'appointment_time' => '',
                'appointment_location' => '',
                'remark' => '',
                'service_type' => 1, //客服创建为0,用户:1
                'create_time' => time(),
                'update_time' => time(),
            );
            $orderModel = new \frontend\models\Order();
            $res = $orderModel->addOrder($data);

            //发送一条客服消息
            //保存返回的ID
            $oid = $orderModel->attributes['order_id'];
            //发送一条客服消息
            $messageModel = new \common\models\Message();
            $data = array('contents' => "用户 [" . $userId . "] 提交了新订单", 'order_id' => $oid);

            //$type 为0 代表需求订单
            $type = 1;
            $messageModel->createMessage($data, $type);

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

        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        $userId = $session->get("user_id");
        if (!isset($userId) || empty($userId)) {
            $_cookieSts = \common\controllers\BaseController::checkLoginCookie();
            if (!$_cookieSts) {
                return $this->redirect(['user/login']);
            }
        }

        $orderM = new \frontend\models\Order();
        $ret = $orderM->getOrdersByUserId($userId);

        $tokenModel = new \app\components\Token();
        // 获取JS签名
        // $jsarr = $tokenModel->getSignature();
        $jsarr = '';

        $projectModel = new \frontend\models\Project();
        $projectRows = $projectModel->getProjectByUserId($userId);
        $hasProject = 0; //0代表没有需求。
        if (!empty($projectRows)) {
            $hasProject = 1;
        }

        //是否需要人工匹配
        $isRengong = isset($projectRows->is_rengong) ? $projectRows->is_rengong : 0;

        $toFrontend = -1;
        //此用户下面没有订单
        if (empty($ret)) {
            //没有提交需求的，快提交需求
            //提交需求，还未选择设计师
            //提交需求，住艺君给推荐，未匹配上设计师

            if ($hasProject == 0) {
                $toFrontend = -1;
            } elseif ($hasProject == 1 && $isRengong == 0) {
                $toFrontend = -2;
            } elseif ($hasProject == 1 && $isRengong == 1) {
                $toFrontend = -3;
            }
            return $this->render("list", ['data' => $toFrontend, 'jsarr' => $jsarr]);
        } else {
            $data = array();
            foreach ($ret as $r) {
                $orderId = $r['order_id'];
                $designerId = $r['designer_id'];
                $rows = \frontend\models\DesignerBasic::findOne($designerId);
                if (empty($rows)) {
                    continue;
                }
                //获取设计师信息。
                $name = $rows->name;
                $tag = $rows->tag;
                if (empty($tag)) {
                    $tag = "设计大咖,小暖暖";
                }
                $imageId = $rows->image_id;
                $imgRet = \frontend\models\Images::findOne($imageId);
                if (empty($imgRet)) {
                    $headPortrait = "img/home_page/banner_head.jpg";
                } else {
                    $headPortrait = $imgRet->url;
                }
                $dbModel = new \frontend\models\DesignerBasic();
                $headBackground = $dbModel->getHeadBackground($designerId);
                $status = $r['status'];
                $orderType = $r['service_type']; //区别用户自己创建还是客服辅助创建。
                $dSpareTime = isset($r['designer_spare_time']) ? $r['designer_spare_time'] : '';
                $appointmentTime = isset($r['appointment_time']) ? $r['appointment_time'] : '';
                $appointmentLocation = isset($r['appointment_location']) ? $r['appointment_location'] : '';
                //推荐理由
                $reason = isset($r['reason']) ? $r['reason'] : '客服推荐';

                //订单创建时间
                $createTime = isset($r['create_time']) ? $r['create_time'] : time();
                /*
                 * 如果当前的订单状态是待见面状态，
                 * 那么appointment_time是不为空的，
                 * 如果当前的时间超过了用户的见面时间，
                 * 那么需要置状态为下一个待确认见面完成状态。
                 */
                //后期放入队列中，有个守护进程去从队列里取数据，并进行监听。
                if ($status == \frontend\models\Order::STATUS_WAITING_MEETING) {
                    if (time() > $appointmentTime) {
                        $orderM = new \frontend\models\Order();
                        $status = \frontend\models\Order::STATUS_WAITING_MET_DONE;
                        $orderM->setStatus($orderId, $status);
                    }
                }

                $element = array(
                    'order_id' => $orderId,
                    'user_id' => $userId,
                    'status' => $status,
                    'order_type' => $orderType,
                    'designer_spare_time' => $dSpareTime,
                    'appointment_time' => $appointmentTime,
                    'appointment_location' => $appointmentLocation,
                    'create_time' => $createTime,
                    'reason' => $reason,
                    'designer' => array(
                        'designer_id' => $designerId,
                        'name' => $name,
                        'head_portrait' => $headPortrait,
                        'head_background' => $headBackground,
                        'tag' => $tag
                    )
                );
                $data[] = $element;
            }
            if (empty($data)) {
                return $this->render("list", ['data' => -1, 'jsarr' => $jsarr]);
            }
            return $this->render("list", ['data' => $data, 'jsarr' => $jsarr]);
        }
    }

    public function actionChange() {
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        $userId = $session->get("user_id");
        if (!isset($userId) || empty($userId)) {
            $_cookieSts = \common\controllers\BaseController::checkLoginCookie();
            if (!$_cookieSts) {
                return $this->redirect(['user/login']);
            }
        }
        $userRows = \common\models\ZyUser::findOne($userId);
        $phone = '';
        if (!empty($userRows)) {
            $phone = $userRows->phone;
        }

        $request = Yii::$app->request;
        if (!$request->isAjax) {
            return false;
        }
        $params = $request->get('params');
        $params = explode(',', $params);
        if (empty($params)) {
            return false;
        }
        $orderId = $params[0];
        $rows = \frontend\models\Order::findOne($orderId);
        if (empty($rows)) {
            return false;
        }

        $appointmentLocation = isset($rows->appointment_location) ? $rows->appointment_location : '待定';
        $currentStatus = $rows->status;
        switch ($currentStatus) {
            case \frontend\models\Order::STATUS_WAITING_USER_TO_CONFIRM_TIME:
                //带用户确认时间状态，用户点击一个前台传递过来的时间。
                $appointmentTime = ($params[1] / 1000);
                $newSts = \frontend\models\Order::STATUS_WAITING_MEETING;

                $rows->appointment_time = $appointmentTime;
                $rows->status = $newSts;
                $rows->update_time = time();
                $rows->save();

                $newTime = date('Y-m-d H:i:s', $appointmentTime);
                $sms = new \common\util\emaysms\Sms();
                Yii::info($phone, 'pushNotifications');
                Yii::info($newTime, 'pushNotifications');
                $ret = $sms->send(array($phone), '【住艺】尊敬的用户,您的设计师将于' . $newTime . '前往' . $appointmentLocation . '与您首次见面，请保持电话畅通，预祝合作愉快。客服电话:4000-600-636');
                Yii::info($ret, 'pushNotifications');
                //给设计师发短信。
                $designerId = $rows->designer_id;
                $rows = \frontend\models\DesignerBasic::findOne($designerId);
                if (!empty($rows)) {
                    $name = $rows->name;
                }
                $dAdditionalModel = new \frontend\models\DesignerAdditional();
                $phone = $dAdditionalModel->getPhoneByDesignerId($designerId);
                $phone = isset($phone) ? $phone : "15810649252";
                Yii::info($phone, 'pushNotifications');
                $ret = $sms->send(array($phone), '【住艺】Hi' . $name . ',您的客户已确定' . $newTime . '前往' . $appointmentLocation . '与您首次见面，请保持电话畅通，预祝合作愉快。客服电话:4000-600-636');
                Yii::info($ret, 'pushNotifications');
                return $appointmentLocation;
                break;
            case \frontend\models\Order::STATUS_MET_DONE:
                $yesNo = $params[1];
                if ($yesNo == 'yes') {
                    $newSts = \frontend\models\Order::STATUS_MET_DEEP_COOPERATION;
                } elseif ($yesNo == 'no') {
                    $newSts = \frontend\models\Order::STATUS_MET_NOT_DEEP_COOPERATION;
                }

                $rows->status = $newSts;
                $rows->update_time = time();
                $rows->save();
                break;
            default:
                break;
        }
    }

    public function actionContract() {
        $tokenModel = new \app\components\Token();
        // 获取JS签名
        $jsarr = $tokenModel->getSignature();
        $accessToken = $tokenModel->getToken();


        $request = Yii::$app->request;
        if (!$request->isAjax) {
            return false;
        }
        $params = $request->get('params');
        if (!isset($params) || empty($params)) {
            return false;
        }
        //前台ajax数据传送格式为订单号$图片id1,图片id2...
        $params = explode('$', $params);
        if (empty($params)) {
            return false;
        }
        $orderId = $params[0];
        $orderRows = \frontend\models\Order::findOne($orderId);
        $imagesStr = $params[1];
        if (isset($imagesStr)) {
            $imagesArr = explode(',', $imagesStr);
        }

        if (empty($imagesArr)) {
            return false;
        }

        $imgIds = '';
        foreach ($imagesArr as $id) {
            $wd = new \app\components\WeixinDownloadImg();
            $imgModel = new \common\models\ZyImages();
            $uploadImgUrl = $wd->wxDownImg($mid, $accessToken);
            if ($uploadImgUrl) {
                $imgModel->url = $uploadImgUrl;
                if ($imgModel->save()) {
                    $imgIds .= ',' . (string) $imgModel->attributes['image_id'];
                }
            }
        }
        $orderRows->contract = $imgIds;
        $orderRows->save();
    }

    //合同上传
    public function actionUploadhetong() {
        $this->layout = "editadditional"; //设置使用的布局文件
        //echo 1;exit;
        $imgurl = '';
        $initialPreview = '';
        $orderModel = new models\Order();
        //$this->redirect($url)
        return $this->render('uploadhetong', ['model' => $orderModel, 'imgurl' => $imgurl, 'initialPreview' => $initialPreview]);
    }

    public function actionUploadimage() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ['success' => true];
    }

}
