<?php

/*
 * 微信接入入口类
 * 
 * @author zhao peng<peng.zhao@condenast.com.cn> 2016.5.18
 */

namespace frontend\controllers;

use yii\web\Controller;

//use yii\helpers\Url; 会报错: php_pgsql.dll  Unable to load dynamic library

class WechatController extends Controller {

    public $enableCsrfValidation = false;

    public function actionIndex() {

        //echo strstr("IloveShanghai!","Shanghai");exit;
        //echo Url::to('@web/images/cartoon.jpg');exit;
        //限制报错
        error_reporting(E_ALL ^ E_NOTICE);

        if (false == $this->checkSignature()) {
            exit(0);
        }
        //获取echoStr 判断是接入还是用户输入
        $echostr = $_GET['echostr'];
        if ($echostr) {
            echo $echostr;
            exit(0);
        }
        $this->responseMsg();
    }

    public function actionToken() {

       
        $token = new \app\components\Token();
        $tokenstr = $token->getToken();
        echo $tokenstr;
        exit;
    }

    public function actionCreatemenu() {

        $menuData = array(
            'button' => array(
//                array(
//                    'type' => 'view',
//                    'name' => '往昔回顾',
//                    'url' => 'http://101.201.110.46/index.php?r=videocol/index'
//                ),
//                array(
//                    'type' => 'click',
//                    'name' => '图文消息',
//                    'key' => 'V1001_TODAY_SINGER'
//                ),
//                array(
//                    'name' => "看视频",
//                    'sub_button' => array(
//                        array(
//                            'type' => 'view',
//                            'name' => '龙猫之家',
//                            'url' => 'http://mp.weixin.qq.com/s?__biz=MzI1OTIxNjA2OA==&mid=100000030&idx=1&sn=c66f91d6fb3ae8ceb2c8caee6222670c#rd'
//                        ),
//                        array(
//                            'type' => 'view',
//                            'name' => '木之家',
//                            'url' => 'http://mp.weixin.qq.com/s?__biz=MzI1OTIxNjA2OA==&mid=100000154&idx=1&sn=e4d7c1316a57cf88467636488635304b#rd'
//                        ),
//                          array(
//                            'type' => 'view',
//                            'name' => '不转身之家',
//                            'url' => 'http://mp.weixin.qq.com/s?__biz=MzI1OTIxNjA2OA==&mid=100000318&idx=1&sn=78617f917f57a4f81dee7a8d6218c632#rd'
//                        ),
//                          array(
//                            'type' => 'view',
//                            'name' => '任意门之家',
//                            'url' => 'http://mp.weixin.qq.com/s?__biz=MzI1OTIxNjA2OA==&mid=100000488&idx=1&sn=781a0e4f95af84ffa8a9226be7690dbb#rd'
//                        ),
//                        array(
//                            'type' => 'view',
//                            'name' => '视频合集',
//                            'url' => 'http://itlm.kim/index.php?r=videocol/index'
//                        )
//                        
//                    )
//                ),
                array(
                    'type' => 'view',
                    'name' => '看视频',
                    'url' => 'http://itlm.kim/index.php?r=videocol/index'
                ),
                array(
                    'name' => "住艺",
                    'sub_button' => array(
                        array(
                            'type' => 'click',
                            'name' => '关于住艺',
                            'key' => 'zhuyi_gy'
                        ),
                        array(
                            'type' => 'click',
                            'name' => '设计咨询',
                            'key' => 'zhuyi_zx'
                        ),
                        array(
                            'type' => 'click',
                            'name' => '合作转载',
                            'key' => 'zhuyi_hz'
                        ),
                        array(
                            'type' => 'view',
                            'name' => '设计师报名',
                            'url' => 'http://form.mikecrm.com/Dlvnng'
                        ),
                        array(
                            'type' => 'view',
                            'name' => '加入我们',
                            'url' => 'http://mp.weixin.qq.com/s?__biz=MzI1OTIxNjA2OA==&mid=100000488&idx=2&sn=a74c70e75e22df2ada22991f71ea7db5#rd'
                        )
                    )
                ),
            )
        );
        $menuManager = new \app\components\MenuManager();
        $ret = $menuManager->create($menuData);
        if (false === $ret) {

            echo "create menu fail!\n";
        } else {

            echo "create menu success!\n";
            var_dump($ret);
        }
        exit;
    }

    public function actionGetmenu() {
        $menuManager = new \app\components\MenuManager();
        $ret = $menuManager->get();

        if (false === $ret) {

            echo "get menu fail!\n";
        } else {

            echo "<pre>";
            print_r($ret);
        }
    }

