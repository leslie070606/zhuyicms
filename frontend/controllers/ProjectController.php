<?php

namespace frontend\controllers;

use common\util\emaysms\Sms;
use Yii;
use common\models\ZyProject;
use backend\models\DesignerWork;
use yii\web\UploadedFile;
use yii\helpers\Url;

class ProjectController extends \common\util\BaseController {

    public $layout = false;

    //题目页
    public function actionMatch_designer() {
        // 分享JS接口
        $tokenModel = new \app\components\Token();
        // 获取JS签名
        $jsarr = $tokenModel->getSignature();
        //判断跳转
        //初始化session
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        if ($user_id = $session->get('user_id')) {
            //获取用户信息
            $usermodel = new \common\models\ZyUser();
            $userInfo = $usermodel->findOne(['user_id' => $user_id]);

            $model = new ZyProject();
            $project = $model->findOne(['user_id' => $user_id]);
            
            //如果有需求就跳转到个人中心
            if ($project) {
                return $this->redirect(['order/list']);
            }
        } else {
            return $this->redirect(['user/login']);
        }


        if ($prostr = Yii::$app->request->get('g')) {
            // \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $proarr = explode("@", $prostr);

            $aera = explode('$', $proarr[2]);
            $model = new ZyProject();
            //$model->project_id = 2;
            $model->user_id = $user_id;
            $model->city = $proarr[0];
            $model->home_type = $proarr[1];
            $model->covered_area = $aera[0];
            $model->use_area = $aera[1];
            $model->work_time = $proarr[3];
            $model->project_num = $this->createProNum();
            $model->create_time = time();

            $fuwu = '';
            $yusuan = $proarr[5];
            //判断是设计还是设计+施工
            if ($proarr[4] == 'budget_design') {
                $model->service_type = '设计';
                $model->budget_design = $proarr[5];
                $fuwu = '设计';
            } else {
                $model->service_type = '设计和施工';
                $model->budget_design_work = $proarr[5];
                $fuwu = '设计和施工';
            }
            $model->designer_level = $proarr[6];
            $res = $model->save();
            if ($res) {
                //实例化短信接口
                //$sms = Yii::$app->Sms;
                $sms = new Sms();
                $ret = $sms->send(array('13521932827'), '【住艺】用户[ ' . $userInfo['phone'] . ' ]提交了新需求,需求单号[' . $model->attributes['project_num'] . '],所在地[' . $model->attributes['city'] . '],开工时间[' . $model->attributes['work_time'] . '],需要[' . $fuwu . '],预算[' . $yusuan . '万],请尽快登录后台处理.');
                
                //保存返回的ID
                $pid = $model->attributes['project_id'];
                //发送一条客服消息
                $messageModel = new \common\models\Message();
                $data = array('contents' => "用户 [".$user_id."] 提交了新需求", 'project_id'=>$pid);
                
                //$type 为0 代表需求
                $type = 0;
                $messageModel->createMessage($data, $type);
                //插入成功返回保存ID
                return $pid;
            }
        }

        return $this->render('match_designer', ['jsarr' => $jsarr]);
    }

    //需求附加信息
    //old代码 未启用
    public function actionAdditionalold() {

        //已添加的项目ID
        $project_id = Yii::$app->request->get('project_id');
        if (!$project_id) {
            //没有提交成功跳转返回
            return $this->redirect(['match_designer']);
        }
        $tokenModel = new \app\components\Token();

        if ($post = Yii::$app->request->post()) {
//            echo "<pre>";
//            print_r($post);exit;

            $model = new ZyProject();
            $project = $model->findOne($project_id);

            $project->compound = $post['compound'] ? $post['compound'] : '';
            $project->project_tags = $post['project_tags'] ? $post['project_tags'] : '';
            $project->description = $post['description'] ? $post['description'] : '';

            //家的照片
            if ($post['home']) {

                $accessToken = $tokenModel->getToken();

                //分割
                $postArr = explode('$', $post['home']);

                // 除去空数组
                $postArr = array_filter($postArr);

                $imgId = '';
                foreach ($postArr as $mid) {
                    $wd = new \app\components\WeixinDownloadImg();
                    $imgModel = new \common\models\ZyImages();
                    //上传图片
                    $uploadImgUrl = $wd->wxDownImg($mid, $accessToken);
                    if ($uploadImgUrl) {
                        $imgModel->url = $uploadImgUrl;
                        // print_r($imgModel->save());
                        if ($imgModel->save()) {
                            $imgId .= ',' . (string) $imgModel->attributes['image_id'];
                        } else {
                            return '';
                        }
                    }
                }

                if ($imgId) {

                    $project->home_img = $imgId;
                }
            }

            //喜欢的照片
            if ($post['like']) {

                $accessToken = $tokenModel->getToken();

                //分割
                $postArr = explode('$', $post['like']);

                // 除去空数组
                $postArr = array_filter($postArr);

                $imgId = '';
                foreach ($postArr as $mid) {
                    $wd = new \app\components\WeixinDownloadImg();
                    $imgModel = new \common\models\ZyImages();
                    //上传图片
                    $uploadImgUrl = $wd->wxDownImg($mid, $accessToken);
                    if ($uploadImgUrl) {
                        $imgModel->url = $uploadImgUrl;
                        // print_r($imgModel->save());
                        if ($imgModel->save()) {
                            $imgId .= ',' . (string) $imgModel->attributes['image_id'];
                        } else {
                            return '';
                        }
                    }
                }

                if ($imgId) {

                    $project->favorite_img = $imgId;
                }
            }

            $res = $project->save();

            if ($res) {
                return $this->redirect(array('project/choose_designer', 'project_id' => $project_id));
            }
        }
        // 获取JS签名
        return $this->render('additional', ['project_id' => $project_id]);
    }

