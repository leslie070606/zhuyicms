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
                "appid" => "wx1344a7a9fac82094",
                "secret" => "9243c0f51650717abdca06178461c137"
            );

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
