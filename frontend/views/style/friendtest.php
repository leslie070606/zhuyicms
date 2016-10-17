<?php ?>
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
        <div class="self_foin">
            <div class="foin_top">
                <?php
                switch ($mystyle) {
                    case '波西米亚' :
                        echo "<img src='img/fenggejieguo/boximiya01.png' />";
                        break;
                    case '中古' :
                        echo "<img src='img/fenggejieguo/zhonggu01.png' />";
                        break;
                    case '法式古典' :
                        echo "<img src='img/fenggejieguo/fashigudian01.png' />";
                        break;
                    case '工业' :
                        echo "<img src='img/fenggejieguo/gongye01.png' />";
                        break;
                    case '美式' :
                        echo "<img src='img/fenggejieguo/meishi01.png' />";
                        break;
                    case '和式' :
                        echo "<img src='img/fenggejieguo/heshi01.png' />";
                        break;
                    case '现代简约' :
                        echo "<img src='img/fenggejieguo/xiandaijianyue01.png' />";
                        break;
                    case '新中式' :
                        echo "<img src='img/fenggejieguo/xinzhongshi01.png' />";
                        break;
                }
                ?>
            </div>
            <div class="foin_bottom">
                <ul>
                    <?php
                    foreach ($friendstyle as $fs) {
                        ?>
                        <li>
                            <img src="<?=$fs['headimgurl']?>" />
                            <span class="user_name"><?=$fs['user_name']?></span>
                            <span class="match_number">Match<i>90%</i></span>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </body>
</html>


