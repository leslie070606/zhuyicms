<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\util\emaysms\Sms;


/**
 * Site controller
 */
class TestController extends Controller
{
	function actionIndex(){
		echo '111';exit;
	}

	/**
	 * 测试发送短信
	 */
    function  actionSms() {

        //实例化短信接口
		$sms = Yii::$app->Sms;
        //参数1 手机号码数组(array(13810332009,13810332002,...))，参数2 短信内容(string)
        //13810332009,13051508180,15810649252
		$ret = $sms->send(array(13051508180),'北京住艺科技有限公司欢迎您：yf');
        //$ret 返回0 代表成功！,其他则有错误
        echo time();
        echo '<br>';
        print_r($ret);
        echo '<br>ok';exit;

    }

}

?>
