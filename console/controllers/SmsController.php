<?php
namespace console\controllers;

Use Yii;
use yii\console\Controller;

class SmsController extends Controller{

	public function actionRun(){
		//先摒弃这个方式，如果订单状态未变化，会一直发
		//轮询所有订单。
		do{
			$orders = \common\models\ZyOrder::find()->all();
			if(!empty($orders)){
				foreach($orders as $o){
					//订单待见面状态
					$status 		= $o->status;
					$aptTime 		= $o->appointment_time;
					$aptLocation 	= $o->appointment_location;
					$userId 		= $o->user_id;
					$designerId 	= $o->designer_id;
					$dRows 			= \backend\models\DesignerBasic::findOne($designerId);
					$dName = '';
					$dPhone = '';
					if(!empty($dRows)){
						$dName = $dRows->name;
					}
                	$dAdditionalModel = new \frontend\models\DesignerAdditional();
                	$dPhone = $dAdditionalModel->getPhoneByDesignerId($designerId);
					$uPhone = '';
					$uRows = \common\models\ZyUser::findOne($userId);
					if(!empty($uRows)){
						$uPhone = $uRows->phone;
						$uShowPhone = substr_replace($uPhone,'****',3,4);
					}

					$sms = new \common\util\ebaysms\Sms();
					if($status == \common\models\ZyOrder::STATUS_WAIT_MEETING){
						//给设计师发短信
						$aptTime = date("m月d日 H",$aptTime);
						$ret = $sms->send(array($dPhone),"【住艺】【预约成功】尊敬的$dName，您的客户（$uShowPhone）已确定见面时间和地点（$aptTime，地址$aptLocation）届时请保持电话畅通，预祝合作愉快。如您计划有变，请提前联系住艺。客服电话：4000-600-636");
						//给用户发短信
						$ret = $sms->send(array($uPhone),"【住艺】【预约成功】尊敬的用户，您预约的设计师$dName已确定见面时间和地点（$aptTime，地址$aptLocation）届时请保持电话畅通，预祝合作愉快。如您计划有变，请提前联系住艺。客服电话：4000-600-636");
					}
				}
			}
			usleep(1);
		}while(1);
		
	}
}
