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
        <link rel="stylesheet" href="http://at.alicdn.com/t/font_1476852969_6403563.css" />       
        <link rel="stylesheet" href="css/jg.css" />
        <link rel="stylesheet" href="css/flash_f.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
                <script type="text/javascript" src="js/touch-0.2.14.min.js"></script>

        <script src="js/gloaba.js" async="async"></script>
    </head>
    <body>
       <div id="desib" class="desib_box">
            <div class="miaoshu">
                <span class="miaoshu_name"><?php echo $userInfo['nickname'] ?></span>
                <span><?=$renchen?>自在朴素，</span>
                <span>是侘寂美学的敬仰者，</span>
                <span>是禅意生活的实践家，</span>
                <span><?=$renchen?>最喜爱的风格是——</span>
                <span class="text_big">
                    <span>和式风格</span>
                
                <div class="miaodian_mesng miaodiana_a">
                <div class="sanjiao_box">
                   <div class="maodian_flash maodian_icon"><div class="md_flash_center"></div><div class="md_flash_big"></div></div>

                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">和式风格</span>
                    榻榻米并非和式风格的标配，茶席也未必是生活日常中的必须。最核心的是，你像柳宗理一样认为“美是有用的”，并且在意生活中的那一丝微妙禅意。一盏光线柔和的和纸灯，井井有条的收纳，留空落白的朴素墙面——生活在这样的空间中，让人无需“断舍离”也有Wabi-sabi的自在心情。对不加修饰地体现材料肌理和木材本色的热爱，对以牺牲区域分割为代价的敞开式空间与模数化家具系列的情有独钟……不经意间，纯粹而又朴素的的日式生活美学已经渗透到你生活的每一个细节。
                </div>
            </div>
                </span>
            </div>
            <span class="logo iconfont icon-chusheng01"></span>
             <span class="logoaa iconfont icon-jm01"></span>
            
            <div class="desi_top"></div>
            <div class="desi_bottom"></div>
            <img id="des_imga" class="des_img des_imga" src="img/flash_f/1.png" />
            <img class="des_img des_imgb" src="img/flash_f/2.png" />
            <img class="des_img des_imgc des_imgcb" src="img/flash_f/3.png" />
            <img class="des_img des_imgc des_imgca" src="img/flash_f/3.png" />
            <img class="des_img des_imgd" src="img/flash_f/4.png" />
            <img class="des_img des_imge" src="img/flash_f/5.png" />
            <img class="des_img des_imgf" src="img/flash_f/6.png" />
            <img class="des_img des_imgg" src="img/flash_f/7.png" />
            <img class="des_img des_imgh" src="img/flash_f/8.png" />
            <img class="des_img des_imgi" src="img/flash_f/9.png" />
            


            <div class="miaodian_mesng miaodiana_b">
                <div class="sanjiao_box">
                    <div class="maodian_flash maodian_icon"><div class="md_flash_center"></div><div class="md_flash_big"></div></div>
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">和纸灯具</span>
                    让柔和的光线透过有着纤维纹路的手工和纸——要打造和式风格，应用和纸灯具应该是最直接、最有效的手段了。
                </div>
            </div>


            <div class="miaodian_mesng miaodiana_c">
                <div class="sanjiao_box">
                   <div class="maodian_flash maodian_icon"><div class="md_flash_center"></div><div class="md_flash_big"></div></div>
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">田字格收纳</span>
                    田字格收纳系统是和式风格中的“招牌元素”，它的清晰线条和通透结构不仅与日系美学一脉相承，更具备强大的实用功能性。
                </div>
            </div>

            <div class="miaodian_mesng miaodiana_d">
                <div class="sanjiao_box">
                   <div class="maodian_flash maodian_icon"><div class="md_flash_center"></div><div class="md_flash_big"></div></div>
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">原木或米色主调</span>
                    “和风”洋溢的空间色彩偏重原木色以及竹、藤、麻等天然材料的颜色，形成朴素的自然风格。墙壁亦多粉刷成米色。
                </div>
            </div>

            <div class="miaodian_mesng miaodiana_e">
                <div class="sanjiao_box">
                   <div class="maodian_flash maodian_icon"><div class="md_flash_center"></div><div class="md_flash_big"></div></div>
                    <div class="sanjiao"></div>
                    <div class="click_m"></div>
                </div>
                <div class="miaodian_text">
                    <span class="text_title">现代西洋家具</span>
                    和式风格也吸收了西方建筑特点，形成“和洋并用”的现代日本风格，所以在这样的空间里少不了一两件经典西洋家具。
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
                        <span class="text_title">点击右上角菜单键分享给朋友</span>
                        如果你与好友测试结果相同，你们两人都将有机会得到HAY的Kaleido拼盘，Plisse整理架，以及Quilt Sleeve电脑包。 关注「住艺」微信订阅号，10月26日将公布获奖名单。
                        <div class="text_img">
                            <img src="img/fengge/chose_style_1.jpg"  />
                            <img src="img/fengge/chose_style_2.jpg"  />
                            <img src="img/fengge/chose_style_3.jpg"  />
                        </div>					
                    </div>
                    <div class="sanjiao_box">
                        <div class="sanjiao"></div>
                    </div>
                </div>
                <span class="share_btn click_m">分享给你的小伙伴，看看谁跟你有一样的品味</span>
                <div class="cs_more"><a href="<?php echo Url::toRoute('/style/index'); ?>"><span class="more_a">再测一次</span></a><a href="<?php echo Url::toRoute('/style/chosestyle'); ?>"><span class="more_b">查看其它风格</span></a></div>
            </div>
        <?php } ?>
         <div class="gloab_bottm">
            <img class="erweima" src="img/ewm/6.png"  />
            <div class="bottm_mesg">想观看和你风格类似的住艺家吗？<br>请长按识别二维码进入我们的公众号</div>

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