    public function actionDelmenu() {
        $menuManager = new \app\components\MenuManager();
        $ret = $menuManager->delete();

        if (false === $ret) {
            echo "delete menu fail!\n";
        } else {
            echo "delete menu success!\n";
        }
    }

    public function responseMsg() {
        //分析用户输入
        // 获取POST数据
        $PostData = $GLOBALS['HTTP_RAW_POST_DATA'];

        // 判断POST数据是否为空
        if (!$PostData) {
            echo "wrong input!";
            exit(0);
        }
        // 解析XML字符串
        $xmlObj = simplexml_load_string($PostData, 'simpleXMLElement', LIBXML_NOCDATA);
        if (!$xmlObj) {
            echo "wrong input!";
            exit(0);
        }
        //$result = $this->transmitText($xmlObj);
        $msgType = trim($xmlObj->MsgType);
        switch ($msgType) {
            case "event":
                $result = $this->receiveEvent($xmlObj);
                break;
            case "text":
                $result = $this->receiveText($xmlObj);
                break;
        }

        echo $result;
    }

    //接收文本消息
    private function receiveText($object) {
        $keyword = trim($object->Content);
//        //多客服人工回复模式
//        if (strstr($keyword, "请问在吗") || strstr($keyword, "在线客服")){
//            $result = $this->transmitService($object);
//            return $result;
//        }
        //自动回复模式
        if ($keyword == "住艺") {
            $content = array();
            $content[] = array("Title" => "住艺来了！很高兴认识你~ ", "Description" => "细数痛，是为了更快更好，解决痛，创造美。", "PicUrl" => "http://101.201.110.46/images/zhuyilogo2.jpg", "Url" => "http://mp.weixin.qq.com/s?__biz=MzI1OTIxNjA2OA==&mid=100000133&idx=1&sn=02f76c4f29b32ea4dfd442b83c2ddf06#rd");
        } else if ($keyword == "001") {
            $content = array();
            $content[] = array("Title" => "住艺改造家 | 她把宫崎骏的电影，做成了院子", "Description" => "", "PicUrl" => "http://101.201.110.46/images/gongqijun.jpg", "Url" => "http://mp.weixin.qq.com/s?__biz=MzI1OTIxNjA2OA==&mid=100000030&idx=1&sn=c66f91d6fb3ae8ceb2c8caee6222670c#rd");
            $content[] = array("Title" => "住艺来了 | 装修抱怨大会TOP20：这些痛，你有吗？", "Description" => "", "PicUrl" => "http://101.201.110.46/images/zhuyilogo.jpg", "Url" => "http://mp.weixin.qq.com/s?__biz=MzI1OTIxNjA2OA==&mid=100000030&idx=2&sn=3a0137f07a7b793eaf1bf5bfe15d6cca#rd");
        } else if ($keyword == '002') {
            $content = array();
            $content[] = array("Title" => "住艺改造家 | 他用1,000本书，造出隔而不断的家", "Description" => "", "PicUrl" => "http://101.201.110.46/images/002video.jpg", "Url" => "http://mp.weixin.qq.com/s?__biz=MzI1OTIxNjA2OA==&mid=100000154&idx=1&sn=e4d7c1316a57cf88467636488635304b#rd");
            $content[] = array("Title" => "住艺来了 | 装修抱怨大会TOP20：这些痛，你有吗？", "Description" => "", "PicUrl" => "http://101.201.110.46/images/zhuyilogo.jpg", "Url" => "http://mp.weixin.qq.com/s?__biz=MzI1OTIxNjA2OA==&mid=100000030&idx=2&sn=3a0137f07a7b793eaf1bf5bfe15d6cca#rd");
        } else if ($keyword == '视频') {

            $content = array();
            $content[] = array("Title" => "住艺改造家 | 她把宫崎骏的电影，做成了院子", "Description" => "", "PicUrl" => "http://101.201.110.46/images/gongqijun.jpg", "Url" => "http://mp.weixin.qq.com/s?__biz=MzI1OTIxNjA2OA==&mid=100000030&idx=1&sn=c66f91d6fb3ae8ceb2c8caee6222670c#rd");
            $content[] = array("Title" => "住艺来了 | 装修抱怨大会TOP20：这些痛，你有吗？", "Description" => "", "PicUrl" => "http://101.201.110.46/images/zhuyilogo.jpg", "Url" => "http://mp.weixin.qq.com/s?__biz=MzI1OTIxNjA2OA==&mid=100000030&idx=2&sn=3a0137f07a7b793eaf1bf5bfe15d6cca#rd");
        } else {
            $content = "Hi，谢谢你与我们互动/:,@-D 你的话我们已经收到啦，如果需要进一步帮助，不妨留下联系方式（微信号/电话/邮箱），我们会尽快与你联络！";
        }

        if (is_array($content)) {
            if (isset($content[0])) {
                $result = $this->transmitNews($object, $content);
            } else {
                $result = $this->transmitText($object, $content);
            }
        } else {
            $result = $this->transmitText($object, $content);
        }
        return $result;
    }

