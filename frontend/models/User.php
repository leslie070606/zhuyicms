<?php

namespace frontend\models;

use yii;

class User extends \common\models\ZyUser {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [];
    }

    public function loginByCookie() {
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
