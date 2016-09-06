<?php

namespace frontend\controllers;

use yii;
use yii\web\Controller;
use frontend\models;

class DesignerController extends Controller {

    public $layout = false;

    public function actionGet_designer_basic_info($designerId) {
        if (!isset($designerId)) {
            return false;
        }

        $designerM = new \frontend\models\DesignerBasic();
        $ret = $designerBasicModel->getDesignerById($designerId);
        if (empty($ret)) {
            return false;
        }

        //姓名,标签
        $name = $ret->name;
        $tag = $ret->tag;

        $imageM = new \frontend\models\Images();
        $ret = $imageM->getImage(
                \frontend\models\Images::IMAGE_DESIGNER_HEAD_PORTRAIT, $designerId);
        if (empty($ret)) {
            return false;
        }
        $headPortrait = $ret->url;

        $data = array(
            'name' => $name,
            'tag' => $tag,
            'head_portrait' => $headPortrait,
        );

        return json_encode($data);
    }

    public function actionArts() {
        $request = Yii::$app->request;
        if (!$request->isAjax) {
            return false;
        }
        $params = $request->get('params');
        if (!isset($params) || empty($params)) {
            return false;
        }
        $designerId = $params;

        $artModel = new \frontend\models\Artsets();
        $artsets = $artModel->getArtsetsByDesignerId($designerId);
        $data = array();
        if (!empty($artsets)) {
            foreach ($artsets as $a) {
                //var_dump($a);
                $artId = $a->art_id;
                $type = $a->type;
                $background = '';
                $imageUrlArr = array();
                $videoUrl = '';
                $topic = isset($a->topic) ? $a->topic : '';
                if ($type == 0) {
                    $imageIds = isset($a->image_ids) ? $a->image_ids : '';
                    $imageIdsArr = explode(',', $imageIds);
                    //$imageUrlArr = array();
                    foreach ($imageIdsArr as $id) {
                        $ret = \frontend\models\Images::findOne($id);
                        if (empty($ret)) {
                            continue;
                        }
                        $imageUrlArr[] = $ret->url;
                    }
                    if (!empty($imageUrlArr)) {
                        $background = $imageUrlArr[0];
                    }
                } elseif ($type == 1) {
                    $videoId = isset($a->video_ids) ? $a->video_ids : '';

                    $rows = \common\models\ZyVideo::findOne($videoId);
                    if (!empty($rows)) {
                        $videoUrl = $rows->video_url;
                    }

                    $background = isset($rows->video_image) ? $rows->video_image : "/img/home_page/proc.jpg";
                }

                $element = array(
                    'art_id' => $artId,
                    'type' => $type,
                    'background' => $background,
                    'image_urls' => $imageUrlArr,
                    'video_url' => $videoUrl,
                    'topic' => $topic
                );
                $data[] = $element;
            }
        }
        $data = json_encode($data);
        return $data;
        //return $this->render("alls",['data' => $data]);
    }

    public function actionAlls() {
        return $this->render("alls");
    }

