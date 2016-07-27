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

	public function actionDetail(){
		$request = Yii::$app->request;
		/*
		if(!$request->isAjax){
			return false;
		}*/
		
		$params = $request->get('params');
		if(!isset($params)){
			return false;
		}
		$designerId 	= $params;
		$dbModel = new \frontend\models\DesignerBasic();
		$rows = $dbModel->getDesignerById($designerId);
		if(empty($rows)){
			return false;
		}
		$name 			= $rows->name;
		$tag 			= $rows->tag;

		$imageId 		= $rows->image_id;
		$imageModel 	= new \frontend\models\Images();
		$ret = $imageModel->findOne($imageId);
		if(empty($ret)){
			return false;
		}
		$headPortrait 	= $ret->url;
		$background 	= "img/home_page/banner_head.jpg";
		//作品...
        $data = array(
			'designer_id' 	=> $designerId,		//ID
            'name' 			=> $name, 			//姓名
            'tag' 			=> $tag, 			//标签
            'head_portrait' => $headPortrait, 	//头像
            'background' 	=> $background, 	//背景
			'winnings'		=> '国内优秀设计师，作品多次获得国外专家一致好评',
			'artsets'		=> array(
				array('topic' => 'ai','brief' => 'aii','path' => 'aiii'),
				array('topic' => 'bi','brief' => 'bii','path' => 'biii'),
				array('topic' => 'ci','brief' => 'cii','path' => 'ciii')
			)
        );
        return $this->render("detail", ['data' => $data]);
	}
    public function actionIndex() {
        //从上一个页面传过来，必须保证要有designer_id
        $request = Yii::$app->request;
        if (empty($request)) {
            return false;
        }
        $params = $request->get('params');
        var_dump($params);

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
            'winnings' => $ret->winning, //获奖经历
            'head_portrait' => $headPortrait, //头像
            'background' => $background, //背景
            'artsets' => $artRet, //设计师作品集
        );
        return $this->renderPartial("index", ['data' => $data]);
    }

	public function actionFilter(){
        $request = Yii::$app->request;
        if ($request->isAjax) {
            $params = $request->get('params');
            if (!isset($params)) {
                return false;
            }

            $pArray 	= explode(',', $params);
            $category 	= $pArray['0'];
            $serveCity 	= $pArray['1'];
            $condition 	= array(
                'category' => $category,
                'serve_city' => $serveCity,
            );
            $designerBasicM = new \frontend\models\DesignerBasic();

            $ret = $designerBasicM->getFilteredDesigners($condition);
            return $ret;
        }
	}

	public function actionList(){
		//默认第一次进来只显示前3条数据.
		$start = 0;

        $request = Yii::$app->request;
		if($request->isAjax){
            $params = $request->get('params');
            if (!isset($params)) {
                return false;
            }
			$start = $params;
		}

		$debModel = new \frontend\models\DesignerBasic();
		$rows = $debModel->getPartDesigners($start);
		if(empty($rows)){
			return false;
		}

		$data = array();
        foreach ($rows as $v) {
            $designerId 	= $v['id'];
			$imageId		= $v['image_id'];
            $name 			= $v['name'];
            $tag 			= $v['tag'];

			if(empty($tag)){
				$tag = "设计达人,艺术家";
			}
			
			$imageModel		= new \frontend\models\Images();
            $ret 			= $imageModel->findOne($imageId);
			if(empty($ret)){
				//无头像信息,后期设置个默认头像
				//continue;
				$headPortrait = "/img/home_page/banner_head.jpg";
			}else{
            	$headPortrait 	= $ret->url;
			}
			$background = "/img/home_page/prob.jpg";
            $designerRet = array(
                'designer_id' 	=> $designerId,
                'name' 			=> $name,
                'tag' 			=> $tag,
                'head_portrait' => $headPortrait,
                'background' 	=> $background,
            );
            $data[] = $designerRet;
        }
		if($request->isAjax){
			return json_encode($data);
		}else{
        	return $this->render("list", ["data" => $data]);
		}
	}
    //搜索设计师
    public function actionHunt() {
        $request = Yii::$app->request;
		$searchKey = "";
        if ($request->isAjax) {
            $searchKey = Yii::$app->request->get('search_key');
        }
        $designerM = new \frontend\models\DesignerBasic();
        $data = $designerM->findBySql("SELECT * FROM zy_designer_basic WHERE name LIKE '%" . $searchKey . "%'");
        return $this->render('hunt', ['data' => $data]);
    }

}
