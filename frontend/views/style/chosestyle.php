
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
            <a class="chose_here" href="<?php echo Url::to(['style/report','flash'=>'a']); ?>"><div><img src="img/fenggejieguo/boximiya.png" /><span>波西米亚</span></div></a>
            <a class="chose_here" href="<?php echo Url::to(['style/report','flash'=>'b']); ?>"><div><img src="img/fenggejieguo/zhonggu.png" /><span>复古混搭</span></div></a>
            <a class="chose_here" href="<?php echo Url::to(['style/report','flash'=>'c']); ?>"><div><img src="img/fenggejieguo/fashigudian.png" /><span>法式古典</span></div></a>
            <a class="chose_here" href="<?php echo Url::to(['style/report','flash'=>'d']); ?>"><div><img src="img/fenggejieguo/gongye.png" /><span>工业</span></div></a>
            <a class="chose_here" href="<?php echo Url::to(['style/report','flash'=>'e']); ?>"><div><img src="img/fenggejieguo/meishi.png" /><span>美式</span></div></a>
            <a class="chose_here" href="<?php echo Url::to(['style/report','flash'=>'f']); ?>"><div><img src="img/fenggejieguo/heshi.png" /><span>和式</span></div></a>
            <a class="chose_here" href="<?php echo Url::to(['style/report','flash'=>'g']); ?>"><div><img src="img/fenggejieguo/xiandaijianyue.png" /><span>现代简约</span></div></a>
            <a class="chose_here" href="<?php echo Url::to(['style/report','flash'=>'h']); ?>"><div><img src="img/fenggejieguo/xinzhongshi.png" /><span>中式</span></div></a>
        </div>
    </body>
</html>


