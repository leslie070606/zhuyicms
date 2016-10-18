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
        <link rel="stylesheet" href="css/flash_c.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
                <script type="text/javascript" src="js/touch-0.2.14.min.js"></script>

        <script src="js/gloaba.js" async="async"></script>
    </head>
    <body>
     <div id="desib" class="desib_box">
            <div class="miaoshu">
                <span class="miaoshu_name"><?php echo $userInfo['nickname'] ?></span>
                <span><?=$renchen?>优雅浪漫，</span>
                <span>是古典美学的追随者，</span>
                <span>是精致生活的代言人，</span>
                <span><?=$renchen?>最喜爱的风格是——</span>
                <span class="text_big">法式古典风格</span>
            </div>
            <span class="logo iconfont icon-chusheng01"></span>
            <div class="desi_top"></div>
            <div class="desi_bottom"></div>
            <img class="des_img des_imga" src="img/flash_c/1.png" />
            <img class="des_img des_imga_a" src="img/flash_c/1.png" />
            <img class="des_img des_imgb" src="img/flash_c/2.png" />
            <img class="des_img des_imgb_a" src="img/flash_c/2.png" />
            <img id="getaa" class="des_img des_imgc des_imgcc" src="img/flash_c/3.png" />
            <img class="des_img des_imgd" src="img/flash_c/4.png" />
            <img class="des_img des_imge" src="img/flash_c/5.png" />
            <img class="des_img des_imgf" src="img/flash_c/6.png" />
            <img class="des_img des_imgg" src="img/flash_c/7.png" />
            <img class="des_img des_imgh" src="img/flash_c/8.png" />
            <img class="des_img des_imgi" src="img/flash_c/9.png" />
            <img class="des_img des_imgj" src="img/flash_c/10.png" />
            <img class="des_img des_imgk" src="img/flash_c/11.png" />
            <img class="des_img des_imgl" src="img/flash_c/12.png" />
            <div class="miaodian_mesng miaodiana_a">
                <div class="sanjiao_box">
                    <span class="iconfont maodian_icon icon-sibianxing"></span>

                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">法式古典风格</span>
                    你了解哥特的摩尔式线形，通晓巴洛克的多边曲面、复杂形象和精细雕花，也熟知洛可可自然、纤细与轻快。从中世纪和文艺复兴流传至今的美学里，你看到了欧洲中古世纪的精致生活。那些丰盈而饱满似雕塑的曲线以及色彩斑斓的形式令人迷恋，让平淡如水的生活生出了更多浪漫与热情。而繁复交织的色彩，微微闪光的金箔、流苏璀璨的水晶灯还有重重叠叠的天鹅绒也为日常的空间制造出精巧的梦幻感。在这个弥散着古典情怀的家中，所有装饰并非为了炫耀奢华，而是为了提醒你日常的精巧。
                </div>
            </div>


            <div class="miaodian_mesng miaodiana_b">
                <div class="sanjiao_box">
                    <span class="iconfont maodian_icon icon-sibianxing"></span>
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">法式家具</span>
                    在优雅浪漫的基调下，法式家具特点各异：巴洛克式宏壮华丽，洛可可式秀丽纤巧，新古典主义精美雅致，帝政式刚健雄伟。
                </div>
            </div>


            <div class="miaodian_mesng miaodiana_c">
                <div class="sanjiao_box">
                    <span class="iconfont maodian_icon icon-sibianxing"></span>
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">轴线对称布局</span>
                    贯穿法式古典风格的空间布局中常会突出轴线的对称，由此造成恢弘的气势，展现出古典主义秉持的对称美感。
                </div>
            </div>

            <div class="miaodian_mesng miaodiana_d">
                <div class="sanjiao_box">
                    <span class="iconfont maodian_icon icon-sibianxing"></span>
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">"中国风"</span>
                    带有中国风格的洛可可形式一度风行17世纪的法国，除了表现在家具装饰细部，也出现在绘有中国式风景、人物和花鸟的织物和墙壁上。
                </div>
            </div>

            <div class="miaodian_mesng miaodiana_e">
                <div class="sanjiao_box">
                    <span class="iconfont maodian_icon icon-sibianxing"></span>
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">水晶枝形吊灯</span>
                    结构繁复、晶莹璀璨的水晶枝形吊灯曾经是贵族阶层的象征，它能让一个空间在即刻间“华丽变身”，获得精巧的梦幻感。
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
                <div class="miaodian_text">
						<span class="text_title">异域情调的饰品</span>
						正有这些从世界各地收藏来的小物件才能为家中制造各种小惊喜，神秘的异域情调由此而生！
						<div class="text_img">
							<img src="img/fengge/chose_style.jpg"  />
							<img src="img/fengge/chose_style.jpg"  />
							<img src="img/fengge/chose_style.jpg"  />
						</div>					
					</div>
                <span class="share_btn">分享给你的小伙伴，看看谁跟你有一样的品味</span>
                <div class="cs_more"><a href="<?php echo Url::toRoute('/style/index'); ?>"><span class="more_a">再测一次</span></a><a href="<?php echo Url::toRoute('/style/chosestyle'); ?>"><span class="more_b">查看其它风格</span></a></div>
            </div>
        <?php } ?>
         <div class="gloab_bottm">
            <img class="erweima" src="img/ewm/3.png"  />
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


