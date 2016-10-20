
<?php

use yii\helpers\Url;

$uc = new \common\util\Guolu();
$mystyle['user_name'] = $uc->userTextDecode($mystyle['user_name']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>风格测试</title>
        <link rel="stylesheet" type="text/css" href="css/gloaba.css" />
        <link rel="stylesheet" type="text/css" href="css/problem.css"  />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript">
            $(function () {
                var _hmt = _hmt || [];
                (function () {
                    var hm = document.createElement("script");
                    hm.src = "//hm.baidu.com/hm.js?c2212e69b1418d8a1b6506185b5c8bc3";
                    var s = document.getElementsByTagName("script")[0];
                    s.parentNode.insertBefore(hm, s);
                })();

                $(".style_bottom").each(function () {
                    if ($(this).find("ul li").length == 0) {
                        $(this).html("快去邀请小伙伴来测试吧！");
                    }
                })
            })

        </script>
    </head>
    <body>
        <div class="chose_box open_self">
            <div class="chose_top">

                <div class="top_mesg">
                    <span class="top_mesg_name"><?= $mystyle['user_name'] ?></span>
<!--                    <span>你酷感十足，你是机械时代的迷恋者，你是拒绝平庸的摇滚先锋，</span>
                    <span>你最喜爱的风格是——工业风格</span>
                </div>-->
                    <?php
                    $sharelogo = '';
                    $_shareText = '';
                    switch ($mystyle['style']) {
                        case '波西米亚' :

                            echo "<span>你叛逆不羁,你是异域风情的制造者,你是自由不羁的Bobo族</span>
                    <span>你最喜爱的风格是——波西米亚风</span>
                </div>";
                            echo "<img src='img/fenggejieguo/boximiya_bg.png' />";
                            $sharelogo = 'img/fenggejieguo/boximiya.png';
                            $_shareText = '一枚牛头';
                            break;
                        case '复古混搭' :

                            echo "<span>你复古时尚,你是摩登时期的缅怀者,你是擅用经典的创想家</span>
                    <span>你最喜爱的风格是——复古混搭风格</span>
                </div>";
                            echo "<img src='img/fenggejieguo/zhonggu_bg.png' />";
                            $sharelogo = 'img/fenggejieguo/zhonggu.png';
                            $_shareText = '一个抽象线条';
                            break;
                        case '法式古典' :

                            echo "<span>你优雅浪漫,你是古典美学的追随者,你是精致生活的代言人</span>
                    <span>你最喜爱的风格是——法式古典风格</span>
                </div>";
                            echo "<img src='img/fenggejieguo/fashigudian_bg.png' />";
                            $sharelogo = 'img/fenggejieguo/fashigudian.png';
                            $_shareText = '一枚水晶吊灯';
                            break;
                        case '工业' :

                            echo "<span>你酷感十足,你是机械时代的迷恋者,你是拒绝平庸的摇滚先锋</span>
                    <span>你最喜爱的风格是——工业风格</span>
                </div>";
                            echo "<img src='img/fenggejieguo/gongye_bg.png' />";
                            $sharelogo = 'img/fenggejieguo/gongye.png';
                            $_shareText = '一块砖墙';
                            break;
                        case '美式' :

                            echo "<span>你兼容并蓄,你是浪漫怀古的品位缔造者,你是追求自然舒适的生活家</span>
                    <span>你最喜爱的风格是——美式风格</span>
                </div>";
                            echo "<img src='img/fenggejieguo/meishi_bg.png' />";
                            $sharelogo = 'img/fenggejieguo/meishi.png';
                            $_shareText = '一个碎花沙发';
                            break;
                        case '和式' :

                            echo "<span>你自在朴素,你是侘寂美学的敬仰者,你是禅意生活的实践家</span>
                    <span>你最喜爱的风格是——和式风格</span>
                </div>";
                            echo "<img src='img/fenggejieguo/heshi_bg.png' />";
                            $sharelogo = 'img/fenggejieguo/heshi.png';
                            $_shareText = '一席榻榻米';
                            break;
                        case '现代简约' :

                            echo '<span>你简单纯粹,你是“Less is More”的信徒,你是追寻本质的思想者</span>
                    <span>你最喜爱的风格是——现代简约风格</span>
                </div>';
                            echo "<img src='img/fenggejieguo/xiandaijianyue_bg.png' />";
                            $sharelogo = 'img/fenggejieguo/xiandaijianyue.png';
                            $_shareText = '一个流畅线条';
                            break;
                        case '中式' :

                            echo "<span>你清雅含蓄,你是中国传统文化的研习者,你是东方智慧的传承人</span>
                    <span>你最喜爱的风格是——中式风格</span>
                </div>";
                            echo "<img src='img/fenggejieguo/xinzhongshi_bg.png' />";
                            $sharelogo = 'img/fenggejieguo/xinzhongshi.png';
                            $_shareText = '一把明式椅子';
                            break;
                        default :

                            echo "<span>你叛逆不羁,你是异域风情的制造者,你是自由不羁的Bobo族</span>
                    <span>你最喜爱的风格是——波西米亚风</span>
                </div>";
                            echo "<img src='img/fenggejieguo/boximiya_bg.png' />";
                            $sharelogo = 'img/fenggejieguo/boximiya.png';
                            $_shareText = '一枚牛头';
                    }
                    ?>
                </div>
                <a class="chose_here" href="<?php echo Url::toRoute(['/style/friendstyle', 'style' => '波西米亚', 'link_id' => $link_id]); ?>"><div>
                        <img src="img/fenggejieguo/boximiya.png" />
                        <span>波西米亚</span>
                        <div class="style_bottom">
                            <span class="bot_title">匹配</span>

                            <ul>
                                <?php
//                                function assoc_unique(&$arr, $key) {
//                                    $rAr = array();
//                                    for ($i = 0; $i < count($arr); $i++) {
//                                        if (!isset($rAr[$arr[$i][$key]])) {
//                                            $rAr[$arr[$i][$key]] = $arr[$i];
//                                        }
//                                    }
//                                    $arr = array_values($rAr);
//                                }
//                                assoc_unique($frindstyle, 'open_id');
                                //$frindstyle = array_unique($frindstyle);
                                //print_r($frindstyle);exit;
                                foreach ($frindstyle as $ft) {
                                    if ($ft['style'] == '波西米亚') {
                                        echo "<li><img src='" . $ft['headimgurl'] . "' /></li>";
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div></a>

                <a class="chose_here" href="<?php echo Url::toRoute(['/style/friendstyle', 'style' => '复古混搭', 'link_id' => $link_id]); ?>"><div>
                        <img src="img/fenggejieguo/zhonggu.png" />
                        <span>复古混搭</span>
                        <div class="style_bottom">
                            <span class="bot_title">匹配</span>
                            <ul>
                                <?php
                                foreach ($frindstyle as $ft) {
                                    if ($ft['style'] == '复古混搭') {
                                        echo "<li><img src='" . $ft['headimgurl'] . "' /></li>";
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div></a>

                <a class="chose_here" href="<?php echo Url::toRoute(['/style/friendstyle', 'style' => '法式古典', 'link_id' => $link_id]); ?>"><div>
                        <img src="img/fenggejieguo/fashigudian.png" />
                        <span>法式古典</span>
                        <div class="style_bottom">
                            <span class="bot_title">匹配</span>
                            <ul>
                                <?php
                                foreach ($frindstyle as $ft) {
                                    if ($ft['style'] == '法式古典') {
                                        echo "<li><img src='" . $ft['headimgurl'] . "' /></li>";
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div></a>

                <a class="chose_here" href="<?php echo Url::toRoute(['/style/friendstyle', 'style' => '工业', 'link_id' => $link_id]); ?>"><div>
                        <img src="img/fenggejieguo/gongye.png" />
                        <span>工业</span>
                        <div class="style_bottom">
                            <span class="bot_title">匹配</span>
                            <ul>
                                <?php
                                foreach ($frindstyle as $ft) {
                                    if ($ft['style'] == '工业') {
                                        echo "<li><img src='" . $ft['headimgurl'] . "' /></li>";
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div></a>

                <a class="chose_here" href="<?php echo Url::toRoute(['/style/friendstyle', 'style' => '美式', 'link_id' => $link_id]); ?>"><div>
                        <img src="img/fenggejieguo/meishi.png" />
                        <span>美式</span>
                        <div class="style_bottom">
                            <span class="bot_title">匹配</span>
                            <ul>
                                <?php
                                foreach ($frindstyle as $ft) {
                                    if ($ft['style'] == '美式') {
                                        echo "<li><img src='" . $ft['headimgurl'] . "' /></li>";
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div></a>

                <a class="chose_here" href="<?php echo Url::toRoute(['/style/friendstyle', 'style' => '和式', 'link_id' => $link_id]); ?>"><div>
                        <img src="img/fenggejieguo/heshi.png" />
                        <span>和式</span>
                        <div class="style_bottom">
                            <span class="bot_title">匹配</span>
                            <ul>
                                <?php
                                foreach ($frindstyle as $ft) {
                                    if ($ft['style'] == '和式') {
                                        echo "<li><img src='" . $ft['headimgurl'] . "' /></li>";
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div></a>

                <a class="chose_here" href="<?php echo Url::toRoute(['/style/friendstyle', 'style' => '现代简约', 'link_id' => $link_id]); ?>"><div>
                        <img src="img/fenggejieguo/xiandaijianyue.png" />
                        <span>现代简约</span>
                        <div class="style_bottom">
                            <span class="bot_title">匹配</span>
                            <ul>
                                <?php
                                foreach ($frindstyle as $ft) {
                                    if ($ft['style'] == '现代简约') {
                                        echo "<li><img src='" . $ft['headimgurl'] . "' /></li>";
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div></a>

                <a class="chose_here" href="<?php echo Url::toRoute(['/style/friendstyle', 'style' => '中式', 'link_id' => $link_id]); ?>"><div>
                        <img src="img/fenggejieguo/xinzhongshi.png" />
                        <span>中式</span>
                        <div class="style_bottom">
                            <span class="bot_title">匹配</span>
                            <ul>
                                <?php
                                foreach ($frindstyle as $ft) {
                                    if ($ft['style'] == '中式') {
                                        echo "<li><img src='" . $ft['headimgurl'] . "' /></li>";
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div></a>


            </div>
            <div class="foin_more">
                <a href="<?php echo Url::toRoute('/style/index'); ?>" style="color: #FF4E38">我要重玩一次</a>
            </div>
    </body>
</html>
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
                    title: '<?= $mystyle['user_name'] ?>说自己很「<?= $mystyle['style'] ?>」并向你扔了<?= $_shareText; ?>', // 分享标题
                                desc: '看看你对「家」的态度,如果你和我的测试结果相同,两人都将有机会得到HAY的七巧板拼盘一套。', // 分享描述
                                link: "<?php echo Yii::$app->params['frontDomain']; ?>" + '/index.php?r=style/report&link_id=' + "<?= $link_id ?>", // 分享链接
                                imgUrl: "<?php echo Yii::$app->params['frontDomain'] ?>" + '/<?= $sharelogo ?>', // 分享图标
                                type: '', // 分享类型,music、video或link，不填默认为link
                                dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
                                success: function () {
                                    // 用户确认分享后执行的回调函数
                                    alert('分享成功！再次点开你分享的链接可查看你朋友的结果。');tj_ajax(6,6037,"","","分享次数");
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
                                title: '<?= $mystyle['user_name'] ?>说自己很「<?= $mystyle['style'] ?>」并向你扔了<?= $_shareText; ?>,还想看看你的家居风格是什么', // 分享标题
                                link: "<?php echo Yii::$app->params['frontDomain']; ?>" + '/index.php?r=style/report&link_id=' + "<?= $link_id ?>", // 分享链接
                                imgUrl: "<?php echo Yii::$app->params['frontDomain'] ?>" + '/<?= $sharelogo ?>', // 分享图标
                                success: function () {
                                    // 用户确认分享后执行的回调函数
                                    alert('分享成功！再次点开你分享的链接可查看你朋友的结果。');tj_ajax(6,6036,"","","分享次数");
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