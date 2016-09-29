<?php

//引入DB操作类
require_once 'db.php';
require_once '../../../../common/util/CurlExt.php';

/**
 * 测试微信支付DEMO 操作类
 * @author 郝帅卫
 * @date 2016-09-28
 */
class IndexController extends Mysql {

    /**
     * 创建订单，生成本地订单号
     * @author 郝帅卫
     * @date 2016-09-28
     */
    public function createOrder() {
        if (!$_POST['money']) {
            echo json_encode(['code' => '101', 'rs' => '要支付的金额不能为空']);
            exit();
        }
        $_dataArr['id'] = $this->_createOrderNum();
        $_dataArr['createTime'] = date('Y-m-d H:i:s');
        $_dataArr['oMoney'] = $_POST['money'];
        $_dataArr['dMoney'] = 0;
        $_dataArr['nMoney'] = $_POST['money'];
        $_dataArr['payMoney'] = $_POST['money'];
        $_dataArr['payCode'] = '';
        $_dataArr['payTime'] = '';
        $_dataArr['oStatus'] = '1';
        $_dataArr['uId'] = 'hsw123456hsw';

        $_res = $this->insert('`order`', $_dataArr);
        if ($_res) {
            $_payRes = $this->pay($_dataArr['id'], $_dataArr['payMoney']);
            echo json_encode(['code' => '1', 'rs' => $_payRes]);
            exit();
        } else {
            echo json_encode(['code' => '102', 'rs' => '生成订单失败']);
            exit();
        }
    }

    /**
     * 产生订单号方法
     * @author 郝帅卫
     * @date 2016-09-28
     * @return string
     */
    private function _createOrderNum() {
        $_tmpTime = strval(date('YmdHis'));
        $_tmpIndex = 'ZY';
        $_tmpRndStr = strtoupper($this->getRandomString(7, 3));
        return $_tmpIndex . $_tmpTime . $_tmpRndStr;
    }

    /**
     * 微信创建虚拟订单-返回sign标识，用于客户端支付
     */
    public function pay($_oid, $_money) {
        $url = 'https://api.mch.weixin.qq.com/pay/unifiedorder';
        $callBackUrl = 'http://zhuyihome.com/free-pages/test-pay/pay.callback.php';

        $ip = $this->_getIp();
        $rndStr = strtoupper($this->getRandomString(32, '3'));
        $openid = 'o_hVBwW3HUP73tvyDzp0We8ycSuA';
        $payTitle = '住艺在线支付测试';
        $orderID = $_oid;
        $totalPrice = floatval($_money) * 100;

        $kD ['appid'] = 'wx36e36094bd446689';
        $kD ['attach'] = 'JSAPI';
        $kD ['body'] = $payTitle;
        $kD ['mch_id'] = '1337826601';
        $kD ['nonce_str'] = $rndStr;
        $kD ['notify_url'] = $callBackUrl;
        $kD ['openid'] = $openid;
        $kD ['out_trade_no'] = $orderID;
        $kD ['spbill_create_ip'] = $ip;
        $kD ['total_fee'] = $totalPrice;
        $kD ['trade_type'] = 'JSAPI';
        if ($_POST['qrcode']) {
            $kD ['trade_type'] = 'NATIVE';
        }
        ksort($kD);
        $strSignTmp = '';
        foreach ($kD as $kk => $vv) {
            $strSignTmp .= $kk . '=' . $vv . '&';
        }
        $strSignTmp .= 'key=lP9ZsPNtrIv2SNG9sWKmq3c3Zp6YnCEM';
        $sign = strtoupper(md5($strSignTmp));

        $strXml = "<xml>
				   <appid>{$kD['appid']}</appid>
				   <attach>JSAPI</attach>
				   <body>{$payTitle}</body>
				   <mch_id>{$kD['mch_id']}</mch_id>
				   <nonce_str>{$rndStr}</nonce_str>
				   <notify_url>{$callBackUrl}</notify_url>
				   <openid>{$openid}</openid>
				   <out_trade_no>{$orderID}</out_trade_no>
				   <spbill_create_ip>{$ip}</spbill_create_ip>
				   <total_fee>{$totalPrice}</total_fee>
				   <trade_type>{$kD ['trade_type']}</trade_type>
				   <sign>{$sign}</sign>
				</xml>";

        $res = \common\util\CurlExt::getHttpPostRes($strXml, $url);
        $res = json_decode(json_encode(simplexml_load_string($res, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        if($_POST['qrcode']){
            return $res;
        }
        $startResult = $this->_startJsApiSign($res);
        if ($startResult != false) {
            $res ['newSign'] = $startResult ['sign'];
            $res ['timestamp'] = $startResult ['timestamp'];
            $res ['newRndstr'] = $startResult ['rndstr'];

            //$res['str']=$startResult['str'];
        }
        return $res;
    }

    //客户端JSAPI发起支付的验证签名
    private function _startJsApiSign($res) {
        if ($res ['return_code'] == 'SUCCESS') {
            $rndStr = strtoupper($this->getRandomString(32, '3'));
            $arr = array('appId' => $res ['appid'], 'timeStamp' => time(), 'nonceStr' => $rndStr, 'package' => 'prepay_id=' . $res ['prepay_id'], 'signType' => 'MD5');
            ksort($arr);
            $str = '';
            foreach ($arr as $k => $v) {
                $str .= $k . '=' . $v . '&';
            }
            $str .= 'key=lP9ZsPNtrIv2SNG9sWKmq3c3Zp6YnCEM';
            //$res['str']=$str;
            $res ['sign'] = strtoupper(md5($str));
            $res ['timestamp'] = $arr ['timeStamp'];
            $res ['rndstr'] = $rndStr;
        } else {
            $res = false;
        }
        return $res;
    }

    /**
     * 
     * 支付成功回调
     * @author 郝帅卫
     * @date 2016-09-28
     */
    public function payCallBack($params) {
        $res = json_decode(json_encode(simplexml_load_string($params, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        $saveRes = null;
        if ($res ['return_code'] == 'SUCCESS') {
            $orderRes = $this->get_one('select * from `order` where id="' . $res ['out_trade_no'] . '"');
            if (empty($orderRes)) {
                
            } else {
                $orderRes ['payTime'] = date('Y-m-d H:i:s');
                $orderRes ['payCode'] = $res ['transaction_id'];
                if ($orderRes ['oStatus'] == '1') {
                    $orderRes ['oStatus'] = '2';
                    $saveRes = $this->update('order', $orderRes, 'id=' . $res ['out_trade_no']);
                }
            }
        } else {
            
        }
    }

    private function _getIp() {
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
            $ip = getenv("HTTP_CLIENT_IP");
        else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
            $ip = getenv("REMOTE_ADDR");
        else if (isset($_SERVER ['REMOTE_ADDR']) && $_SERVER ['REMOTE_ADDR'] && strcasecmp($_SERVER ['REMOTE_ADDR'], "unknown"))
            $ip = $_SERVER ['REMOTE_ADDR'];
        else
            $ip = "192.168.1.2";
        return ($ip);
    }

    private function getRandomString($len = 6, $type = '1') {
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

$obj = new IndexController();
$obj->createOrder();
