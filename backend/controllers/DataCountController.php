<?php

namespace backend\controllers;

use yii\web\Controller;
use bacend\models;
use yii\web\UploadedFile;
use yii;

class DataCountController extends controller {

    /**
     * 页面加载统计
     * @return object
     */
    public function actionPageCount() {
        $_mKey = 3;
        $_pageList = \common\util\DataCount::getMainTypeDetail($_mKey, '', 0);
        $_md = Yii::$app->request->get('s');
        $_sTime = Yii::$app->request->get('sTime');
        $_eTime = Yii::$app->request->get('eTime');
        $_tmp = $this->_commonFunc($_mKey, $_md, $_sTime, $_eTime);
        return $this->render('page_count', ['pageList' => $_pageList, 'data' => $_tmp, 'md' => $_md, 'st' => $_sTime, 'et' => $_eTime]);
    }

    /**
     * 公共统计操作
     * @param int $_mKey
     * @param array $_md
     * @param string $_sTime
     * @param string $_eTime
     * @param string $_condition
     * @return array
     */
    private function _commonFunc($_mKey, $_md, $_sTime, $_eTime, $_condition = '') {
        $_tmp = [];
        if (!empty($_md)) {
            $query = \common\models\ZyDataCount::find();
            foreach ($_md as $k => $v) {
                $_tmp[$k]['key'] = $_mKey;
                $_tmp[$k]['dKey'] = $v;
                $_tmp[$k]['name'] = \common\util\DataCount::getMainTypeDetail($_mKey, $v, 0);
                $w = '1 and main_type_id="' . $_mKey . '" and main_detail_id="' . $v . '" ';
                if ($_sTime) {
                    $w .= ' and create_time>=' . strtotime($_sTime);
                }
                if ($_eTime) {
                    $w .= ' and create_time<=' . strtotime($_eTime);
                }
                if ($_condition) {
                    $w .= $_condition;
                }
                $_tmp[$k]['num'] = $query->where($w)->count();
            }
        }
        return $_tmp;
    }

    /**
     * 按钮统计
     * @return object
     */
    public function actionButtonCount() {
        $_mKey = 2;
        $_pageList = \common\util\DataCount::getMainTypeDetail($_mKey, '', 0);
        $_md = Yii::$app->request->get('s');
        $_sTime = Yii::$app->request->get('sTime');
        $_eTime = Yii::$app->request->get('eTime');
        $_tmp = $this->_commonFunc($_mKey, $_md, $_sTime, $_eTime);
        return $this->render('button_count', ['pageList' => $_pageList, 'data' => $_tmp, 'md' => $_md, 'st' => $_sTime, 'et' => $_eTime]);
    }

    /**
     * 需求统计
     * @return object
     */
    public function actionDemandCount() {
        $_mKey = 1;
        $_pageList = \common\util\DataCount::getMainTypeDetail($_mKey, '', 0);
        $_md = Yii::$app->request->get('s');
        $_sTime = Yii::$app->request->get('sTime');
        $_eTime = Yii::$app->request->get('eTime');
        $_tmp = $this->_commonFunc($_mKey, $_md, $_sTime, $_eTime);
        return $this->render('demand_count', ['pageList' => $_pageList, 'data' => $_tmp, 'md' => $_md, 'st' => $_sTime, 'et' => $_eTime]);
    }
    
    /**
     * 风格测试统计
     * @return object
     */
    public function actionStyleCount() {
        $_mKey = 6;
        $_pageList = \common\util\DataCount::getMainTypeDetail($_mKey, '', 0);
        $_md = Yii::$app->request->get('s');
        $_sTime = Yii::$app->request->get('sTime');
        $_eTime = Yii::$app->request->get('eTime');
        $_tmp = $this->_commonFunc($_mKey, $_md, $_sTime, $_eTime);
        return $this->render('demand_count', ['pageList' => $_pageList, 'data' => $_tmp, 'md' => $_md, 'st' => $_sTime, 'et' => $_eTime]);
    }
    
    /**
     * 风格渠道统计
     * @return object
     */
    public function actionStyleChannelCount() {
        $_mKey = 7;
        $_pageList = \common\util\DataCount::getMainTypeDetail($_mKey, '', 0);
        $_md = Yii::$app->request->get('s');
        $_sTime = Yii::$app->request->get('sTime');
        $_eTime = Yii::$app->request->get('eTime');
        $_tmp = $this->_commonFunc($_mKey, $_md, $_sTime, $_eTime);
        return $this->render('demand_count', ['pageList' => $_pageList, 'data' => $_tmp, 'md' => $_md, 'st' => $_sTime, 'et' => $_eTime]);
    }

    /**
     * 设计师统计
     * @return object
     */
    public function actionDesignerCount() {
        $_mKey = 4;
        $_pageList = \common\util\DataCount::getMainTypeDetail($_mKey, '', 0);
        $_md = Yii::$app->request->get('s');
        $_sTime = Yii::$app->request->get('sTime');
        $_eTime = Yii::$app->request->get('eTime');
        $_dsId = Yii::$app->request->get('dsId');
        //要去除的数组
        $_unsetArr = ['4005', '4004', '4003'];

        if ($_dsId) {
            $_tmpMd = array_diff($_md, $_unsetArr);
            $_tmp = $this->_commonFunc($_mKey, $_tmpMd, $_sTime, $_eTime, ' and designer_id="' . $_dsId . '"');
        } else {
            $_tmp = [];
        }

        $_tmpRes = $this->_totalCount($_mKey, $_md, $_sTime, $_eTime);

        $_tmp = array_merge($_tmp, $_tmpRes);

        return $this->render('designer_count', ['pageList' => $_pageList,
                    'data' => $_tmp,
                    'md' => $_md,
                    'st' => $_sTime,
                    'et' => $_eTime,
                    'dsId' => $_dsId,
                    'unsetArr' => $_unsetArr
        ]);
    }

