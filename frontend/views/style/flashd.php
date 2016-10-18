<?php
use yii\helpers\Url;
if (isset($frindf) && !empty($frindf)) {
    $renchen = '他';
}else{
    $renchen = '你';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>风格结果</title>
                <link rel="stylesheet" href="http://at.alicdn.com/t/font_1476711409_6625533.css" />

        <link rel="stylesheet" href="css/jg.css" />
        <link rel="stylesheet" href="css/flash_d.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
                <script type="text/javascript" src="js/touch-0.2.14.min.js"></script>

        <script src="js/gloaba.js" async="async"></script>
    </head>
    <body>
         <div id="desib" class="desib_box">
            <div class="miaoshu">
                <span class="miaoshu_name"><?php echo $userInfo['nickname'] ?></span>
                <span><?=$renchen?>酷感十足，</span>
                <span>是机械时代的迷恋者，</span>
                <span>是拒绝平庸的摇滚先锋，</span>
                <span><?=$renchen?>最喜爱的风格是——</span>
                <span class="text_big">工业风格</span>
            </div>
            <span class="logo iconfont icon-chusheng01"></span>
            <div class="desi_top"></div>
            <div class="desi_bottom"></div>
            <img class="des_img des_imga" src="img/flash_d/1.png" />
            <img class="des_img des_imgaa" src="img/flash_d/1.png" />
            <img class="des_img des_imgb" src="img/flash_d/2.png" />
            <img class="des_img des_imgc" src="img/flash_d/3.png" />
            <img class="des_img des_imgd" src="img/flash_d/4.png" />
            <img class="des_img des_imge" src="img/flash_d/5.png" />
            <img class="des_img des_imgf" src="img/flash_d/6.png" />
            <img class="des_img des_imgg" src="img/flash_d/7.png" />
            <img class="des_img des_imgh" src="img/flash_d/8.png" />
            <img class="des_img des_imgi" src="img/flash_d/9.png" />
            <img class="des_img des_imgj" src="img/flash_d/10.png" />
            <img class="des_img des_imgk" src="img/flash_d/11.png" />
            <img class="des_img des_imgl" src="img/flash_d/12.png" />
            <img class="des_img des_imgm" src="img/flash_d/13.png" />
            <img class="des_img des_imgq" src="img/flash_d/14.png" />
            <img class="des_img des_imgx" src="img/flash_d/15.png" />
            <img class="des_img des_imgx des_imgxx" src="img/flash_d/15.png" />
            <img class="des_img des_imgw" src="img/flash_d/16.png" />
            <div class="miaodian_mesng miaodiana_a">
                <div class="sanjiao_box">
                    <img class="maodian_icon" src="img/fengge/2.gif"  />

                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">工业风格/工业重金属派</span>
                   从柯布西埃的扶手椅上，你看到了“机器美学”；在包豪斯设计学院里，你发现了工业化的前卫。当原始质感的清水混凝土、冰冷闪光的金属钢管、大胆裸露的管线、颇具摇滚范儿的铆钉装饰连同古旧的防风灯在空间中塑造出了粗砺的Loft风格，特立独行的工业灵魂于是呼之欲出——这才符合拒绝平庸的你对家的想象。在这里，组线条的轮廓和浑厚的质地才会让你更放松，如此的“不精致”恰好成就了你的不落窠臼。
                </div>
            </div>


            <div class="miaodian_mesng miaodiana_b">
                <div class="sanjiao_box">
                    <img class="maodian_icon" src="img/fengge/2.gif"  />
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">裸砖墙</span>
                    自然粗野的裸砖常用于室外，但在工业风格中，设计师常把这一元素运用到室内，沧桑、不羁却十足摩登。
                </div>
            </div>


            <div class="miaodian_mesng miaodiana_c">
                <div class="sanjiao_box">
                    <img class="maodian_icon" src="img/fengge/2.gif"  />
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">清水混凝土</span>
                    无论是用于屋顶、墙面还是地面，清水混凝土是打造工业风时常用的材料，朴素冷寂的面貌为空间创造了静谧感。
                </div>
            </div>

            <div class="miaodian_mesng miaodiana_d">
                <div class="sanjiao_box">
                    <img class="maodian_icon" src="img/fengge/2.gif"  />
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">复古灯</span>
                    要有工业范儿，就要学会巧妙运用复古或极简造型的灯具，它们会是空间里必不可少的装饰元素。
                </div>
            </div>

            <div class="miaodian_mesng miaodiana_e">
                <div class="sanjiao_box">
                    <img class="maodian_icon" src="img/fengge/2.gif"  />
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">金属元素</span>
                    没有金属元素，便不成其“工业风格”。金属持久耐用、粗旷坚韧却又酷感十足，可被用于门窗、家具甚至配饰上。
                </div>
            </div>

            <div class="miaodian_mesng miaodiana_f">
                <div class="sanjiao_box">
                    <img class="maodian_icon" src="img/fengge/2.gif"  />
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">皮质家具</span>
                    具有年代感的皮质家具，如果还带点Vintage的气息，那它们简直就是工业风拥趸者用来装饰自家空间的最爱。
                </div>
            </div>
        </div>
        <?php
        if (isset($frindf) && !empty($frindf)) {
            
            ?>
            <div class="share_box share_box_b share_box_active">
                <a href="<?php echo Url::toRoute(['/style/index','link_id'=>$link_id]);?>"><span class="share_btn">开始自己的风格测试</span></a>
            </div>

        <?php } else { ?>
            <div class="share_box share_box_active">
                <div class="miaodian_mesng meng_top btn_miaodian">
					
					<div class="miaodian_text">
						<span class="text_title">异域情调的饰品</span>
						正有这些从世界各地收藏来的小物件才能为家中制造各种小惊喜，神秘的异域情调由此而生！
						<div class="text_img">
							<img src="img/fengge/chose_style.jpg"  />
							<img src="img/fengge/chose_style.jpg"  />
							<img src="img/fengge/chose_style.jpg"  />
						</div>					
					</div>
					<div class="sanjiao_box">
						<div class="sanjiao"></div>
					</div>
			</div>
                <span class="share_btn  click_m">分享给你的小伙伴，看看谁跟你有一样的品味</span>
                <div class="cs_more"><a href="<?php echo Url::toRoute('/style/index'); ?>"><span class="more_a">再测一次</span></a><a href="<?php echo Url::toRoute('/style/chosestyle'); ?>"><span class="more_b">查看其它风格</span></a></div>
            </div>
        <?php } ?>
         <div class="gloab_bottm">
            <img class="erweima" src="img/ewm/4.png"  />
            <div class="bottm_mesg">想观看和你风格类似的住艺家吗？<br>请扫描上方二维码进入我们的公众号</div>

            <span class="by_ad iconfont icon-logo01"></span>
        </div>
    </body>
</html>
<?php
//var_dump($mystyle['style']);exit;
$sharelogo = '';
switch ($mystyle['style']){
case '波西米亚':
    $sharelogo = '/img/fenggejieguo/boximiya.png';
    break;
case '中古':
    $sharelogo = '/img/fenggejieguo/zhonggu.png';
    break;
case '法式古典':
    $sharelogo = '/img/fenggejieguo/fashigudian.png';
    break;
case '工业':
    $sharelogo = '/img/fenggejieguo/gongye.png';
    break;
case '美式':
    $sharelogo = '/img/fenggejieguo/meishi.png';
    break;
case '和式':
    $sharelogo = '/img/fenggejieguo/heshi.png';
    break;
case '现代简约':
    $sharelogo = '/img/fenggejieguo/xiandaijianyue.png';
    break;
case '新中式':
    $sharelogo = '/img/fenggejieguo/xinzhongshi.png';
    break;
default :
    $sharelogo = '/img/fenggejieguo/xinzhongshi.png';
        
}
?>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

<script type="text/javascript">

    wx.config({
        debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: 'wx8f50ac309b04acf8', // 必填，公众号的唯一标识
        timestamp: <?= $jsarr['timestamp'] ?>, // 必填，生成签名的时间戳
        nonceStr: 'zhuyi', // 必填，生成签名的随机串
        signature: "<?= $jsarr['signature'] ?>", // 必填，签名，见附录1
        jsApiList: ['onMenuShareAppMessage', 'onMenuShareTimeline', 'checkJsApi', 'chooseImage', 'uploadImage', 'downloadImage'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });
    //定义images用来保存选择的本地图片ID，和上传后的服务器图片ID

    wx.ready(function () {

        wx.checkJsApi({
            jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage', 'checkJsApi', 'chooseImage', 'uploadImage', 'downloadImage'], // 需要检测的JS接口列表，所有JS接口列表见附录2,
            success: function (res) {
                // 以键值对的形式返回，可用的api值true，不可用为false
                // 如：{"checkResult":{"chooseImage":true},"errMsg":"checkJsApi:ok"}
            }
        });

        //分享给朋友
        wx.onMenuShareAppMessage({
            title: '这个测试说我很<?=$mystyle['style']?>', // 分享标题
            desc: '在某种意义上,「家」就等于你,可是你真的懂自己?1分钟完成这14道测试题,找到最适合 你的家居风格。', // 分享描述
            link: "<?php echo Yii::$app->params['frontDomain']; ?>" + '/index.php?r=style/report&link_id=' + "<?= $link_id ?>", // 分享链接

            imgUrl: "<?php echo Yii::$app->params['frontDomain'] ?>" + '<?=$sharelogo ?>', // 分享图标
            type: '', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () {
                // 用户确认分享后执行的回调函数
                alert('已分享!');
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            },
            fail: function (res) {
                alert(JSON.stringify(res));
            }
        });

        //分享到朋友圈
        wx.onMenuShareTimeline({
            title: '这个测试说我的品位很<?=$mystyle['style']?>...1分钟14道题,看看你对「家」的态度', // 分享标题
            link: "<?php echo Yii::$app->params['frontDomain']; ?>" + '/index.php?r=style/report&link_id=' + "<?= $link_id ?>", // 分享链接

            imgUrl: "<?php echo Yii::$app->params['frontDomain'] ?>" + '<?=$sharelogo ?>', // 分享图标

            success: function () {
                // 用户确认分享后执行的回调函数
                alert('分享成功!');
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            },
            fail: function (res) {
                alert(JSON.stringify(res));
            }
        });

    });
</script>

