<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\file\FileInput;
use yii\widgets\ActiveForm;

$session = Yii::$app->session;
if (!$session->isActive) {
    $session->open();
}
$_cookieSts = \common\controllers\BaseController::checkLoginCookie();
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
        <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <script type="text/javascript" src="js/gloab.js" ></script>
        <script type="text/javascript" src="js/submit.js" ></script>
        <script type="text/javascript" src="js/ajaxfileupload.js" ></script>

    </head>
    <body>
        <div class="gif_loading"><img src="img/loading_1.gif" /></div>
        <div class="submit_box">
            <header class="header_top iconfont icon-logo">
                <!--<input id="ipt" type="text" value="0" />-->
                <span class="top_right iconfont icon-gongneng"></span>
            </header>
            <section class="down_right">
                <ul>
                    <li><a href="<?php echo Url::toRoute('/index/index'); ?>">首页</a></li>
                    <li><a href="<?php echo Url::toRoute('/designer/list'); ?>">住艺设计师</a></li>
                    <li><a href="<?php echo Url::toRoute('/zyzhinan/guide'); ?>">设计指南</a></li>
                    <li><a href="<?php echo Url::toRoute('/order/list'); ?>">我的住艺</a></li>
                    <li><a href="<?php echo Url::toRoute('/user/feedback'); ?>">更多建议</a></li>
                    <li>   <?php if ($session->get('user_id')) { ?>
                            <a abc="<?php echo Url::toRoute('/user/loginout'); ?>">暂时登出</a>

                        <?php } else { ?>

                            <a href = "<?php echo Url::toRoute('/user/login'); ?>">立即登录</a>

                        <?php }; ?>

                    </li>
                </ul>
            </section>
            <div class="down_right_zd"></div>

            <div class="out_true_box">
                <div class="out_true">
                    <div class="out_true_top">确认退出登录？</div>
                    <div class="out_true_bott">
                        <span class="quxiao">取消</span>
                        <a href="<?php echo Url::toRoute('/user/loginout'); ?>"><span class="queding">确定</span></a>

                    </div>
                </div>
            </div>  

            <div class="submit_boxa">
                <span class="submit_true">提交成功！住艺已经收到你的需求！</span>
                <span class="submit_truea">需求可随时在【我的住艺】中继续填写</span>
                <span class="center_nameaa"><a class="" onclick=shaohou("index.php?r=project/choose_designer&&project_id=<?= $project_id ?>")>稍后再填</a></span>
                <?php
                $form = ActiveForm::begin([
                            'method' => 'post',
                            'options' => ['enctype' => 'multipart/form-data', 'class'=>'sub_form'],
                           
                ]);
                ?>
                <span class="here_a" style=" float: left; width: 100%; margin-bottom: .3rem;">请告诉我们更多信息,以便住艺为你匹配更适合的设计师</span>
                <input class="dema_ipt" type="text" name="compound" placeholder="请填写居住的小区名称" />
                <div class=" submit_here">
                    <span class="here_a">请上传户型图、房屋照片</span>
                    <span class="here_b">（上传png、jpg格式，不大于4M图片）</span>
                    <div class="here_img_box">
                        <input type="hidden" name="here_imga" id="here_imga"  value="" />
                        <ul id="ula">
                            <li class="add_img iconfont icon-tianjia upload_box" id="upload_box" >
                                <input type="file"  accept="image/*" name="upload" id="upload" onchange="ajaxFileUpload('upload')">
                            </li>
                        </ul>
                    </div>
                </div>

                <div class=" submit_here submit_herea">
                    <span class="here_a">请上传已收集的理想之家</span>
                    <span class="here_b">（上传png、jpg格式，不大于4M图片）</span>
                    <div class="here_img_box">
                        <input type="hidden" name="here_imgb" id="here_imgb" value="" />
                        <ul id="ulb">
                            <li class="add_img iconfont icon-tianjia upload_box" id="upload_boxa">
                                <input type="file" accept="image/*" name="uploada" id="uploada" onchange="ajaxFileUpload('uploada')">
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="type_list">
                    <span class="here_a" style=" float: left; width: 100%; margin-bottom: .3rem;">对于空间，我尤其注重（可复选）</span>
                    <input type="hidden" name="project_tags" id="project_tags" value="" />
                    <div>
                        <span class="left_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>灯光及氛围</span>
                        <span class="right_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>儿童房的设计</span>
                    </div>
                    <div>
                        <span class="left_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>施工团队是否可靠</span>
                        <span class="right_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>家具和材料的环保性</span>
                    </div>
                    <div>
                        <span class="left_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>收纳整理空间</span>
                        <span class="right_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>相对独立的家庭成员空间</span>
                    </div>
                    <div>
                        <span class="left_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>艺术品、收藏品的巧妙应用</span>
                        <span class="right_sp list_spa"><i class="iconfont icon-weixuanzhong"></i>与众不同的个性化之家</span>
                    </div>
                </div>
                <textarea class="text_box"  name="description" id="answer-for-q-3" rows="10" placeholder="更多个性化需求，在这里告诉住艺吧！"></textarea>
                <button class="chose_btn zhihui" type="button" disabled="true"  style="border: none;">
                    完成！立刻查看设计师！
                </button>
                <?php ActiveForm::end(); ?>
                
            </div>
        </div>	
    </body>
