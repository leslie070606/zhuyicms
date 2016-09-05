<?php

namespace frontend\controllers;

use yii;
use yii\web\Controller;
use frontend\models;

/**
 * 数据统计API接口
 * @author Haoshuaiwei <shuaiwei.hao@condenast.com.cn>
 * @date 2016-09-02 11:18:00
 */
class DataCountApiController extends Controller {

    /**
     * 添加数据统计
     */
    public function actionCreate() {
        //检验主分类
        $_mainTypeId = $this->__getParams('mtId');
        if (empty($_mainTypeId)) {
            $this->__error('mtId不能为空');
        }
        $_mainTypeName = \common\util\DataCount::getMainType($_mainTypeId, 0);
        if (!$_mainTypeName) {
            $this->__error('主分类不存在');
        }
        //检验主分类详情
        $_mainDetailId = $this->__getParams('mdId');
        if (empty($_mainDetailId)) {
            $this->__error('mdId不能为空');
        }
        $_mainDetailName = \common\util\DataCount::getMainTypeDetail($_mainTypeId, $_mainDetailId, 0);
        if (!$_mainDetailName) {
            $this->__error('列表项不存在或为空');
        }

        $model = new \common\models\ZyDataCount();
        $model->main_type_id = intval($_mainTypeId);
        $model->main_detail_id = intval($_mainDetailId);
        $model->main_type_name = $_mainTypeName;
        $model->main_detail_name = $_mainDetailName;
        $model->user_id = intval($this->__getParams('userId'));
        $model->designer_id = intval($this->__getParams('designerId'));
        $model->main_mark = $this->__getParams('mMark');
        $model->create_time = strval(time());
        $model->main_num = 1;
        $res = $model->save();

        if ($res) {
            $this->__sucess();
        } else {
            $this->__error('保存失败');
        }
    }

    /**
     * 封装获取get参数 
     * @param string $_key
     * @return array/null
     */
    private function __getParams($_key) {
        return Yii::$app->request->get($_key);
    }

    /**
     * 接口错误返回
     * @param string $msg
     * @return josn
     */
    private function __error($msg = 'error') {
        echo json_encode(['code' => '0', 'msg' => $msg]);
        exit();
    }

    /**
     * 接口正确返回
     * @return json
     */
    private function __sucess() {
        echo json_encode(['code' => '1', 'msg' => '成功']);
        exit();
    }

}
