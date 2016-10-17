<?php

use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>风格测试</title>
        <link rel="stylesheet" type="text/css" href="css/gloaba.css" />
        <link rel="stylesheet" type="text/css" href="css/problem.css"  />
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
                switch ($mystyle['style']) {
                    case '波西米亚' :
                        
                        echo "<span>你叛逆不羁,你是异域风情的制造者,你是自由不羁的Bobo族</span>
                    <span>你最喜爱的风格是——波西米亚风</span>
                </div>";
                        echo "<img src='img/fenggejieguo/boximiya_bg.png' />";
                        break;
                    case '中古' :
                        
                        echo "<span>你复古时尚,你是摩登时期的缅怀者,你是擅用经典的创想家</span>
                    <span>你最喜爱的风格是——中古风格</span>
                </div>";
                        echo "<img src='img/fenggejieguo/zhonggu_bg.png' />";
                        break;
                    case '法式古典' :
                        echo "<img src='img/fenggejieguo/fashigudian_bg.png' />";
                        echo "<span>你优雅浪漫,你是古典美学的追随者,你是精致生活的代言人</span>
                    <span>你最喜爱的风格是——法式古典风格</span>
                </div>";
                        break;
                    case '工业' :
                        
                        echo "<span>你酷感十足,你是机械时代的迷恋者,你是拒绝平庸的摇滚先锋</span>
                    <span>你最喜爱的风格是——工业风格</span>
                </div>";
                        echo "<img src='img/fenggejieguo/gongye_bg.png' />";
                        break;
                    case '美式' :
                        
                        echo "<span>你兼容并蓄,你是浪漫怀古的品位缔造者,你是追求自然舒适的生活家</span>
                    <span>你最喜爱的风格是——美式风格</span>
                </div>";
                        echo "<img src='img/fenggejieguo/meishi_bg.png' />";
                        break;
                    case '和式' :
                        
                        echo "<span>你自在朴素,你是侘寂美学的敬仰者,你是禅意生活的实践家</span>
                    <span>你最喜爱的风格是——和式风格</span>
                </div>";
                        echo "<img src='img/fenggejieguo/heshi_bg.png' />";
                        break;
                    case '现代简约' :
                        
                        echo '<span>你简单纯粹,你是“Less is More”的信徒,你是追寻本质的思想者</span>
                    <span>你最喜爱的风格是——现代简约风格</span>
                </div>';
                        echo "<img src='img/fenggejieguo/xiandaijianyue_bg.png' />";
                        break;
                    case '新中式' :
                        
                        echo "<span>你清雅含蓄,你是中国传统文化的研习者,你是东方智慧的传承人</span>
                    <span>你最喜爱的风格是——新中式风格</span>
                </div>";
                        echo "<img src='img/fenggejieguo/xinzhongshi_bg.png' />";
                        break;
                    default :
                        
                        echo "<span>你叛逆不羁,你是异域风情的制造者,你是自由不羁的Bobo族</span>
                    <span>你最喜爱的风格是——波西米亚风</span>
                </div>";
                        echo "<img src='img/fenggejieguo/boximiya_bg.png' />";
                }
                ?>
            </div>
            <a class="chose_here" href="<?php echo Url::toRoute(['/style/friendstyle', 'style' => '波西米亚', 'link_id' => $link_id]); ?>"><div>
                    <img src="img/fenggejieguo/boximiya.png" />
                    <span>波西米亚</span>
                    <div class="style_bottom">
                        <span class="bot_title">Match</span>

                        <ul>
                            <?php
                            foreach ($frindstyle as $ft) {
                                if ($ft['style'] == '波西米亚') {
                                    echo "<li><img src='" . $ft['headimgurl'] . "' /></li>";
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div></a>

            <a class="chose_here" href="<?php echo Url::toRoute(['/style/friendstyle', 'style' => '中古', 'link_id' => $link_id]); ?>"><div>
                    <img src="img/fenggejieguo/zhonggu.png" />
                    <span>中古</span>
                    <div class="style_bottom">
                        <span class="bot_title">Match</span>
                        <ul>
                            <?php
                            foreach ($frindstyle as $ft) {
                                if ($ft['style'] == '中古') {
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
                        <span class="bot_title">Match</span>
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
                        快去邀请小伙伴来测试吧！
                    </div>
                </div></a>

            <a class="chose_here" href="<?php echo Url::toRoute(['/style/friendstyle', 'style' => '美式', 'link_id' => $link_id]); ?>"><div>
                    <img src="img/fenggejieguo/meishi.png" />
                    <span>美式</span>
                    <div class="style_bottom">
                        <span class="bot_title">Match</span>
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
                        <span class="bot_title">Match</span>
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
                        <span class="bot_title">Match</span>
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

            <a class="chose_here" href="<?php echo Url::toRoute(['/style/friendstyle', 'style' => '新中式', 'link_id' => $link_id]); ?>"><div>
                    <img src="img/fenggejieguo/xinzhongshi.png" />
                    <span>新中式</span>
                    <div class="style_bottom">
                        <span class="bot_title">Match</span>
                        <ul>
                            <?php
                            foreach ($frindstyle as $ft) {
                                if ($ft['style'] == '新中式') {
                                    echo "<li><img src='" . $ft['headimgurl'] . "' /></li>";
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div></a>


        </div>
        <div class="foin_more">
            <a href="<?php echo Url::toRoute('/style/index'); ?>">我要重玩一次</a>
        </div>
    </body>
</html>

