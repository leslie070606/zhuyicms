<?php

use yii\helpers\Url;

$session = Yii::$app->session;
if (!$session->isActive) {
    $session->open();
}
?>
<div class="index_box">
    <header class="header_top iconfont icon-logo">
                       <!--<input id="ipt" type="text" value="0" />-->
        <span class="top_right iconfont icon-gongneng"></span>
    </header>
    <section class="down_right">
        <ul>
            <li><a href="<?php echo Url::toRoute('/index/index'); ?>">首页</a></li>
            <li><a href="<?php echo Url::toRoute('/designer/list'); ?>">住艺设计师</a></li>
            <li><a href="#">设计指南</a></li>
            <li><a href="<?php echo Url::toRoute('/order/list'); ?>">我的住艺</a></li>
            <li><a href="designer_list.html">更多意见</a></li>
            <li>   <?php if ($session->get('user_id')){ ?>
                    <a href="<?php echo Url::toRoute('/user/loginout'); ?>">暂时登出</a>
                    
                    <?php }else{ ?>

                    <a href = "<?php echo Url::toRoute('/user/login'); ?>">立即登录</a>

                    <?php }; ?>
             
            </li>
        </ul>
    </section>
    <div class = "down_right_zd"></div>
    <?php echo $content;?>
                    
</div>