    public function actionDetail() {

        // 分享JS接口
        $tokenModel = new \app\components\Token();
        // 获取JS签名
        $jsarr = $tokenModel->getSignature();


        //$jsarr = $tokenModel->getJspticket();
        //把这个用户ID传给前台，前台根据用户ID来做判断，
        //如果为空，需要跳转到登陆页面
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        $userId = $session->get("user_id");

        $request = Yii::$app->request;
        /*
          if(!$request->isAjax){
          return false;
          } */

        $params = $request->get('params');
        if (!isset($params) || empty($params)) {
            return false;
        }

        $designerId = $params;
        $dbModel = new \frontend\models\DesignerBasic();
        $rows = $dbModel->getDesignerById($designerId);
        if (empty($rows)) {
            return false;
        }
        $name = $rows->name;
        $tag = $rows->tag;
        if (!isset($tag) || empty($tag)) {
            $tag = "艺术家,设计小达人";
        }
        $experience = isset($rows->experience) ? $rows->experience : '';
		$interests = isset($rows->interests)? $rows->interests : '';
        $tmp = $dbModel->getHeadPortrait($designerId);
        $headPortrait = isset($tmp) ? $tmp : "/img/home_page/banner_head.jpg";

        $tmp = $dbModel->getHeadBackground($designerId);
        //$tmp 			= $dbModel->getBackground($designerId);
        $background = isset($tmp) ? $tmp : "/img/home_page/prob.jpg";
        //作品...
        $artModel = new \frontend\models\Artsets();
        $artsets = $artModel->getPartArtsByDesignerId($designerId);
        $artCnt = \frontend\models\Artsets::find()->where(['designer_id' => $designerId])->count();
        //收费...
        $dWorkModel = new \frontend\models\DesignerWork();
        $cost = $dWorkModel->getCost($designerId);

        //基本信息服务范围.
        $serviceContent = $dWorkModel->getServiceContent($designerId);
        $serviceContent = explode(',', $serviceContent);
        $yingzhuangArr = array(1, 2, 3, 4);
        $gongzhuangArr = array(5, 6, 7, 8);
        $ruanzhuangArr = array(9, 10, 11);
        //后期用一个变量，按位或来操作。
        $yingType = 0;
        $gongType = 0;
        $ruanType = 0;
        if (!empty($serviceContent)) {
            foreach ($serviceContent as $s) {
                if (in_array($s, $yingzhuangArr)) {
                    $yingType = 1;
                } elseif (in_array($s, $gongzhuangArr)) {
                    $gongType = 1;
                } elseif (in_array($s, $ruanzhuangArr)) {
                    $ruanType = 1;
                }
            }
        }

        //服务城市
        $serveCity = $dWorkModel->getServeCity($designerId);
        //擅长风格
        $style = $dWorkModel->getStyle($designerId);
        $data = array(
            'user_id' => $userId,
            'designer_id' => $designerId, //ID
            'name' => $name, //姓名
            'tag' => $tag, //标签
            'head_portrait' => $headPortrait, //头像
            'background' => $background, //背景
            'art_cnt' => $artCnt, //作品数量
            'artsets' => $artsets, //作品集
            'cost' => $cost,
            'service_content' => array(
                'ying_type' => $yingType,
                'gong_type' => $gongType,
                'ruan_type' => $ruanType
            ),
            'serve_city' => $serveCity,
            'style' => $style,
            'experience' => $experience,
			'interests' => $interests
        );
        return $this->render("detail", ['data' => $data, 'jsarr' => $jsarr]);
    }

    public function actionArtsets() {
        $request = Yii::$app->request;
        if (!$request->isAjax) {
            return NULL;
        }
        //return json_encode(array('/img/home_page/banner_head.jpg','img/home_page/prob.jpg'));
        $params = $request->get('params');
        if (!isset($params) || empty($params)) {
            return NULL;
        }
        $artId = $params;

        $rows = \frontend\models\Artsets::findOne($artId);
        if (empty($rows)) {
            return NULL;
        } else {
            $imgIds = $rows->image_ids;
            $imgIdsArr = explode(',', $imgIds);
            $imgUrlArr = array();
            foreach ($imgIdsArr as $id) {
                $imgRet = \frontend\models\Images::findOne($id);
                if (!empty($imgRet)) {
                    $imgUrlArr[] = $imgRet->url;
                }
            }
            return json_encode($imgUrlArr);
        }
    }

    public function actionIndex() {
        //从上一个页面传过来，必须保证要有designer_id
        $request = Yii::$app->request;
        if (empty($request)) {
            return false;
        }
        $params = $request->get('params');
        //var_dump($params);

        $designerId = $params;

        $designerBasicModel = new \frontend\models\DesignerBasic();
        $ret = $designerBasicModel->getDesignerById($designerId);

        $imageModel = new \frontend\models\Images();

        //头像及背景
        $headPortrait = $imageModel->getImage(
                        \frontend\models\Images::IMAGE_DESIGNER_HEAD_PORTRAIT, $designerId)->url;
        $background = $imageModel->getImage(
                        \frontend\models\Images::IMAGE_DESIGNER_BACKGROUND, $designerId)->url;

        //作品集...暂时只提供三幅作品
        $artsetsModel = new \frontend\models\Artsets();
        $artRet = $artsetsModel->getArtsetsByDesignerId($designerId);

        //服务
        //返回给视图层的数据
        $data = array(
            'name' => $ret->name, //姓名
            'tag' => $ret->tag, //标签
            'experience' => $ret->experience, //获奖经历
            'head_portrait' => $headPortrait, //头像
            'background' => $background, //背景
            'artsets' => $artRet, //设计师作品集
        );
        return $this->renderPartial("index", ['data' => $data]);
    }

