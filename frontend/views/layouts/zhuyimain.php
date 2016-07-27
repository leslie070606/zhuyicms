<?php
use yii\helpers\Url;
?>
<div class="index_box">
<header class="header_top iconfont icon-logo">
                   <!--<input id="ipt" type="text" value="0" />-->
    <span class="top_right iconfont icon-gongneng"></span>
</header>
<section class="down_right">
    <ul>
        <li><a href="index.html">首页</a></li>
        <li><a href="designer_list.html">住艺设计师</a></li>
        <li><a href="designer_list.html">使用指南</a></li>
        <li><a href="user.html">我的住艺</a></li>
        <li><a href="designer_list.html">更多意见</a></li>
        <li><a href="<?php echo Url::toRoute('/user/loginout');?>">暂时登出</a></li>
    </ul>
</section> 
<div class="down_right_zd"></div> 
<?php echo $content; ?>
</div>