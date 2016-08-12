<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

class Token {

    public function getToken($force = false) {
        try {

            $para = array(
                "grant_type" => "client_credential",
                "appid" => "wx8f50ac309b04acf8",
                "secret" => "4b7a5de9ff3bc73162da7164a3585dcb"
            );

            $_checkToken = $this->_checkCacheToken($para);
            if ($_checkToken) {
                return $_checkToken;
            }

            //$url = Yii::app()->params['WX_API_URL'] . "token";
            $url = "https://api.weixin.qq.com/cgi-bin/" . "token";

            $ret = $this->doCurlGetRequest($url, $para);

            $retData = json_decode($ret, true);

            //如果成功不在返回errcode信息 直接返回access_token
            if (!$retData || isset($retData['errcode'])) {

                return false;
            }
            $token = $retData['access_token'];
            $expire = $retData['expires_in'];

            return $token;
        } catch (DB_Exception $e) {

            return false;
        }
    }

    //校验缓存TOKEN
    private function _checkCacheToken($para) {
        $fileCacheObj = new \yii\caching\FileCache();
        $_jsKey = 'zy_js_access_token';
        if ($fileCacheObj->exists($_jsKey)) {
            $_str = $fileCacheObj->get($_jsKey);
            $_tmpRes = explode(' ', $_str);
            $_t = time() - $_tmpRes['1'];
            if ($_t > 3600) {
                //重新获取
                $this->_getToken($para, $fileCacheObj, $_jsKey);
                $_tmpRes = explode(' ', $fileCacheObj->get($_jsKey));
                return $_tmpRes['0'];
            } else {
                return $_tmpRes['0'];
            }
        } else {
            $this->_getToken($para, $fileCacheObj, $_jsKey);
            $_tmpRes = explode(' ', $fileCacheObj->get($_jsKey));
            return $_tmpRes['0'];
        }
    }

    private function _getToken($para, $fileCacheObj, $key) {
        static $_num = 1;
        $url = "https://api.weixin.qq.com/cgi-bin/" . "token";
        $ret = $this->doCurlGetRequest($url, $para);
        $retData = json_decode($ret, true);
        //如果成功不在返回errcode信息 直接返回access_token
        if (!$retData || isset($retData['errcode'])) {
            ++$_num;
            if ($_num > 3) {
                return false;
            } else {
                $this->_getToken($para, $fileCacheObj, $key);
            }
        }
        $token = $retData['access_token'];
        $expire = $retData['expires_in'];
        $fileCacheObj->set($key, $token . ' ' . time());
        return;
    }

    // 获取jsapi_ticket
    public function getJspticket() {
        return $this->_checkCacheJsApiTicket();
        $accessToken = $this->getToken();
        $jsurl = "https://api.weixin.qq.com/cgi-bin/ticket/getticket";
        $para = array(
            'access_token' => $accessToken,
            'type' => 'jsapi'
        );
        $res = $this->doCurlGetRequest($jsurl, $para);
        $res = json_decode($res, TRUE);
        return $res['ticket'];
    }

    //检验JSAPI_TICKET
    private function _checkCacheJsApiTicket() {
        $fileCacheObj = new \yii\caching\FileCache();
        $_jsKey = 'zy_js_ticket';
        if ($fileCacheObj->exists($_jsKey)) {
            $_str = $fileCacheObj->get($_jsKey);
            $_tmpRes = explode(' ', $_str);
            $_t = time() - $_tmpRes['1'];
            if ($_t > 3600) {
                //重新获取
                $this->_getJspticket($_jsKey, $fileCacheObj);
                $_tmpRes = explode(' ', $fileCacheObj->get($_jsKey));
                return $_tmpRes['0'];
            } else {
                return $_tmpRes['0'];
            }
        } else {
            $this->_getJspticket($_jsKey, $fileCacheObj);
            $_tmpRes = explode(' ', $fileCacheObj->get($_jsKey));
            return $_tmpRes['0'];
        }
    }

    private function _getJspticket($key, $fileCacheObj) {
        $accessToken = $this->getToken();
        $jsurl = "https://api.weixin.qq.com/cgi-bin/ticket/getticket";
        $para = array(
            'access_token' => $accessToken,
            'type' => 'jsapi'
        );
        $res = $this->doCurlGetRequest($jsurl, $para);
        $res = json_decode($res, TRUE);
        $fileCacheObj->set($key, $res['ticket'] . ' ' . time());
        return $res['ticket'];
    }

    // 生成JS signature
    public function getSignature() {

        //签名字符串
        $noncestr = "zhuyi";
        $jsapi_ticket = $this->getJspticket();
        $timestamp = time();
        //$url = "http://localhost/zhuyicms/frontend/web/index.php?r=style/share";
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $str = "jsapi_ticket=" . $jsapi_ticket . "&noncestr=" . $noncestr . "&timestamp=" . $timestamp . "&url=" . $url;
        $signature = sha1($str);
        return array('signature' => $signature, 'timestamp' => $timestamp);
    }

    // 下载多媒体接口
    public function getImg($media_id) {
        if (!$media_id) {
            return false;
        }

        $url = 'http://file.api.weixin.qq.com/cgi-bin/media/get';

        $accessToken = $this->getToken();
        $para = array(
            'access_token' => $accessToken,
            'media_id' => $media_id
        );
        $res = $this->doCurlGetRequest($url, $para);
        return $res;
    }

    private function doCurlGetRequest($url, $data = array(), $timeout = 10) {
        if ($url == "" || $timeout <= 0) {
            return false;
        }
        if ($data != array()) {
            $url = $url . '?' . http_build_query($data);
        }

        $con = curl_init((string) $url);
        curl_setopt($con, CURLOPT_HEADER, false);
        curl_setopt($con, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($con, CURLOPT_TIMEOUT, (int) $timeout);

        // 访问https 需要设置
        curl_setopt($con, CURLOPT_SSL_VERIFYPEER, false); // 信任任何证书 
        curl_setopt($con, CURLOPT_SSL_VERIFYHOST, 0); // 检查证书中是否设置域名（为0也可以，就是连域名存在与否都不验证了）

        return curl_exec($con);
    }

}
