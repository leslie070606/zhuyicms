
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
        <div class="chose_box chose_boxa">
            <a class="chose_here" href="<?php echo Url::to(['style/report','flash'=>'a']); ?>"><div><img src="img/fenggejieguo/boximiya.png" /><span>波西米亚<i class="match_nuber"><?php if(isset($styleArr['a'])){echo $styleArr['a']*3; }else{echo '0';}  ?><span>%</span></i></span></div></a>
            <a class="chose_here" href="<?php echo Url::to(['style/report','flash'=>'b']); ?>"><div><img src="img/fenggejieguo/zhonggu.png" /><span>复古混搭<i class="match_nuber"><?php if(isset($styleArr['b'])){echo $styleArr['b']*3; }else{echo '0';}  ?><span>%</span></i></span></div></a>
            <a class="chose_here" href="<?php echo Url::to(['style/report','flash'=>'c']); ?>"><div><img src="img/fenggejieguo/fashigudian.png" /><span>法式古典<i class="match_nuber"><?php if(isset($styleArr['c'])){echo $styleArr['c']*3; }else{echo '0';}  ?><span>%</span></i></span></div></a>
            <a class="chose_here" href="<?php echo Url::to(['style/report','flash'=>'d']); ?>"><div><img src="img/fenggejieguo/gongye.png" /><span>工业<i class="match_nuber"><?php if(isset($styleArr['d'])){echo $styleArr['d']*3; }else{echo '0';}  ?><span>%</span></i></span></div></a>
            <a class="chose_here" href="<?php echo Url::to(['style/report','flash'=>'e']); ?>"><div><img src="img/fenggejieguo/meishi.png" /><span>美式<i class="match_nuber"><?php if(isset($styleArr['e'])){echo $styleArr['e']*3; }else{echo '0';}  ?><span>%</span></i></span></div></a>
            <a class="chose_here" href="<?php echo Url::to(['style/report','flash'=>'f']); ?>"><div><img src="img/fenggejieguo/heshi.png" /><span>和式<i class="match_nuber"><?php if(isset($styleArr['f'])){echo $styleArr['f']*3; }else{echo '0';}  ?><span>%</span></i></span></div></a>
            <a class="chose_here" href="<?php echo Url::to(['style/report','flash'=>'g']); ?>"><div><img src="img/fenggejieguo/xiandaijianyue.png" /><span>现代简约<i class="match_nuber"><?php if(isset($styleArr['g'])){echo $styleArr['g']*3; }else{echo '0';}  ?><span>%</span></i></span></div></a>
            <a class="chose_here" href="<?php echo Url::to(['style/report','flash'=>'h']); ?>"><div><img src="img/fenggejieguo/xinzhongshi.png" /><span>中式<i class="match_nuber"><?php if(isset($styleArr['h'])){echo $styleArr['h']*3; }else{echo '0';}  ?><span>%</span></i></span></div></a>
        </div>
        <div class="chose_sylt_btn"><a href="javascript:js_back();">返回我的风格结果</a></div>
    </body>
</html>
<script type="text/javascript">
    function js_back(){
        window.history.back(-1); 
    }
</script>

