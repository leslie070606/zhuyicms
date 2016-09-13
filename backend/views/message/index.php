<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = '客服通知';
$this->params['breadcrumbs'][] = $this->title;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            *{ margin: 0; padding: 0;}
            .kefu_right { width: 100%; min-width: 500px; font-size: 12px; color: #000000;}
            .mesg_box { height: 200px; overflow-y: auto;border: 1px solid #999999; box-sizing: border-box;}
            .mesg_box tr {width: 100%; }
            .mesg_box tr td { list-style: none; text-align: center;}
            .box_two { width: 47.5%; float: left;}
            .top_name { display: block; width: 100%; font-size: 14px; padding: 10px 0; font-weight: bold;}
            .right_bottom  .top_name { width: 50%; float: left;}
            .bottom_span { width: 100%; border-bottom: 1px solid #999999; height: 36px;}
            .mesg_box th { box-sizing: border-box; border: 1px solid #999999; text-align: center; height: 36px; line-height: 36px;}
            .mesg_box th:last-child { border-right: none;}
        </style>
    </head>
    <body>
        <div class="kefu_right">
            <span class="top_name">最新通知</span>

            <div id="" class="right_top">

                <div class="mesg_box">
                    <ul>
                        <?php
                        if (!empty($data1)) {
                            foreach ($data1 as $t) {
                                if ($t['type'] == 0) {
                                    ?>
                                    <li><a href="<?= yii\helpers\Url::to(['/zyproject/' . $t['project_id']]); ?>"> <?= date("m月d日 H:i", $t['time']); ?>&nbsp;&nbsp;&nbsp;<?= $t['contents'] ?></a></li>
                                    <?php
                                } else {
                                    ?>
                                    <li><a href="<?= yii\helpers\Url::to(['/zyorder/' . $t['order_id']]); ?>"> <?= date("m月d日 H:i", $t['time']); ?>&nbsp;&nbsp;&nbsp;<?= $t['contents'] ?></a></li>

                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>	
            </div>

            <div id="" class="right_bottom">
                <span class="top_name">未处理需求</span>
                <span class="top_name" style="text-indent: 2.5%;">未处理订单</span>
                <div class="mesg_box box_two" style="margin-right: 5%;">
                    <table width="100%" cellpaddin="0" cellspacing="0">
                        <tr>
                            <th>时间</th>
                            <th>消息</th>
                            <th>项目编号</th>
                            <th>操作</th>
                        </tr>
                        <?php
                        if (!empty($data2)) {
                            foreach ($data2 as $t) {
                                ?>
                                <tr>
                                    <td><?= date("m月d日 H:i", $t['time']) ?></td>
                                    <td><?= $t['contents'] ?></td>
                                    <td><a href="<?= yii\helpers\Url::to(['/zyproject/' . $t['project_id']]); ?>"><?= $t['project_id'] ?></a></td>
                                    <td><a href="javascript:del(<?= $t['id']; ?>,0);">标记为处理</a></td>
                                </tr>

                                <?php
                            }
                        }
                        ?>
                    </table>
                </div>	

                <div class="mesg_box box_two">
                    <table width="100%" cellpaddin="0" cellspacing="0">
                        <tr>
                            <th>时间</th>
                            <th>消息</th>
                            <th>订单编号</th>
                            <th>操作</th>
                        </tr>
                        <?php
                        if (!empty($data3)) {
                            foreach ($data3 as $t) {
                                ?>
                                <tr>
                                    <td><?= date("m月d日 H:i", $t['time']) ?></td>
                                    <td><?= $t['contents'] ?></td>
                                    <td><a href="<?= yii\helpers\Url::to(['/zyorder/' . $t['order_id']]); ?>"><?= $t['order_id'] ?></a></td>
                                    <td><a href="javascript:del(<?= $t['id']; ?>,1);">标记为处理</a></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                </div>	
            </div>
        </div>
    </body>
</html>

<form action="" id="delForm" method="post">
    <input type="hidden" value="<?php echo Yii::$app->getRequest()->getCsrfToken(); ?>" name="_csrf" />
</form>
<script>
    var _delUrl = '<?= \yii\helpers\Url::to(['/message/updatemsgstatus']); ?>';
    var del = function (i, type) {
        if (confirm('确定标记为已处理吗？')) {
            $('#delForm').attr('action', _delUrl + '?id=' + i + '&&type=' + type);
            $('#delForm').submit();
        } else {

        }
    }
</script>
