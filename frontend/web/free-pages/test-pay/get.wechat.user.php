<?php

require_once '../../../../common/util/CurlExt.php';
define('APPID', 'wx36e36094bd446689');
define('APPSECRET', '1d8f874eda186deee2c8a81b577fe094');

class WechatCallback {

    private $_req = null;
    private $_error = null;
    private $_resouce = null;

    public function WechatCallback() {
        $this->_req = $_REQUEST;
    }

    public function check() {
        if (!isset($this->_req ['code'])) {
            $this->_error = '回调CODE出现错误';
            $this->error();
        }
    }
    //网页授权获取用户OPENID
    //https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx36e36094bd446689&redirect_uri=http%3A%2F%2Fzhuyihome.com%2Ffree-pages%2Ftest-pay%2Fget.wechat.user.php&response_type=code&scope=snsapi_base&state=1#wechat_redirect
    public function run() {
        $this->check();
        $param = '?appid=' . APPID . '&secret=' . APPSECRET . '&code=' . $this->_req ['code'] . '&grant_type=authorization_code';
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token' . $param;
        $res = \common\util\CurlExt::getHttpRes($url);
        $this->_resouce = json_decode($res, true);
        if (isset($this->_resouce ['errcode']) && $this->_resouce ['errcode'] == '40029') {
            $res = \common\util\CurlExt::getHttpRes($url);
            $this->_resouce = json_decode($res, true);
            if (isset($this->_resouce ['errcode']) && $this->_resouce ['errcode'] == '40029') {
                $this->_error = '微信服务器异常，请稍后重试！';
                $this->error();
            }
        }
        $this->login();
    }

    public function login() {
        echo $this->_resouce ['openid'];
        exit;
        Run::set_login_user($this->_resouce ['openid']);
        $this->href();
    }

    public function href() {
        if (is_array($this->_resouce)) {
            exit();
        } else {
            $this->_error = '获取用户资料错误';
            $this->error();
        }
    }

    public function error() {
        echo $this->_error;
        exit();
    }

}

$obj = new WechatCallback ();
$obj->run();