    public function actionAdditional() {
        $this->layout = "editadditional"; //设置使用的布局文件
        //已添加的项目ID
        $project_id = Yii::$app->request->get('project_id');
        if (!$project_id) {
            //没有提交成功跳转返回
            return $this->redirect(['match_designer']);
        }

        $model = new ZyProject();

        if ($post = Yii::$app->request->post()) {

            $project = $model->findOne($project_id);

            //接收图片
//            $upfile = UploadedFile::getInstances($model, 'home_img');
//            $favoriteupfile = UploadedFile::getInstances($model, 'favorite_img');

            $project->compound = $post['compound'] ? $post['compound'] : '';
            $project->project_tags = $post['project_tags'] ? $post['project_tags'] : '';
            $project->description = $post['description'] ? $post['description'] : '';

//            $dir = Yii::getAlias("@frontend") . "/web/uploads/" . date("Ymd");
//
            $imgId = '';
            $imgId_favorite = '';

            //如果有图片 here_imga
            $upfile = Yii::$app->request->post('here_imga');
            $upfile = explode(',', $upfile);

            if (count($upfile) > 0) {
                foreach ($upfile as $imgobjct) {
                    if (empty($imgobjct)) {
                        
                    } else {
                        $imgModel = new \common\models\ZyImages();
                        $imgModel->url = $imgobjct;
                        if ($imgModel->save()) {
                            $imgId .= ',' . (string) $imgModel->attributes['image_id'];
                        } else {
                            continue;
                        }
                    }
                }
                $project->home_img = ltrim($imgId, ",");
            }


//            }
            //喜欢的照片
            //如果有图片 here_imgb
            $favoriteupfile = Yii::$app->request->post('here_imgb');
            $favoriteupfile = explode(',', $favoriteupfile);
            if (count($favoriteupfile) > 0) {
                foreach ($favoriteupfile as $imgobjct) {
                    if (empty($imgobjct)) {
                        
                    } else {
                        $imgModel = new \common\models\ZyImages();
                        $imgModel->url = $imgobjct;
                        if ($imgModel->save()) {
                            $imgId_favorite .= ',' . (string) $imgModel->attributes['image_id'];
                        } else {
                            continue;
                        }
                    }
                }

                $project->favorite_img = ltrim($imgId_favorite, ",");
            }
            $project->update_time = time();
            $res = $project->save();

            if ($res) {
                return $this->redirect(array('project/choose_designer', 'project_id' => $project_id));
            }
        }

        // 获取JS签名
        return $this->render('additional', ['project_id' => $project_id, 'model' => $model]);
    }

