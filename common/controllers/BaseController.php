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

}
