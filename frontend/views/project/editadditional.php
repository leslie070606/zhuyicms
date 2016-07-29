<?php
use yii\helpers\Html;
use yii\helpers\Url;
$project_tags_arr = explode('$', $model->project_tags);

$session = Yii::$app->session;
if (!$session->isActive) {
    $session->open();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>编辑需求</title>
        <link rel="stylesheet" href="css/gloab.css" />
        <link rel="stylesheet" href="css/edit_demand.css" />
        <link rel="stylesheet"  href="css/iconfont.css" />
        <script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/touch-0.2.14.min.js" ></script>
        <script type="text/javascript" src="js/gloab.js" ></script>
        <script type="text/javascript" src="js/edit_demand.js" ></script>

    </head>
    <body>
        <div class="edit_box">
            <header class="header_top iconfont icon-logo">
                    <!--<input id="ipt" type="text" value="0" />-->
                <span class="top_right iconfont icon-gongneng"></span>
            </header>
            <section class="down_right">
                <ul>
                    <li><a href="<?php echo Url::toRoute('/index/index'); ?>">首页</a></li>
                    <li><a href="<?php echo Url::toRoute('/designer/list'); ?>">住艺设计师</a></li>
                    <li><a href="designer_list.html">设计指南</a></li>
                    <li><a href="<?php echo Url::toRoute('/order/list'); ?>">我的住艺</a></li>
                    <li><a href="designer_list.html">更多意见</a></li>
                    <li>   <?php if ($session->get('user_id')) { ?>
                            <a href="<?php echo Url::toRoute('/user/loginout'); ?>">暂时登出</a>

                        <?php } else { ?>

                            <a href = "<?php echo Url::toRoute('/user/login'); ?>">立即登录</a>

                        <?php }; ?>

                    </li>
                </ul>
            </section> 
            <div class="down_right_zd"></div>  

            <div class="edit">

                <div class="submit_box">
                    <div class="edit_top">
                        需求单：4235
                    </div>
                    <div class="edit_here">
                        <span class="here_title">主要服务的城市</span>
                        <span class="here_meng">北京</span>
                    </div>
                    <div class="edit_here">
                        <span class="here_title">房型</span>
                        <span class="here_meng">平房</span>
                    </div>
                    <div class="edit_here">
                        <span class="here_title">平米数</span>
                        <span class="here_meng">100m²</span>
                    </div>

                    <div class="edit_here">
                        <span class="here_title">装修时间</span>
                        <span class="here_meng">我不是很着急</span>
                    </div>
                    <div class="edit_here">
                        <span class="here_title">施工对接</span>
                        <span class="here_meng">设计</span>
                    </div>
                    <div class="edit_here">
                        <span class="here_title">项目预算</span>
                        <span class="here_meng">20万</span>
                    </div>
                    <div class="edit_here">
                        <span class="here_title">设计类型</span>
                        <span class="here_meng">设计大师</span>
                    </div>
                    <span class="fill_more">填写更多需求清单</span>
                    <?= Html::beginForm('', 'post', ['id' => 'form-additional']); ?>

                    <input class="dema_ipt" type="text" name="compound" placeholder="请填写居住的小区名称" />
                    <div class=" submit_here">
                        <span class="here_a">请上传户型图、房屋照片</span>
                        <span class="here_b">（上传png、jpg格式，不大于4M图片）</span>
                        <div class="here_img_box">
                            <input type="hidden" value="" name='home' class="home" />
                            <ul id="ula">
                                <li class="add_img iconfont icon-tianjia"></li>
                            </ul>
                        </div>
                    </div>

                    <div class=" submit_here submit_herea">
                        <span class="here_a">请上传已收集的理想之家</span>
                        <span class="here_b">（上传png、jpg格式，不大于4M图片）</span>
                        <div class="here_img_box">
                            <input type="hidden" value="" name="like" class="like" />
                            <ul id="ulb">
                                <li class="add_img iconfont icon-tianjia"></li>
                            </ul>
                        </div>
                    </div>

                    <div class="type_list">
                        <span class="here_a" style=" float: left; width: 100%; margin-bottom: .3rem;">对于空间，我尤其注重（可复选）</span>
                        <input type="hidden" name="project_tags" id="project_tags" value="" />
                        <div>
                            <span class="left_sp list_spa"><i class="iconfont <?php if(in_array('灯光及光氛围', $project_tags_arr)){echo "icon-xuanzhong";}else {echo "icon-weixuanzhong";} ?>"></i>灯光及光氛围</span>
                            <span class="right_sp list_spa"><i class="iconfont <?php if(in_array('儿童房的设计', $project_tags_arr)){echo "icon-xuanzhong";}else {echo "icon-weixuanzhong";} ?>"></i>儿童房的设计</span>
                        </div>
                        <div>
                            <span class="left_sp list_spa"><i class="iconfont <?php if(in_array('施工团队是否可靠', $project_tags_arr)){echo "icon-xuanzhong";}else {echo "icon-weixuanzhong";} ?>"></i>施工团队是否可靠</span>
                            <span class="right_sp list_spa"><i class="iconfont <?php if(in_array('家具和材料的环保性', $project_tags_arr)){echo "icon-xuanzhong";}else {echo "icon-weixuanzhong";} ?>"></i>家具和材料的环保性</span>
                        </div>
                        <div>
                            <span class="left_sp list_spa"><i class="iconfont <?php if(in_array('收纳整理空间', $project_tags_arr)){echo "icon-xuanzhong";}else {echo "icon-weixuanzhong";} ?>"></i>收纳整理空间</span>
                            <span class="right_sp list_spa"><i class="iconfont <?php if(in_array('家庭成员彼此拥有相对独立空间', $project_tags_arr)){echo "icon-xuanzhong";}else {echo "icon-weixuanzhong";} ?>"></i>家庭成员彼此拥有相对独立空间</span>
                        </div>
                        <div>
                            <span class="left_sp list_spa"><i class="iconfont <?php if(in_array('艺术品、收藏品的巧妙应用', $project_tags_arr)){echo "icon-xuanzhong";}else {echo "icon-weixuanzhong";} ?>"></i>艺术品、收藏品的巧妙应用</span>
                            <span class="right_sp list_spa"><i class="iconfont <?php if(in_array('与众不同的个性化之家', $project_tags_arr)){echo "icon-xuanzhong";}else {echo "icon-weixuanzhong";} ?>"></i>与众不同的个性化之家</span>
                        </div>
                    </div>
                    <textarea class="text_box"  name="description" id="answer-for-q-3" rows="10" placeholder="更多个性化需求，在这里告诉住艺吧！"></textarea>
                    <button class="chose_btn zhihui" type="submit"  style="border: none;">
                        完成！立刻查看设计师！
                    </button>
                    <?= Html::endForm(); ?>

                </div>

            </div>

        </div>	
    </body>
</html>