    //匹配设计师
    public function actionChoose_designer() {
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        // 分享JS接口
        $tokenModel = new \app\components\Token();
        // 获取JS签名
        $jsarr = $tokenModel->getSignature();
        $user_id = '';
        //判断是否有用户
        if ($user_id = $session->get('user_id')) {
            $model = new ZyProject();
            $project = $model->findOne(['user_id' => $user_id]);

            //如果未找到需求  重新提交
            if (count($project) <= 0) {
                return $this->redirect('match_designer');
            }
        } else {
            return $this->redirect(['user/login']);
        }

        $project_id = $project->project_id;
        $scoreArr = array(); //匹配设计师
        //判断是否有已匹配的设计师json 有就直接显示
        if ($project->match_json) {
            $scoreArr = json_decode($project->match_json, TRUE);
            //截取显示9个
            if (count($scoreArr) >= 9) {
                $scoreArr = array_slice($scoreArr, 0, 9);
            }
            
//            echo "<pre>";
//            print_r($scoreArr);exit;
        } else {
            //引入算法类
            $matchModel = new \app\components\Match();

            //全部设计师
            $designerModel = new DesignerWork();
            $designerArr = $designerModel->find()->all();

            //循环判断设计师
            for ($i = 0; $i < count($designerArr); $i++) {
                //完全不符合标准的设计师
                // 判断城市
                $tcity = false;
                if ($designerArr[$i]['service_city'] != '全国') {
                    $descity = explode(',', $designerArr[$i]['service_city']);
                    $tcity = in_array($project['city'], $descity);
                } else {
                    $tcity = TRUE;
                }

                //判断时间
                $usertime = time();
                switch ($project['work_time']) {

                    case "我想尽快开始":
                        $usertime = time();
                        break;
                    case "3个月以后":
                        $usertime = time() + 60 * 60 * 24 * 30 * 3;
                        break;
                    case "我不是很着急":
                        $usertime = time() + 60 * 60 * 24 * 365;
                        break;
                }
                // 判断时间是否允许
                $projecttime = TRUE;
                if ($designerArr[$i]['nowork_time'] < $usertime && $usertime < $designerArr[$i]['nowork_time2']) {
                    $projecttime = false;
                }

                if ($tcity && $projecttime) {
                    
                } else {

                    //跳出本次循环
                    continue;
                }
                
                //只匹配家装
                if($designerArr[$i]['customer'] == '公装（企业用户）'){
                    //跳出本次循环
                    continue;
                }

                $scoreArr[$i]['did'] = $designerArr[$i]['designer_id'];
                // $scoreArr[$i]['customer'] = $designerArr[$i]['customer'];
                
                // 计算分数
                $score = $matchModel->assigns($project, $designerArr[$i], $user_id);
                //匹配设计师计算分数
                $scoreArr[$i]['score'] = $score;

                if ($score < -200) {
                    $scoreArr[$i]['red'] = $score;
                }
            }

            //判断是否为空
            if (count($scoreArr) > 0) {

                //排序
                foreach ($scoreArr as $key => $value) {

                    $rating[$key] = $value['score'];
                }
                // 按照score降序排列
                array_multisort($rating, SORT_DESC, $scoreArr);

                //保存数据库
                $project->match_json = json_encode($scoreArr);
                $project->save();

                //截取显示9个
                if (count($scoreArr) >= 9) {
                    $scoreArr = array_slice($scoreArr, 0, 9);
                }

                //$scoreArr = array_merge($scoreArr,$scoreArr,$scoreArr,$scoreArr,$scoreArr,$scoreArr,$scoreArr);
            }
        }
        return $this->render('choose_designer', ['model' => $scoreArr, 'user_id' => $user_id, 'project_id' => $project_id, 'jsarr' => $jsarr]);
    }

    public function actionUpdateadditional() {

        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        if ($user_id = $session->get('user_id')) {
            
        } else {
            return $this->redirect(['user/login']);
        }

        $projectModel = new ZyProject();


        $model = $projectModel::findOne(['user_id' => $user_id]);

//        echo "<pre>";
//        print_r($model);exit;

        if ($model) {
            return $this->render('updateadditional', ['model' => $model]);
        } else {
            //没有数据
            return $this->render('updateadditional', ['model' => $model]);
        }
    }

