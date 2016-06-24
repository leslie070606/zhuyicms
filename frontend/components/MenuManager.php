<?php
namespace app\components;
class MenuManager {

    public function reqMenu($interface, $data, $actionStr = '') {

        $ctoken_model = new Token();
        $tokenstr = $ctoken_model->getToken();
        
        $retry = 3; //循环访问三次
        
        while ($retry) {
            $retry --;
            if (false === $tokenstr) {
                //interface_log(DEBUG, EC_OTHER, "get token error!");
                return false;
            }

            $url = "https://api.weixin.qq.com/cgi-bin/" . "$interface?access_token=" . $tokenstr;

            $ret = $this->doCurlPostRequest($url, json_encode($data, JSON_UNESCAPED_UNICODE));

            $retData = json_decode($ret, true);
          
        }
        
        return $retData;
        
    }

    public  function create($data) {

        $ret = $this->reqMenu("menu/create", $data);
        if (false === $ret) {
            return false;
        }
        return $ret;
    }

    public  function get() {
        $ret = $this->reqMenu("menu/get", array(), 'get');
        if (false === $ret) {
            return false;
        }
        return $ret;
    }

    public function delete() {
        $ret = $this->reqMenu("menu/delete", array());
        if (false === $ret) {
            return false;
        }
        return $ret;
    }

    private function doCurlPostRequest($url, $requestString, $timeout = 5) {
        if ($url == "" || $requestString == "" || $timeout <= 0) {
            return false;
        }

        $con = curl_init((string) $url);
        curl_setopt($con, CURLOPT_HEADER, false);
        curl_setopt($con, CURLOPT_POSTFIELDS, $requestString);
        curl_setopt($con, CURLOPT_POST, true);
        curl_setopt($con, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($con, CURLOPT_TIMEOUT, (int) $timeout);

        // 访问https 需要设置
        curl_setopt($con, CURLOPT_SSL_VERIFYPEER, false); // 信任任何证书 
        curl_setopt($con, CURLOPT_SSL_VERIFYHOST, 0); // 检查证书中是否设置域名（为0也可以，就是连域名存在与否都不验证了）
        return curl_exec($con);
    }

}
