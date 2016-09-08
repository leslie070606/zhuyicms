<?php

use yii\helpers\Url;
$_cookieSts = \common\controllers\BaseController::checkLoginCookie();

if (isset($model->home_img)) {
    $imgID = explode(',', $model->home_img);
    $imgModel = new \frontend\models\Images();
    $img = $imgModel->findOne($imgID[0]);
}
?>
<?php if ($model) { ?>
    <div class="xuqiu">
        <div class="xuqiu_here">
            <div class="xq_here_top">
                <span class="xq_top_left">我的需求</span><a href="<?= Url::toRoute(['editadditional', 'project_id' => $model->project_id]); ?>"><span class="xq_top_btn">编辑</span></a>
            </div>

            <div class="xuqiu_center">
                <div class="center_here">
                    <span class="here_left">城市</span>
                    <span class="here_right"><?= $model->city ?></span>
                </div>
                <div class="center_here">
                    <span class="here_left">住宅类型</span>
                    <span class="here_right"><?= $model->home_type ?></span>
                </div>
                <div class="center_here">
                    <span class="here_left">建筑面积</span>
                    <span class="here_right"><?= $model->covered_area ?>平米</span>
                </div>
                <div class="center_here">
                    <span class="here_left">开工时间</span>
                    <span class="here_right"><?= $model->work_time ?></span>
                </div>


                <?php
                if ($model->budget_design_work) {
                    ?>
                    <div class="center_here">
                        <span class="here_left">服务类型</span>
                        <span class='here_right'>设计+施工</span>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="center_here">
                        <span class="here_left">服务类型</span>
                        <span class='here_right'>设计</span>
                    </div>
                    <?php
                }
                ?>

                <?php
                if ($model->budget_design_work) {
                    ?>
                    <div class="center_here">
                        <span class="here_left">项目预算</span>
                        <span class='here_right'><?= $model->budget_design_work ?>万</span>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="center_here">
                        <span class="here_left">项目预算</span>
                        <span class='here_right'><?= $model->budget_design ?>万</span>
                    </div>
                    <?php
                }
                ?>

                <?php
                //判断是否有订单
                $orderModel = new frontend\models\Order();
                $order = $orderModel->getOrdersByUserId($model->user_id);
                if (count($order) <= 0) {
                    //var_dump($order);
                    ?>

                    <div class = "center_here" style = "line-height:.7rem; margin-bottom:.4rem">
                        <span class = "" style = "float:right; width:2.4rem; height:.7rem; line-height:.7rem; text-align:center; background:#ff4e38; color:#ffffff;"><a style="color: #ffffff;" href="<?php echo Url::toRoute('project/choose_designer'); ?>">去选设计师</a></span>
                    </div>
                    <?php
                }
                ?>


            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="Blank_Page">
        <span>
            希望获得设计师量身定制的装修方案？<br/>
            快填写<a href="<?php echo Url::toRoute('project/match_designer'); ?>" class="red">需求清单</a>吧！
        </span>

    </div>
<?php } ?>
