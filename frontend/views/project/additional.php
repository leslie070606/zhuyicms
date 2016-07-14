<?php
use yii\helpers\Url;

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>提交需求</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/submit.css" />
        <link rel="stylesheet"  href="css/iconfont.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <script type="text/javascript" src="js/gloab.js" ></script>
        <script type="text/javascript" src="js/submit.js" ></script>

    </head>
    <body>
        <div class="submit_box">
            <header class="header_top iconfont icon-logo">
                <!--<input id="ipt" type="text" value="0" />-->
                <span class="top_right iconfont icon-gongneng"></span>
            </header>
            <section class="down_right">
                <ul>
                    <li><a href="index.html">首页</a></li>
                    <li><a href="designer_list.html">住艺设计师</a></li>
                    <li><a href="style_test.html">风格测试</a></li>
                    <li><a href="designer_list.html">使用指南</a></li>
                    <li><a href="user.html">我的住艺</a></li>
                    <li><a href="designer_list.html">意见反馈</a></li>
                    <li><a href="designer_list.html">退出登录</a></li>
                </ul>
            </section> 
            <div class="down_right_zd"></div>  

            <div class="submit_box">
                <span class="submit_true">提交成功</span>
                <span class="submit_truea">需求可以在我的住艺里修改</span>
                <input class="dema_ipt" type="text" placeholder="请填写居住的小区名称" />
                <div class=" submit_here">
                    <span class="here_a">上传户型图、家的照片（最多上传10张）</span>
                    <span class="here_b">（上传png... 不大于＊k图片）</span>
                    <div class="here_img_box">
                        <ul>
                            <li><img src="img/home_page/1.jpg"/><i class="iconfont icon-shanchu"></i></li>
                            <li><img src="img/home_page/1.jpg"/><i class="iconfont icon-shanchu"></i></li>
                            <li><img src="img/home_page/1.jpg"/><i class="iconfont icon-shanchu"></i></li>
                            <li class="add_img iconfont icon-tianjia"></li>
                        </ul>
                    </div>
                </div>

                <div class=" submit_here submit_herea">
                    <span class="here_a">上传已收集的喜欢照片（最多上传10张）</span>
                    <span class="here_b">（上传png... 不大于＊k图片）</span>
                    <div class="here_img_box">
                        <ul>
                            <li><img src="img/home_page/1.jpg"/><i class="iconfont icon-shanchu"></i></li>
                            <li><img src="img/home_page/1.jpg"/><i class="iconfont icon-shanchu"></i></li>
                            <li><img src="img/home_page/1.jpg"/><i class="iconfont icon-shanchu"></i></li>
                            <li><img src="img/home_page/1.jpg"/><i class="iconfont icon-shanchu"></i></li>
                            <li class="add_img iconfont icon-tianjia"></li>
                        </ul>
                    </div>
                </div>

                <div class="type_list">
                    <div>
                        <span class="left_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>注重灯光设计</span>
                        <span class="right_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>注重儿童房设计</span>
                    </div>
                    <div>
                        <span class="left_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>注重施工团队认证</span>
                        <span class="right_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>注重家具极其环保材质</span>
                    </div>
                    <div>
                        <span class="left_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>注重收纳整理设计</span>
                        <span class="right_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>注重各自均有独立空间</span>
                    </div>
                    <div>
                        <span class="left_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>注重收藏品等爱好满足</span>
                        <span class="right_sp list_spa"><i class="iconfont icon-xuanzhong"></i>注重独特创新的亮点</span>
                    </div>
                </div>
                <textarea class="text_box"  name="answer-for-q-3" id="answer-for-q-3" rows="10" placeholder="更详细的描述，更精准的匹配！（不超过2000字）"></textarea>
                <a href="Choose_designer.html"><div class="chose_btn">
                        提交并查看设计师
                    </div></a>
                <span class="center_nameaa"><a href="index.php?r=project/choose_designer">跳过</a></span>
            </div>
        </div>	
    </body>
</html>

