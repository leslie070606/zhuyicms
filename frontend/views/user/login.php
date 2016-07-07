<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>登录</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/login.css" />
        <link rel="stylesheet"  href="http://at.alicdn.com/t/font_1467361951_3606887.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js" ></script>	
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <script type="text/javascript" src="js/gloab.js" ></script>
        <script type="text/javascript" src="js/login.js" ></script>
    </head>
    <body>
        <section class="login_box">
            <header class="header_top">
                <span class="hunt_title">登录</span>
                <!--<input id="ipt" type="text" value="0" />-->
                <span class="top_right iconfont icon-gongneng"></span>
            </header>
            <section class="down_right">
                <ul>
                    <li><a href="designer_list.html">住艺设计师</a></li>
                    <li><a href="style_test.htmls">风格测试</a></li>
                    <li><a href="designer_list.html">使用指南</a></li>
                    <li><a href="user.html">我的住艺</a></li>
                    <li><a href="designer_list.html">意见反馈</a></li>
                    <li><a href="designer_list.html">退出登录</a></li>
                </ul>
            </section> 

            <div class="login_title">
                输入手机号码用于登录
            </div>
            <div class="login_ipt"><input id="phone" type="text" placeholder="手机号" /><</div>
            <div class="auth_code login_ipt"><input id="code" type="text" /><span class="huoqu djser">获取验证码</span></div>
            <div class="login_ipt btnn">完成<span id="worry">您输入的手机号有误，请重新输入</span></div>
            <div class="login_talk">
                <span class="iconfont icon-xuanzhong">注册即表示本人同意<a class="red	">《用户协议》</a></span>
            </div>
            <a href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx1344a7a9fac82094&redirect_uri=http://zhuyihome.com/index.php?r=style/shou&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect"><div class="weixin_login">

                    <i class="iconfont icon-sousuo" style="font-size: .44rem;"></i>微信登录

                </div></a>
        </section>

    </body>
</html>