    //接收事件消息
    private function receiveEvent($xmlObj) {
        $content = "";
        switch ($xmlObj->Event) {
            case "subscribe": //关注事件
                $content = "Hi！认识你真好！准备好在住艺遇见更好的空间和更多精选设计师了吗？看改造视频、获取专业贴士、收实用清单，用设计改善家和生活，一起吧！回复“住艺”，了解我们；回复“视频”，看最新改造案例；喜欢的话，就将我们置顶吧！";
                break;
            case "unsubscribe": //取消关注事件
                $content = "";
                break;
            case "CLICK":
                switch ($xmlObj->EventKey) {
                    case "zhuyi_gy":
                        //$content = "点击菜单1";
                        $content = array();
                        $content[] = array("Title" => "住艺来了!很高兴认识你~", "Description" => "细数痛,是为了更快更好,解决痛,创造美.", "PicUrl" => "http://101.201.110.46/images/zhuyilogo2.jpg", "Url" => "http://mp.weixin.qq.com/s?__biz=MzI1OTIxNjA2OA==&mid=100000133&idx=1&sn=02f76c4f29b32ea4dfd442b83c2ddf06#rd");
                        break;
                    case "zhuyi_zx":
                        $content = "设计需求或咨询，请联络：\nvin Yang\n微信：kevinyang0229\n邮箱：kevin.yang@condenast.com.cn\n座机：010-59631694\n\n或\n\nXiaoqing Zhang\n微信：enjoylifeon\n邮箱：xiaoqing.zhang@condenast.com.cn\n座机：010-59631694";
                        break;
                    case "zhuyi_hz":
                        $content = "商务合作及内容转载，请联络：\nAthena Yu\n微信：Athena91\n邮箱：na.yu@condenast.com.cn\n座机：010-59631695";
                        break;
                    case "zhuyi_sjs":

                    default:
                        $content = "";
                        break;
                }
                break;
        }
        if (is_array($content)) {
            $result = $this->transmitNews($xmlObj, $content);
        } else {
            $result = $this->transmitText($xmlObj, $content);
        }
        //$result = $this->transmitText($xmlObj, $content);
        return $result;
    }

    private function transmitText($xmlObj, $contentMsg) {

        $fromUsername = $xmlObj->FromUserName;
        $toUsername = $xmlObj->ToUserName;
        //$contentMsg = trim($xmlObj->Content);
        $content = $contentMsg;
        $time = time();
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[%s]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    </xml>";
        $msgType = 'text';
        $result = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $content);
        return $result;
    }

    //回复图文消息
    private function transmitNews($object, $newsArray) {
        if (!is_array($newsArray)) {
            return "";
        }
        $itemTpl = "<item>
            <Title><![CDATA[%s]]></Title>
            <Description><![CDATA[%s]]></Description>
            <PicUrl><![CDATA[%s]]></PicUrl>
            <Url><![CDATA[%s]]></Url>
        </item>";
        $item_str = "";
        foreach ($newsArray as $item) {
            $item_str .= sprintf($itemTpl, $item['Title'], $item['Description'], $item['PicUrl'], $item['Url']);
        }
        $xmlTpl = "<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[news]]></MsgType>
            <ArticleCount>%s</ArticleCount>
            <Articles>$item_str</Articles></xml>";

        $result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time(), count($newsArray));
        return $result;
    }

    private function checkSignature() {

        //接收参数
        $signature = $_GET['signature'];
        $nonce = $_GET['nonce'];
        $timestamp = $_GET['timestamp'];
        //$tmpArr = array($nonce, $timestamp, Yii::app()->params['TOKEN']);
        $tmpArr = array($nonce, $timestamp, 'zhuyi');

        sort($tmpArr, SORT_STRING);

        //把数组中的元素合并成字符串
        $tmpStr = implode($tmpArr);
        //shal加密
        $tmpStr = sha1($tmpStr);
        //判断加密后的字符串是否和signature 相等
        if ($tmpStr == $signature) {
            //相等就返回true
            return true;
        }
        return false;
    }

}
