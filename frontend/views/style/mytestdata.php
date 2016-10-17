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
                <img src="img/fengge/fengge_a.jpg" />
            </div>
            <a class="chose_here" href="<?php echo Url::toRoute('/style/friendstyle'); ?>"><div>
                    <img src="img/fengge/chose_style.jpg" />
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

            <a class="chose_here" href="<?php echo Url::toRoute('/style/friendstyle'); ?>"><div>
                    <img src="img/fengge/chose_style.jpg" />
                    <span>二十世纪中现代</span>
                    <div class="style_bottom">
                        <span class="bot_title">Match</span>
                        <ul>
                            <?php 
                        foreach ($frindstyle as $ft){
                            if($ft['style'] == '二十世纪中现代'){
                                echo "<li><img src='".$ft['headimgurl']."' /></li>";
                            }
                        }
                        ?>
                        </ul>
                    </div>
                </div></a>

            <a class="chose_here" href="<?php echo Url::toRoute('/style/friendstyle'); ?>"><div>
                    <img src="img/fengge/chose_style.jpg" />
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

            <a class="chose_here" href="flash_a.html"><div>
                    <img src="img/fengge/chose_style.jpg" />
                    <span>工业</span>
                    <div class="style_bottom">
                        快去邀请小伙伴来测试吧！
                    </div>
                </div></a>

            <a class="chose_here" href="flash_a.html"><div>
                    <img src="img/fengge/chose_style.jpg" />
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

            <a class="chose_here" href="flash_a.html"><div>
                    <img src="img/fengge/chose_style.jpg" />
                    <span>日式和风</span>
                    <div class="style_bottom">
                        <span class="bot_title">Match</span>
                        <ul>
                            <?php 
                        foreach ($frindstyle as $ft){
                            if($ft['style'] == '日式和风'){
                                echo "<li><img src='".$ft['headimgurl']."' /></li>";
                            }
                        }
                        ?>
                        </ul>
                    </div>
                </div></a>

            <a class="chose_here" href="flash_a.html"><div>
                    <img src="img/fengge/chose_style.jpg" />
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

            <a class="chose_here" href="flash_a.html"><div>
                    <img src="img/fengge/chose_style.jpg" />
                    <span>中式</span>
                    <div class="style_bottom">
                        <span class="bot_title">Match</span>
                        <ul>
                            <?php 
                        foreach ($frindstyle as $ft){
                            if($ft['style'] == '中式'){
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

