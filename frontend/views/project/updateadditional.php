<?php

use yii\helpers\Url;

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
                    <span class="here_left">使用面积</span>
                    <span class="here_right"><?= $model->use_area ?></span>
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
                        <span class='here_right'>设计</span>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="center_here">
                        <span class="here_left">服务类型</span>
                        <span class='here_right'>设计+施工</span>
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
                        <span class = "" style = "float:right; width:2.4rem; height:.7rem; line-height:.7rem; text-align:center; background:#ff4e38; color:#ffffff;"><a style="color: #ffffff;" href="<?php echo Url::toRoute('project/choose_designer'); ?>">选择设计师</a></span>
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
            你还没有填写预约需求哦<br/>
            详细的需求清单可以让设计师更快给出方案<br /> 
            <a href="<?php echo Url::toRoute('project/match_designer'); ?>" class="red">填写需求</a>
        </span>

    </div>
<?php } ?>