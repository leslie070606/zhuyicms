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
                    <span class="top_mesg_name">Kevin</span>
                    <span>你酷感十足，你是机械时代的迷恋者，你是拒绝平庸的摇滚先锋，</span>
                    <span>你最喜爱的风格是——工业风格</span>
                </div>
                <?php
                switch ($mystyle){
                    case '波西米亚' :
                        echo "<img src='img/fenggejieguo/boximiya_bg.png' />";
                        break;
                    case '中古' :
                        echo "<img src='img/fenggejieguo/zhonggu_bg.png' />";
                        break;
                    case '法式古典' :
                        echo "<img src='img/fenggejieguo/fashigudian_bg.png' />";
                        break;
                    case '工业' :
                        echo "<img src='img/fenggejieguo/gongye_bg.png' />";
                        break;
                    case '美式' :
                        echo "<img src='img/fenggejieguo/meishi_bg.png' />";
                        break;
                    case '和式' :
                        echo "<img src='img/fenggejieguo/heshi_bg.png' />";
                        break;
                    case '现代简约' :
                        echo "<img src='img/fenggejieguo/xiandaijianyue_bg.png' />";
                        break;
                    case '新中式' :
                        echo "<img src='img/fenggejieguo/xinzhongshi_bg.png' />";
                        break;
                }
                ?>
            </div>
            <a class="chose_here" href="<?php echo Url::toRoute(['/style/friendstyle','style'=>'波西米亚','link_id'=>$link_id]); ?>"><div>
                    <img src="img/fenggejieguo/boximiya.png" />
                    <span>波西米亚</span>
                    <div class="style_bottom">
                        <span class="bot_title">Match</span>
                        
                        <ul>
                        <?php 
                        foreach ($frindstyle as $ft){
                            if($ft['style'] == '波西米亚'){
                                echo "<li><img src='".$ft['headimgurl']."' /></li>";
                            }
                        }
                        ?>
                        </ul>
                    </div>
                </div></a>

            <a class="chose_here" href="<?php echo Url::toRoute(['/style/friendstyle','style'=>'中古','link_id'=>$link_id]); ?>"><div>
                    <img src="img/fenggejieguo/zhonggu.png" />
                    <span>中古</span>
                    <div class="style_bottom">
                        <span class="bot_title">Match</span>
                        <ul>
                            <?php 
                        foreach ($frindstyle as $ft){
                            if($ft['style'] == '中古'){
                                echo "<li><img src='".$ft['headimgurl']."' /></li>";
                            }
                        }
                        ?>
                        </ul>
                    </div>
                </div></a>

            <a class="chose_here" href="<?php echo Url::toRoute(['/style/friendstyle','style'=>'法式古典','link_id'=>$link_id]); ?>"><div>
                    <img src="img/fenggejieguo/fashigudian.png" />
                    <span>法式古典</span>
                    <div class="style_bottom">
                        <span class="bot_title">Match</span>
                        <ul>
                            <?php 
                        foreach ($frindstyle as $ft){
                            if($ft['style'] == '法式古典'){
                                echo "<li><img src='".$ft['headimgurl']."' /></li>";
                            }
                        }
                        ?>
                        </ul>
                    </div>
                </div></a>

            <a class="chose_here" href="<?php echo Url::toRoute(['/style/friendstyle','style'=>'工业','link_id'=>$link_id]); ?>"><div>
                    <img src="img/fenggejieguo/gongye.png" />
                    <span>工业</span>
                    <div class="style_bottom">
                        快去邀请小伙伴来测试吧！
                    </div>
                </div></a>

            <a class="chose_here" href="<?php echo Url::toRoute(['/style/friendstyle','style'=>'美式','link_id'=>$link_id]); ?>"><div>
                    <img src="img/fenggejieguo/meishi.png" />
                    <span>美式</span>
                    <div class="style_bottom">
                        <span class="bot_title">Match</span>
                        <ul>
                           <?php 
                        foreach ($frindstyle as $ft){
                            if($ft['style'] == '美式'){
                                echo "<li><img src='".$ft['headimgurl']."' /></li>";
                            }
                        }
                        ?>
                        </ul>
                    </div>
                </div></a>

            <a class="chose_here" href="<?php echo Url::toRoute(['/style/friendstyle','style'=>'和式','link_id'=>$link_id]); ?>"><div>
                    <img src="img/fenggejieguo/heshi.png" />
                    <span>和式</span>
                    <div class="style_bottom">
                        <span class="bot_title">Match</span>
                        <ul>
                            <?php 
                        foreach ($frindstyle as $ft){
                            if($ft['style'] == '和式'){
                                echo "<li><img src='".$ft['headimgurl']."' /></li>";
                            }
                        }
                        ?>
                        </ul>
                    </div>
                </div></a>

            <a class="chose_here" href="<?php echo Url::toRoute(['/style/friendstyle','style'=>'现代简约','link_id'=>$link_id]); ?>"><div>
                    <img src="img/fenggejieguo/xiandaijianyue.png" />
                    <span>现代简约</span>
                    <div class="style_bottom">
                        <span class="bot_title">Match</span>
                        <ul>
                            <?php 
                        foreach ($frindstyle as $ft){
                            if($ft['style'] == '现代简约'){
                                echo "<li><img src='".$ft['headimgurl']."' /></li>";
                            }
                        }
                        ?>
                        </ul>
                    </div>
                </div></a>

            <a class="chose_here" href="<?php echo Url::toRoute(['/style/friendstyle','style'=>'新中式','link_id'=>$link_id]); ?>"><div>
                    <img src="img/fenggejieguo/xinzhongshi.png" />
                    <span>新中式</span>
                    <div class="style_bottom">
                        <span class="bot_title">Match</span>
                        <ul>
                            <?php 
                        foreach ($frindstyle as $ft){
                            if($ft['style'] == '新中式'){
                                echo "<li><img src='".$ft['headimgurl']."' /></li>";
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

