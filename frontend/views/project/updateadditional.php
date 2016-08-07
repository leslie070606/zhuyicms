<?php

use yii\helpers\Url;
?>
<?php if ($model) { ?>
    <div class="xuqiu">
        <div class="xuqiu_here">
            <div class="xq_here_top">
                <span class="xq_top_left">需求单：<?= $model->project_num ?></span><a href="<?= Url::toRoute(['editadditional', 'project_id' => $model->project_id]); ?>"><span class="xq_top_btn">编辑</span></a>
            </div>
            <div class="xuqiu_center">
                <img class="center_img" src="img/home_page/proa.jpg" />
                <div class="center_here">
                    <span class="here_left">城市：</span>
                    <span class="here_right"><?= $model->city ?></span>
                </div>
                <div class="center_here">
                    <span class="here_left">房型：</span>
                    <span class="here_right"><?= $model->home_type ?></span>
                </div>
                <div class="center_here">
                    <span class="here_left">平米数：</span>
                    <span class="here_right"><?= $model->covered_area ?></span>
                </div>
                <div class="center_here">
                    <span class="here_left">装修时间：</span>
                    <span class="here_right"><?= $model->work_time ?></span>
                </div>
                <div class="here_bott">
                    <?php
                    if ($model->budget_design_work) {
                        echo "设计+施工  预算上限" . $model->budget_design_work . "万 <br/>（包括设计费；施工人工费；辅助／主材费）";
                    } else {
                        echo "设计   预算上限" . $model->budget_design . "万 <br/>";
                    }
                    ?>
                </div>
                <?php
                //判断是否有订单
                $orderModel = new frontend\models\Order();
                $order = $orderModel->getOrdersByUserId($model->user_id);
                if (count($order) <= 0) {
                    //var_dump($order);
                    ?>

                    <div class = "center_here" style = "line-height:.7rem; margin-bottom:.4rem">
                        <span class = "" style = "float:right; width:2.4rem; height:.7rem; line-height:.7rem; text-align:center; background:#ff4e38; color:#ffffff;"><a href="<?php echo Url::toRoute('project/choose_designer'); ?>">选择设计师</a></span>
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