    /**
     * 总和统计的子操作
     * @param int $_mKey
     * @param array $_md
     * @param string $_sTime
     * @param string $_eTime
     * @return array
     */
    private function _totalCount($_mKey, $_md, $_sTime, $_eTime) {
        $_tmp = [];
        $_tmpA = [];

        if (!empty($_md)) {
            $_intersect = ['4003', '4004', '4005'];
            $_tmpMdRes = array_intersect($_md, $_intersect);
            foreach ($_tmpMdRes as $k => $v) {
                switch ($v) {
                    case 4003:
                        $w = '1 and status=2 ';
                        if ($_sTime) {
                            $w .= ' and update_time>=' . strtotime($_sTime);
                        }
                        if ($_eTime) {
                            $w .= ' and update_time<=' . strtotime($_eTime);
                        }
                        $_tmp[$k]['key'] = $_mKey;
                        $_tmp[$k]['dKey'] = $v;
                        $_tmp[$k]['name'] = \common\util\DataCount::getMainTypeDetail($_mKey, $v, 0);
                        $_tmp[$k]['num'] = \frontend\models\CollectDesigner::find()->where($w)->count();
                        break;
                    case 4004:
                        $w = '1 ';
                        if ($_sTime) {
                            $w .= ' and update_time>=' . strtotime($_sTime);
                        }
                        if ($_eTime) {
                            $w .= ' and update_time<=' . strtotime($_eTime);
                        }
                        $_tmp[$k]['key'] = $_mKey;
                        $_tmp[$k]['dKey'] = $v;
                        $_tmp[$k]['name'] = \common\util\DataCount::getMainTypeDetail($_mKey, $v, 0);
                        $_tmp[$k]['num'] = \common\models\ZyOrder::find()->where($w)->count();
                        break;
                    case 4005:
                        $_tmpA = $this->_commonFunc($_mKey, ['4002'], $_sTime, $_eTime);
                        $_tmpA['0']['dKey'] = '4005';
                        $_tmpA['0']['name'] = \common\util\DataCount::getMainTypeDetail($_mKey, '4005', 0);
                        break;
                    default :
                        break;
                }
            }
            return array_merge($_tmp, $_tmpA);
        } else {
            return [];
        }
    }

    /**
     * 转化率统计
     * @return view
     */
    public function actionPercentConversion() {
        $_mKey = 5;
        $_pageList = \common\util\DataCount::getMainTypeDetail($_mKey, '', 0);
        $_md = Yii::$app->request->get('s');
        $_sTime = Yii::$app->request->get('sTime');
        $_eTime = Yii::$app->request->get('eTime');

        $_tmp = [];
        if (!empty($_md)) {
            foreach ($_md as $k => $v) {
                switch ($v) {
                    case '5001':
                        $_tmp[$k]['num'] = $this->_getPercentDetailDemand($_sTime, $_eTime).'%';
                        $_tmp[$k]['key'] = $_mKey;
                        $_tmp[$k]['dKey'] = $v;
                        $_tmp[$k]['name'] = \common\util\DataCount::getMainTypeDetail($_mKey, $v, 0);
                        break;
                    case '5002':
                        $_tmp[$k]['num'] = $this->_getPercentMatchDemand($_sTime, $_eTime).'%';
                        $_tmp[$k]['key'] = $_mKey;
                        $_tmp[$k]['dKey'] = $v;
                        $_tmp[$k]['name'] = \common\util\DataCount::getMainTypeDetail($_mKey, $v, 0);
                        break;
                    default :
                        break;
                }
            }
        }

        return $this->render('percent_conversion', ['pageList' => $_pageList,
                    'data' => $_tmp,
                    'md' => $_md,
                    'st' => $_sTime,
                    'et' => $_eTime
        ]);
    }

    /**
     * 细节需求转化率换算
     * @param string $_sTime
     * @param string $_eTime
     * @return flotval
     */
    private function _getPercentDetailDemand($_sTime, $_eTime) {
        //2001+2002/3001
        $_result2001 = $this->_commonFunc(2, ['2001'], $_sTime, $_eTime);
        $_result2002 = $this->_commonFunc(2, ['2002'], $_sTime, $_eTime);
        $_result3001 = $this->_commonFunc(3, ['3001'], $_sTime, $_eTime);
        if ($_result3001['0']['num'] <= 0) {
            return 0;
        }
        if (($_result2001['0']['num'] + $_result2002['0']['num']) <= 0) {
            return 0;
        }
        return round(($_result2001['0']['num'] + $_result2002['0']['num']) / $_result3001['0']['num'], 2) * 100;
    }

    /**
     * 匹配需求转化率换算
     * @param string $_sTime
     * @param string $_eTime
     * @return type
     */
    private function _getPercentMatchDemand($_sTime, $_eTime) {
        //2004/3002
        $_result2004 = $this->_commonFunc(2, ['2004'], $_sTime, $_eTime);
        $_result3002 = $this->_commonFunc(3, ['3002'], $_sTime, $_eTime);
        if ($_result2004['0']['num'] <= 0) {
            return 0;
        }
        if ($_result3002['0']['num'] <= 0) {
            return 0;
        }
        return round($_result2004['0']['num'] / $_result3002['0']['num'], 2) * 100;
    }

}
