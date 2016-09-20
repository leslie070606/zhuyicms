<?php

namespace backend\controllers;

use yii\web\Controller;
use common\models\Message;
use yii;

class MessageController extends controller {

    public function actionIndex() {
        //最新通知取最近10条数据
        $num = 20;
        $messageM = new \common\models\Message();
        $ret = $messageM->getLatestMessage($num);
        $data1 = array();
        if (!empty($ret)) {
            foreach ($ret as $r) {
                $dataTmp = array(
                    'id' => $r->id,
                    'time' => isset($r->update_time) ? $r->update_time : time(),
                    'contents' => isset($r->contents) ? $r->contents : '',
                    'project_id' => isset($r->project_id) ? $r->project_id : -1,
                    'order_id' => isset($r->order_id) ? $r->order_id : -1,
                    'type' => isset($r->type) ? $r->type : -1,
                );
                $data1[] = $dataTmp;
            }
        }

        //未处理需求。
        $ret = $messageM->getUnHandledProject();
        $data2 = array();
        if (!empty($ret)) {
            foreach ($ret as $r) {
                $dataTmp = array(
                    'id' => $r->id,
                    'time' => isset($r->update_time) ? $r->update_time : time(),
                    'contents' => isset($r->contents) ? $r->contents : '',
                    'project_id' => isset($r->project_id) ? $r->project_id : -1
                );
                $data2[] = $dataTmp;
            }
        }

        //未处理订单。
        $ret = $messageM->getUnhandledOrder();
        $data3 = array();
        if (!empty($ret)) {
            foreach ($ret as $r) {
                $dataTmp = array(
                    'id' => $r->id,
                    'time' => isset($r->update_time) ? $r->update_time : time(),
                    'contents' => isset($r->contents) ? $r->contents : '',
                    'order_id' => isset($r->order_id) ? $r->order_id : -1
                );
                $data3[] = $dataTmp;
            }
        }

        return $this->render('index', ['data1' => $data1, 'data2' => $data2, 'data3' => $data3]);
    }

    //客服代办的消息列表展示
    public function actionHome() {

        $message = Message::find();

        $pagination = new \yii\data\Pagination(['totalCount' => $message->count(), 'pageSize' => 10]);

        $data = $message->offset($pagination->offset)->limit($pagination->limit)->where(['status' => 0])->all();

        return $this->render('home', ['data' => $data, 'pagination' => $pagination]);
    }

    //管理消息列表
    public function actionTest() {

        $message = Message::find();

        $pagination = new \yii\data\Pagination(['totalCount' => $message->count(), 'pageSize' => 10]);

        $data = $message->offset($pagination->offset)->limit($pagination->limit)->all();

        return $this->render('index', ['data' => $data, 'pagination' => $pagination]);
    }

    //添加一条记录
    public function actionAdd() {

        $model = new Message();

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['index']);
        }
        return $this->render('add', ['model' => $model]);
    }

    //根据主健id修改一条记录
    public function actionEdit($id) {
        $id = (int) $id;
        if ($id > 0 && ($model = Message::findOne($id))) {

            if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
            return $this->render('edit', ['model' => $model]);
        }

        return $this->redirect(['index']);
    }

    /*
      //根据主健id删除一条记录
      public function actionDelete($id){
      $id = (int)$id;
      if($id > 0){
      Message::findOne($id)->delete();
      }
      return $this->redirect(['index']);

      } */

    public function actionDelete($id, $type) {
        if ($type == 0) {//需要根据project_id删除
            $projectId = $id;
            Message::deleteAll(['project_id' => $projectId]);
        } else if ($type == 1) { //根据order_id删除
            $orderId = $id;
            Message::deleteAll(['order_id' => $orderId]);
        }
        return $this->redirect(['index']);
    }

    // 标记为处理消息
    public function actionUpdatemsgstatus() {
        $message_id = Yii::$app->request->get('id');
        if ($message_id) {
            $model = Message::findOne($message_id);
            $model->status = 1;
            $model->save();
        }
        
        return $this->redirect(['index']);
    }

}
