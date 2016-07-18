<?php
namespace frontend\controllers;

use yii;
use yii\web\Controller;
use frontend\models;

class DesignerController extends Controller{

	public function actionIndex(){
		//从上一个页面传过来，必须保证要有designer_id
		$request = Yii::$app->request;
		if(empty($request)){
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
			\frontend\models\Images::IMAGE_DESIGNER_HEAD_PORTRAIT,$designerId)->url;
		$background   = $imageModel->getImage(
			\frontend\models\Images::IMAGE_DESIGNER_BACKGROUND,$designerId)->url;
		
		//作品集...暂时只提供三幅作品
		$artsetsModel = new \frontend\models\Artsets();
		$artRet = $artsetsModel->getArtsetsByDesignerId($designerId);

		//服务
		//返回给视图层的数据
		$data = array(
			'name' 			=> $ret->name, 	  //姓名
			'tag' 			=> $ret->tag,	  //标签
			'winnings' 		=> $ret->winning, //获奖经历
			'head_portrait' => $headPortrait, //头像
			'background' 	=> $background,   //背景
			'artsets'		=> $artRet,		  //设计师作品集
		);
		return $this->renderPartial("index",['data' => $data]);
	}
	
	public function actionList(){
		/*
		 * 筛选
		 */
		$request = Yii::$app->request;
		if($request->isAjax){
			$params = $request->get('params');
			if(!isset($params)){
				return false;
			}

			$pArray 	= explode(',',$params);
			$category 	= $pArray['0'];
			$serveCity 	= $pArray['1'];
			$condition = array(
				'category' => $category,
				'serve_city' => $serveCity,
			);
			$designerBasicM = new \frontend\models\DesignerBasic();
			
			$ret = "response to ajax";
			//$ret = $designerBasicM->getFilteredDesigners($condition);
			return $ret;
		}


		$designerBasicModel = new \frontend\models\DesignerBasic();
		$allDesigners = $designerBasicModel->getAlldesigners();

        $imageModel = new \frontend\models\Images();
		$artsetsModel = new \frontend\models\Artsets();

		$counter = 0;

		//分页及对ajax输入请求的判断
		$cnt = $designerBasicModel->getDesignersCount();
		$pagination = new \yii\data\Pagination(['totalCount' => $cnt]);
		$ret = $designerBasicModel->find()
			->offset($pagination->offset)->limit($pagination->limit)->all();
		foreach($ret as $k => $v){
			$designerId 	= $v->designer_id;
			$name 			= $v->name;
			$tag 			= $v->tag;
			$ret 			= $imageModel->getImage(\frontend\models\Images::IMAGE_DESIGNER_HEAD_PORTRAIT,$designerId);
			$headPortrait 	= !empty($ret->url)? $ret->url : "";
			$artRet			= $artsetsModel->getOneArtByDesignerId($designerId);
			if(empty($artRet)){
				//如果此设计师没有作品，直接忽略
				continue;
			}
			//组装数据结构
			$designerRet = array(
				'designer_id'	=> $designerId,
				'name' 			=> $name,
				'tag' 			=> $tag,
				'head_portrait' => $headPortrait,
				'art' 			=> $artRet,
			);
			$counter++;
			$data[] = $designerRet;
		}
		//var_dump($data);
		return $this->renderPartial("list",["data" => $data,'pagination' => $pagination]);
	}

	//搜索设计师
	public function actionHunt(){
		$request = Yii::$app->request;
		if($request->isAjax){
			$searchKey = Yii::$app->request->get('search_key'); 
		}
		$designerM = new \frontend\models\DesignerBasic();
		$data = $designerM->findBySql("SELECT * FROM zy_designer_basic WHERE name LIKE '%". $searchKey . "%'");
		return $this->render('hunt',['data' => $data]);
	}
}
