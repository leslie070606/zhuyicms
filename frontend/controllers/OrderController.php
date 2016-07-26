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
		//此用户下面没有订单
		if(empty($ret)){
			return $this->render("list",['data' => -1]);
		}else{
			$data = array();
			foreach($ret as $r){
				$orderId 	= $r['order_id']; 
				$designerId = $r['designer_id'];
				$rows 		= \frontend\models\DesignerBasic::findOne($designerId);
				if(empty($rows)){
					continue;
				}
				//获取设计师信息。
				$name 		= $rows->name;
				$tag		= $rows->tag;
				if(empty($tag)){
					$tag 	= "设计大咖,小暖暖";
				}
				$imageId 	= $rows->image_id;
				$imgRet 	= \frontend\models\Images::findOne($imageId);
				if(empty($imgRet)){
					$headPortrait = "img/home_page/banner_head.jpg";
				}else{
					$headPortrait = $imgRet->url;
				}
				$status 	= $r['status'];
				$orderType 	= $r['service_type'];//用于区别用户自己创建还是客服辅助创建。
				
				$element 	= array(
					'order_id' 		=> $orderId,
					'user_id'		=> $userId,
					'status' 		=> $status,
					'order_type'	=> $orderType,
					'designer'	=> array(
						'designer_id'	=> $designerId,
						'name'			=> $name,	
						'head_portrait'	=> $headPortrait,
						'tag'			=> $tag
					)
				);
				$data[] = $element;
			}
			/*
			if(empty($data)){
				return $this->render("list",['data' => -1]);
			}*/
			$data = array(
				array(
					'order_id' 	=> 1,
					'user_id'	=> 1,
					'status'	=> 0,
					'order_type' => 0,
					'designer' => array(	
						'designer_id' => 1,
						'name' => '千岛湖1',
						'head_portrait' => 'img/home_page/banner_head.jpg',
						'tag' => '啊啊啊,吼吼吼',
					)
				),
				array(
					'order_id' 	=> 2,
					'user_id'	=> 1,
					'status'	=> 2,
					'order_type' => 0,
					'designer' => array(	
						'designer_id' => 2,
						'name' => '千岛湖2',
						'head_portrait' => 'img/home_page/banner_head.jpg',
						'tag' => 'fake222,fake222',
					)
				),
				array(
					'order_id' 	=> 3,
					'user_id'	=> 1,
					'status'	=> 3,
					'order_type' => 0,
					'designer' => array(	
						'designer_id' => 3,
						'name' => '千岛湖3',
						'head_portrait' => 'img/home_page/banner_head.jpg',
						'tag' => 'fake333,fake333',
					)
				),
				array(
					'order_id' 	=> 4,
					'user_id'	=> 1,
					'status'	=> 4,
					'order_type' => 0,
					'designer' => array(	
						'designer_id' => 4,
						'name' => '千岛湖4',
						'head_portrait' => 'img/home_page/banner_head.jpg',
						'tag' => 'fake444,fake444',
					)
				),
				array(
					'order_id' 	=> 5,
					'user_id'	=> 1,
					'status'	=> 5,
					'order_type' => 0,
					'designer' => array(	
						'designer_id' => 5,
						'name' => '千岛湖5',
						'head_portrait' => 'img/home_page/banner_head.jpg',
						'tag' => 'fake555,fake555',
					)
				),
				array(
					'order_id' 	=> 6,
					'user_id'	=> 1,
					'status'	=> 6,
					'order_type' => 0,
					'designer' => array(	
						'designer_id' => 6,
						'name' => '千岛湖6',
						'head_portrait' => 'img/home_page/banner_head.jpg',
						'tag' => 'fake666,fake666',
					)
				),
				array(
					'order_id' 	=> 7,
					'user_id'	=> 1,
					'status'	=> 7,
					'order_type' => 0,
					'designer' => array(	
						'designer_id' => 7,
						'name' => '千岛湖7',
						'head_portrait' => 'img/home_page/banner_head.jpg',
						'tag' => 'fake777,fake777',
					)
				),
				array(
					'order_id' 	=> 8,
					'user_id'	=> 1,
					'status'	=> 8,
					'order_type' => 0,
					'designer' => array(	
						'designer_id' => 8,
						'name' => '千岛湖8',
						'head_portrait' => 'img/home_page/banner_head.jpg',
						'tag' => 'fake888,fake888',
					)
				)
			);
        	return $this->render("list", ['data' => $data]);
		}
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
