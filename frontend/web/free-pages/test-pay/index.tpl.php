<html>
    <head>
        <title>微信支付DEMO，测试</title>
        <meta charset="utf-8">
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=9" />
    </head>
    <body>
        <input type="text" value="" placeholder="请输入要支付的金额" id="moneyId">
        <button id="clickPay">点击支付</button>
        <button id="clickQrCodePay">点击产生扫码支付</button>
        <img src="" id="imgUrlId"/>
    </body>
    <script src="jquery-1.11.3.js"></script>
    <script type="text/javascript">
        var imgUrl = 'http://paysdk.weixin.qq.com/example/qrcode.php?data=';
        var _d = '';
        $('#clickPay').click(function(){
            $.post('index.controller.php','qrcode=0&money='+$('#moneyId').val(),function(data){
               console.log(data); 
               _d = eval('('+data+')');
               if(_d.code=='1'){
                   onBridgeReady();
               }
            });
        });
        $('#clickQrCodePay').click(function(){
            $.post('index.controller.php','qrcode=1&money='+$('#moneyId').val(),function(data){
               _d = eval('('+data+')');
               if(_d.code=='1'){
                   $('#imgUrlId').attr('src',imgUrl+_d.rs.code_url);
               }
            });
        });
        function onBridgeReady() {
            WeixinJSBridge.invoke(
                    'getBrandWCPayRequest', {
                        "appId": _d.rs.appid, //公众号名称，由商户传入     
                        "timeStamp": _d.rs.timestamp, //时间戳，自1970年以来的秒数     
                        "nonceStr": _d.rs.nonce_str, //随机串     
                        "package": "prepay_id="+_d.rs.prepay_id,
                        "signType": "MD5", //微信签名方式:     
                        "paySign": _d.rs.newSign //微信签名 
                    },
                    function (res) {
                        // 使用以下方式判断前端返回,微信团队郑重提示：res.err_msg将在用户支付成功后返回    ok，但并不保证它绝对可靠。
                        if (res.err_msg == "get_brand_wcpay_request:ok") {
                            alert('支付成功，请等待客服联系');
                            WeixinJSBridge.invoke('closeWindow', {}, function (res) {});
                        } else {
                            alert('支付失败，请重新进行操作');
                            window.location.href = "?tpl=v1.index";
                            //WeixinJSBridge.invoke('closeWindow', {}, function(res){});
                        }
                    }
            );
        }
    </script>
</html>