    //个人中心编辑需求
    public function actionEditadditional() {
        $this->enableCsrfValidation = false; //关闭csrf验证
        $this->layout = "editadditional"; //设置使用的布局文件
//      echo Yii::$app->request->hostInfo;exit;
        $projectModel = new ZyProject();
        $project_id = Yii::$app->request->get('project_id');
        // 提交数据
        if ($post = Yii::$app->request->post()) {

            $model = $projectModel::findOne(['project_id' => $project_id]);
            $model->compound = $post['compound'] ? $post['compound'] : '';
            $model->project_tags = $post['project_tags'] ? $post['project_tags'] : '';
            $model->description = $post['description'] ? $post['description'] : '';

            $projectModel->load(Yii::$app->request->post());
            //接收图片
//            $upfile = UploadedFile::getInstances($projectModel, 'home_img');
//
//            $favoriteupfile = UploadedFile::getInstances($projectModel, 'favorite_img');
//            $dir = Yii::getAlias("@frontend") . "/web/uploads/" . date("Ymd");

            $imgId = '';
            $imgId_favorite = '';

            //如果有图片 here_imga
            $upfile = Yii::$app->request->post('here_imga');
            $upfile = explode(',', $upfile);

            if (count($upfile) > 0) {
                foreach ($upfile as $imgobjct) {
                    if (empty($imgobjct)) {
                        
                    } else {
                        $imgModel = new \common\models\ZyImages();
                        $imgModel->url = $imgobjct;
                        if ($imgModel->save()) {
                            $imgId .= ',' . (string) $imgModel->attributes['image_id'];
                        } else {
                            continue;
                        }
                    }
                }
                if ($model->home_img) {
                    $model->home_img = $model->home_img . $imgId;
                } else {
                    $model->home_img = ltrim($imgId, ",");
                }
            }


//            }
            //喜欢的照片
            //如果有图片 here_imgb
            $favoriteupfile = Yii::$app->request->post('here_imgb');
            $favoriteupfile = explode(',', $favoriteupfile);
            if (count($favoriteupfile) > 0) {
                foreach ($favoriteupfile as $imgobjct) {
                    if (empty($imgobjct)) {
                        
                    } else {
                        $imgModel = new \common\models\ZyImages();
                        $imgModel->url = $imgobjct;
                        if ($imgModel->save()) {
                            $imgId_favorite .= ',' . (string) $imgModel->attributes['image_id'];
                        } else {
                            continue;
                        }
                    }
                }

                if ($model->favorite_img) {
                    $model->favorite_img = $model->favorite_img . $imgId_favorite;
                } else {
                    $model->favorite_img = ltrim($imgId_favorite, ",");
                }
            }
            //如果有图片
//            if (count($upfile) > 0) {
//                if (!is_dir($dir))
//                    mkdir($dir, 0777, true);
//
//                foreach ($upfile as $imgobjct) {
//
//                    $fileName = date("HiiHsHis") . $this->getRandomString() . $imgobjct->baseName . "." . $imgobjct->extension;
//
//                    $dirimg = $dir . "/" . $fileName;
//
//                    //保存图片
//                    if ($imgobjct->saveAs($dirimg)) {
//                        $imgModel = new \common\models\ZyImages();
//                        $uploadSuccessPath = "/uploads/" . date("Ymd") . "/" . $fileName;
//
//                        $imgModel->url = $uploadSuccessPath;
//                        if ($imgModel->save()) {
//                            $imgId .= ',' . (string) $imgModel->attributes['image_id'];
//                        } else {
//                            return '';
//                        }
//                    }
//                }
//                if ($model->home_img) {
//                    $model->home_img = $model->home_img . $imgId;
//                } else {
//                    $model->home_img = ltrim($imgId, ",");
//                }
//            }
//
//            //喜欢的图片
//            if (count($favoriteupfile) > 0) {
//                if (!is_dir($dir))
//                    mkdir($dir, 0777, true);
//
//                foreach ($favoriteupfile as $imgobjct) {
//
//                    $fileName = date("HiiHsHis") . $this->getRandomString() . $imgobjct->baseName . "." . $imgobjct->extension;
//
//                    $dirimg = $dir . "/" . $fileName;
//
//                    //保存图片
//                    if ($imgobjct->saveAs($dirimg)) {
//                        $imgModel = new \common\models\ZyImages();
//                        $uploadSuccessPath = "/uploads/" . date("Ymd") . "/" . $fileName;
//
//                        $imgModel->url = $uploadSuccessPath;
//                        if ($imgModel->save()) {
//                            $imgId_favorite .= ',' . (string) $imgModel->attributes['image_id'];
//                        } else {
//                            return '';
//                        }
//                    }
//                }
//                if ($model->favorite_img) {
//                    $model->favorite_img = $model->favorite_img . $imgId_favorite;
//                } else {
//                    $model->favorite_img = ltrim($imgId_favorite, ",");
//                }
//            }


            //添加更新时间
            $model->update_time = time();
            //var_dump($model->save());
            if ($model->save()) {

                return $this->redirect(['order/list', 'tiaozhuanP' => 'xiuqiu']);
            }
        }
        //echo $this->createProNum();exit;

        $model = $projectModel::findOne(['project_id' => $project_id]);
        //$model = $projectModel::findOne(56);
        $imgurl = '';
        $initialPreview = '';

        //喜歡的圖片
        $favorite_imgurl = '';
        $favorite_initialPreview = '';

        //家的圖片讀取
        if ($model->home_img) {
            $imgstr = $model->home_img;
            $imgarr = explode(',', $imgstr);
            $imgarr = array_filter($imgarr);
            foreach ($imgarr as $imgid) {
                //查询图片
                $imgModel = new \common\models\ZyImages();
                $img = $imgModel->findOne($imgid);
                if ($img) {
                    $imgurl[] = Yii::$app->params['frontDomain'] . $img->url;

                    //设置删除
                    $initialPreview[] = array('url' => Url::toRoute('/project/homeimgdelete'), 'key' => $imgid . "$" . $project_id,'imgUrl'=>Yii::$app->params['frontDomain'] . $img->url);
                }
            }
        }

        //喜歡的圖片讀取
        if ($model->favorite_img) {
            $imgstr = $model->favorite_img;
            $imgarr = explode(',', $imgstr);
            $imgarr = array_filter($imgarr);
            foreach ($imgarr as $imgid) {
                //查询图片
                $imgModel = new \common\models\ZyImages();
                $img = $imgModel->findOne($imgid);
                if ($img) {
                    $favorite_imgurl[] = Yii::$app->params['frontDomain'] . $img->url;

                    //设置删除
                    $favorite_initialPreview[] = array('url' => Url::toRoute('/project/favoriteimgdelete'), 'key' => $imgid . "$" . $project_id,'imgUrl'=>Yii::$app->params['frontDomain'] . $img->url);
                }
            }
        }

        return $this->render('editadditional', ['model' => $model, 'imgurl' => $imgurl, 'initialPreview' => $initialPreview, 'favorite_imgurl' => $favorite_imgurl, 'favorite_initialPreview' => $favorite_initialPreview]);
    }

