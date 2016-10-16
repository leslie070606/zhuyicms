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
        <style>
            .gloab,.gloab img { position: relative; width: 100%; height: 100%; overflow: hidden;}
            .gloab_btn { background: #ff4e38; font-size: .26rem; position: absolute; width:82% ; left: 9%; bottom: 4.5%; height: .88rem;}
            .gloab_btn a { display: block; text-align: center; color: #FFFFFF; line-height: .88rem;}
        </style>
    </head>
    <body>
        <div class="gloab">
            <img src="img/fengge/shouye.jpg"/>
            <span class="gloab_btn"><a href="<?php echo Url::toRoute(['/style/problem','link_id'=>$link_id]);?>">开始测试</a></span>
        </div>
    </body>
</html>