</html>
<script type="text/javascript">
    $(function(){
       tj_ajax(3,3001, user_id, "", "细节需求页面加载量"); 
    })
    
    function shaohou(a){
        tj_ajax(2,2002, user_id, "", "稍后再填");
        window.location.href=a;
    }
    touch.on(".chose_btn","tap",function(ev){
        if($(ev.currentTarget).attr("disabled")){
            return false;
        }else{
             tj_ajax(2,2001, user_id, "", "提交");
             $("form").submit();
        }
    });
    var _uploadUrl = "<?php echo Url::to(['index/upload-image']); ?>";

    function ajaxFileUpload(fileName) {

        $(".down_right_zd").show().animate({
            opacity: .5
        }, 200, function () {
            $(".gif_loading").show();
        });

        $.ajaxFileUpload({
            url: _uploadUrl, //用于文件上传的服务器端请求地址
            secureuri: false, //是否需要安全协议，一般设置为false
            fileElementId: fileName, //文件上传域的ID
            dataType: 'json', //返回值类型 一般设置为json
            success: function (data, status) //服务器成功响应处理函数
            {

                var src = data.msg;
                var li_html = '<li><img src="' + src + '" /><i class="iconfont icon-shanchu1"></i></li>';
                if (data.code != 1) {
                    alert(data.msg);
                } else {
                    if (fileName == "uploada") {
                        var val_img = "";
                        $("#ulb").find("li:last-child").before(li_html)
                        img_height_auto();
                        $("#ulb li").each(function () {
                            if ($(this).hasClass("add_img")) {

                            } else {
                                var srcc = $(this).find("img").attr("src");
                                val_img += srcc + ",";
                            }
                        });
                        $("#here_imgb").val(val_img);
                    } else {
                        var val_img = "";
                        $("#ula").find("li:last-child").before(li_html)
                        img_height_auto();
                        $("#ula li").each(function () {
                            if ($(this).hasClass("add_img")) {

                            } else {
                                var srcc = $(this).find("img").attr("src");
                                val_img += srcc + ",";
                            }
                        });
                        $("#here_imga").val(val_img);
                       
                    }

                    touch.on(".here_img_box li", "tap", function (ev) {
                        if ($(ev.currentTarget).hasClass("add_img")) {

                        } else {
                            var ull = $(ev.currentTarget).parent("ul");
                            $(ev.currentTarget).remove();
                            var gettt = "";
                            var length = ull.find("li").length - 1;
                            for (var i = 0; i < length; i++) {
                                var img_id = ull.find("li:eq(" + i + ") img").attr("src");
                                gettt += img_id + ",";
                            }
                            ull.prev("input").val(gettt);
                            //alert(ull.prev("input").val());
                            auto_click();

                        }
                    });
                }
                 $(".down_right_zd").animate({
                            opacity: .5
                        }, 200, function () {
                            
                            $(".gif_loading,.down_right_zd").hide();
                        });
                        auto_click();
            },
            error: function (data, status, e) //服务器响应失败处理函数
            {
                alert(e);
            }
        })
        return false;
    }


</script>
