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
        <div class="chose_box">
            <a class="chose_here" href="<?php echo Url::to(['style/report','flash'=>'a']); ?>"><div><img src="img/fengge/chose_style.jpg" /><span>波西米亚</span></div></a>
            <a class="chose_here" href="flash_b.html"><div><img src="img/fengge/chose_style.jpg" /><span>二十世纪中现代</span></div></a>
            <a class="chose_here" href="flash_c.html"><div><img src="img/fengge/chose_style.jpg" /><span>法式古典</span></div></a>
            <a class="chose_here" href="flash_d.html"><div><img src="img/fengge/chose_style.jpg" /><span>工业</span></div></a>
            <a class="chose_here" href="flash_e.html"><div><img src="img/fengge/chose_style.jpg" /><span>美式</span></div></a>
            <a class="chose_here" href="flash_f.html"><div><img src="img/fengge/chose_style.jpg" /><span>日式和风</span></div></a>
            <a class="chose_here" href="flash_g.html"><div><img src="img/fengge/chose_style.jpg" /><span>现代简约</span></div></a>
            <a class="chose_here" href="flash_h.html"><div><img src="img/fengge/chose_style.jpg" /><span>中式</span></div></a>
        </div>
    </body>
</html>


