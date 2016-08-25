<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\controllers;

use Yii;
use \yii\helpers\Url;
use yii\web\Controller;

class BaseController extends Controller {

    protected function sendRes($success = true, $msg = '', $data = '', $code = '') {
        $arr['success'] = $success;
        $arr['code'] = $code;
        $arr['msg'] = $msg;
        $arr['data'] = $data;

        header('Content-type: application/json; charset=UTF-8');

        echo json_encode($arr);
        exit;
    }

    public static function checkLoginCookie() {
        $remCookie = Yii::$app->request->cookies->get('zuyiuser_remeber');
        if ($remCookie) {
            list($userid, $time) = explode('#', base64_decode($remCookie));
            if ($time > time()) {
                $session = Yii::$app->session;
                if (!$session->isActive) {
                    $session->open();
                }
                $session->set('user_id', $userid);

                //存入cookie
                $timenew = time() + 60 * 60 * 24 * 7 * 30; //记录一个月
                $cookie = new \yii\web\Cookie();
                $cookie->name = 'zuyiuser_remeber';
                $cookie->expire = $timenew;
                $cookie->httpOnly = true;
                $cookie->value = base64_encode($userid . '#' . $timenew);
                Yii::$app->response->getCookies()->add($cookie);

                return $userid;
            }
        }
        return false;
    }

    /**
     *  @author HaoShuaiwei
     * 获取随机字符串 
     * @param int $len 
     * @param string $type 1数字 2字符 3数字+字符 默认1 
     */
    public static function getRandomString($len = 6, $type = '1') {
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
    
    /**
      把用户输入的文本转义（主要针对特殊符号和emoji表情）
     */
    public function userTextEncode($str) {
        if (!is_string($str))
            return $str;
        if (!$str || $str == 'undefined')
            return '';

        $text = json_encode($str); //暴露出unicode
        $text = preg_replace_callback("/(\\\u[ed][0-9a-f]{3})/i", function($str) {
            return addslashes($str[0]);
        }, $text); //将emoji的unicode留下，其他不动，这里的正则比原答案增加了d，因为我发现我很多emoji实际上是\ud开头的，反而暂时没发现有\ue开头。
        return json_decode($text);
    }

    /**
      解码上面的转义
     */
    public function userTextDecode($str) {
        $text = json_encode($str); //暴露出unicode
        $text = preg_replace_callback('/\\\\\\\\/i', function($str) {
            return '\\';
        }, $text); //将两条斜杠变成一条，其他不动
        return json_decode($text);
    }

}