    public function actionFilter() {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            $params = $request->get('params');
            if (!isset($params)) {
                return false;
            }

            $pArray = explode(',', $params);
            $category = $pArray['0'];
            $serveCity = $pArray['1'];
            $condition = array(
                'category' => $category,
                'serve_city' => $serveCity,
            );
            $designerBasicM = new \frontend\models\DesignerBasic();

            $ret = $designerBasicM->getFilteredDesigners($condition);
            return $ret;
        }
    }

    public function actionList() {
        //默认第一次进来只显示前3条数据.
        $start = 0;

        $request = Yii::$app->request;
        if ($request->isAjax) {
            $params = $request->get('params');
            if (!isset($params)) {
                return false;
            }
            $start = $params;
        }

        $debModel = new \frontend\models\DesignerBasic();
        $rows = $debModel->getSortedDesigners($start);
        //$rows = $debModel->getPartDesigners($start);
        if (empty($rows)) {
            return false;
        }

        $data = array();
        foreach ($rows as $v) {
            $designerId = $v['id'];
            $imageId = $v['image_id'];
            $name = $v['name'];
            $tag = $v['tag'];
            $headimgid = $v['head_imgid'];

            if (empty($tag)) {
                $tag = "设计达人,艺术家";
            }

            $imageModel = new \frontend\models\Images();
            $ret = $imageModel->findOne($imageId);

            //头图
            $headimgmodel = $imageModel->findOne($headimgid);

            if (empty($ret)) {
                //无头像信息,后期设置个默认头像
                //continue;
                $headPortrait = "/img/home_page/banner_head.jpg";
            } else {
                $headPortrait = $ret->url;
            }
            $headPortrait = isset($headPortrait) && !empty($headPortrait) ?
                    $headPortrait : '/img/home_page/banner_head.jpg';

            //读取头图
            //$background = \frontend\models\DesignerBasic::getBackground($designerId);
            if (empty($headimgmodel)) {
                $headimg = 'img/home_page/designer_headimg.jpg';
            } else {
                $headimg = $headimgmodel->url;
            }

//            if (!isset($background)) {
//                $background = "/img/home_page/prob.jpg";
//            }

            $dWorkModel = new \frontend\models\DesignerWork();
            $city = $dWorkModel->getCity($designerId);
            $designerRet = array(
                'designer_id' => $designerId,
                'name' => $name,
                'tag' => $tag,
                'head_portrait' => $headPortrait,
                'background' => $headimg,
                'city' => $city
            );
            $data[] = $designerRet;
        }
        if ($request->isAjax) {
            return json_encode($data);
        } else {
            return $this->render("list", ["data" => $data]);
        }
    }

    //搜索设计师
    public function actionHunt() {
        $request = Yii::$app->request;
        $searchKey = "";
        if ($request->isAjax) {
            $searchKey = Yii::$app->request->get('search_key');
            if ($searchKey) {
                $designerM = new \frontend\models\DesignerBasic();
                $designer = $designerM::findBySql("select * from zyj_designer_basic where name like '%" . $searchKey . "%'")->all();

                if (count($designer) > 0) {

                    //判断用户是否登录
                    $session = Yii::$app->session;
                    if (!$session->isActive) {
                        $session->open();
                    }
                    $userId = $session->get("user_id");

                    if (!isset($userId) || empty($userId)) {

                        $_cookieSts = \common\controllers\BaseController::checkLoginCookie();

                        if ($_cookieSts) {
                            //如果是登录用户
                            $userId = $session->get("user_id");

                            //插入用户的搜索信息
                            $userModel = new \frontend\models\User();
                            $userinfo = $userModel->findOne($userId);

                            $userHistory = new \common\models\ZyHistory();

                            $userHistory->user_id = $userId;
                            $userHistory->user_name = $userinfo['nickname'];
                            $userHistory->content = $searchKey;
                            $userHistory->phone = $userinfo['phone'];
                            $userHistory->create_time = strval(time());
                            $userHistory->save();
                        }else{
                            //没有登录正常返回
                        }
                    } else {
                        //插入用户的搜索信息
                        $userModel = new \frontend\models\User();
                        $userinfo = $userModel->findOne($userId);

                        $userHistory = new \common\models\ZyHistory();

                        $userHistory->user_id = $userId;
                        $userHistory->user_name = $userinfo['nickname'];
                        $userHistory->content = $searchKey;
                        $userHistory->phone = $userinfo['phone'];
                        $userHistory->create_time = (string) time();
                        $userHistory->save();
                    }
                    return $this->render('searchdesigner', ['data' => $designer]);
                } else {
                    return FALSE;
                }
            }
        } else {
            //读取搜索历史
            //判断用户是否登录
            $session = Yii::$app->session;
            if (!$session->isActive) {
                $session->open();
            }
            $userId = $session->get("user_id");
            if (!isset($userId) || empty($userId)) {
                $_cookieSts = \common\controllers\BaseController::checkLoginCookie();
                if ($_cookieSts) {
                    $userId = $session->get("user_id");
                } else {
                    $userId = '';
                }
            }
            //根据用户ID查询历史搜索 按时间降序排列取3条
            $historyModel = new \common\models\ZyHistory();
            $historyArr = $historyModel->find()->where(['user_id' => $userId])->orderBy('create_time DESC')->limit(3)->all();
            if (!$historyArr) {
                $historyArr = array();
            }
            return $this->render('hunt', ['history' => $historyArr]);
        }
    }

}
