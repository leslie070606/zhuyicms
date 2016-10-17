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
        
                <?php
                switch ($style) {
                    case '波西米亚' :
                        echo '<div class="self_foin" style="background-color: #f9e8d9;">
            <div class="foin_top">';
                        echo "<img src='img/fenggejieguo/boximiya01.png' />";
                        break;
                    case '中古' :
                        echo '<div class="self_foin" style="background-color: #d2d0cf;">
            <div class="foin_top">';
                        echo "<img src='img/fenggejieguo/zhonggu01.png' />";
                        break;
                    case '法式古典' :
                         echo '<div class="self_foin" style="background-color: #fdefd6;">
            <div class="foin_top">';
                        echo "<img src='img/fenggejieguo/fashigudian01.png' />";
                        break;
                    case '工业' :
                         echo '<div class="self_foin" style="background-color: #d7d7d8;">
            <div class="foin_top">';
                        echo "<img src='img/fenggejieguo/gongye01.png' />";
                        break;
                    case '美式' :
                         echo '<div class="self_foin" style="background-color: #ededec;">
            <div class="foin_top">';
                        echo "<img src='img/fenggejieguo/meishi01.png' />";
                        break;
                    case '和式' :
                         echo '<div class="self_foin" style="background-color: #f5e9de;">
            <div class="foin_top">';
                        echo "<img src='img/fenggejieguo/heshi01.png' />";
                        break;
                    case '现代简约' :
                         echo '<div class="self_foin" style="background-color: #dadada;">
            <div class="foin_top">';
                        echo "<img src='img/fenggejieguo/xiandaijianyue01.png' />";
                        break;
                    case '新中式' :
                         echo '<div class="self_foin" style="background-color: #eacdc1;">
            <div class="foin_top">';
                        echo "<img src='img/fenggejieguo/xinzhongshi01.png' />";
                        break;
                    default :
                        case '波西米亚' :
                        echo '<div class="self_foin" style="background-color: #f9e8d9;">
            <div class="foin_top">';
                        echo "<img src='img/fenggejieguo/boximiya01.png' />";
                        
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