    //删除家的照片
    public function actionHomeimgdelete() {
        if ($imgid = Yii::$app->request->post('key')) {
            $imgModel = new \common\models\ZyImages();

            $idarr = explode('$', $imgid);
            //删除 图片表
            $model = $imgModel->findOne($idarr[0]);
            $model->delete();

            // $artmodel = new ZyArtsets();
            $proModel = new ZyProject();
            $proModel = $proModel->findOne($idarr[1]);

            if ($proModel->home_img) {
                $imgarr = explode(',', $proModel->home_img);
                for ($i = 0; $i < count($imgarr); $i++) {
                    if ($imgarr[$i] == $idarr[0]) {
                        unset($imgarr[$i]);
                    }
                }

                $proModel->home_img = implode(",", $imgarr);
            }
            //$proModel->home_img = str_replace($idarr[0], '', $artmodel->home_img);

            $proModel->save();
        }
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ['success' => true];
    }

    //删除喜欢的照片
    public function actionFavoriteimgdelete() {
        if ($imgid = Yii::$app->request->post('key')) {
            $imgModel = new \common\models\ZyImages();

            $idarr = explode('$', $imgid);
            //删除 图片表
            $model = $imgModel->findOne($idarr[0]);
            $model->delete();

            // $artmodel = new ZyArtsets();
            $proModel = new ZyProject();
            $proModel = $proModel->findOne($idarr[1]);

            if ($proModel->favorite_img) {
                $imgarr = explode(',', $proModel->favorite_img);
                for ($i = 0; $i < count($imgarr); $i++) {
                    if ($imgarr[$i] == $idarr[0]) {
                        unset($imgarr[$i]);
                    }
                }

                $proModel->favorite_img = implode(",", $imgarr);
            }
            //$proModel->home_img = str_replace($idarr[0], '', $artmodel->home_img);

            $proModel->save();
        }
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ['success' => true];
    }

    public function createProNum() {
        $arr = range(1, 10);

        shuffle($arr);
        $phonestr = '';
        foreach ($arr as $values) {
            $phonestr = $phonestr . $values;
        }
        $phonestr = substr($phonestr, 3, 4);
        $phonestr = substr(time(), -2) . $phonestr;
        return $phonestr;
    }

    /**
     *  
     * 获取随机字符串 
     * @param int $len 
     * @param string $type 1数字 2字符 3数字+字符 默认1 
     */
    public function getRandomString($len = 6, $type = '1') {
        if ($type == '1') {
            $str = '0123456789';
        } elseif ($type == '2') {
            $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxzy';
        } elseif ($type == '3') {
            $str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxzy';
        }
        $n = $len;
        $len = strlen($str) - 1;
        $s = '';
        for ($i = 0; $i < $n; $i ++) {
            $s .= $str [rand(0, $len)];
        }
        return $s;
    }

}
