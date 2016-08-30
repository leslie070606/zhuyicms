<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">完全匹配</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tbody><tr>


                            <th style="width: 40px"> 设计师ID</th>
                            <th style="width: 40px"> 设计师姓名</th>
                            <th style="width: 40px"> 设计师得分</th>
                            <th style="width: 40px"> 操作</th>
                        </tr>


                        <?php
                        $desBasic = new backend\models\DesignerBasic();

//                        echo $pagination->offset."<br>";
//                        echo $pagination->limit;
                        $scoreArr = json_decode($model->match_json, true);
                        //var_dump($scoreArr);exit;
                        $scoreArr = $scoreArr ? $scoreArr : [];
                        foreach ($scoreArr as $sc) {
                            if ($sc['score'] < 0) {
                                continue;
                            }
                            $desBasic = $desBasic->findOne($sc['did']);
                            ?>
                            <tr>
                                <td><?= $sc['did'] ?></td>
                                <td><?= $desBasic['name'] ?></td>
                                <td><?= $sc['score'] ?></td>
                                <td>推荐</td>
                            </tr>
                        <?php } ?>
                    </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <?=
                    \yii\widgets\LinkPager::widget([
                        'pagination' => $pagination,
                        'options' => [
                            'class' => 'pagination',
                        ]
                    ]);
                    ?>
                </ul>
            </div>
        </div>


        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">硬性匹配</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tbody><tr>


                            <th style="width: 40px"> 设计师ID</th>
                            <th style="width: 40px"> 设计师姓名</th>
                            <th style="width: 40px"> 设计师得分</th>
                            <th style="width: 40px"> 操作</th>
                        </tr>


                        <?php
                        $scoreArr = json_decode($model->match_json, true);
                        //var_dump($scoreArr);exit;
                        $scoreArr = $scoreArr ? $scoreArr : [];
                        foreach ($scoreArr as $sc) {
                            if ($sc['score'] < -200 || $sc['score'] > 0) {
                                continue;
                            }
                            $desBasic = $desBasic->findOne($sc['did']);
                            ?>
                            <tr>
                                <td><?= $sc['did'] ?></td>
                                <td><?= $desBasic['name'] ?></td>
                                <td><?= $sc['score'] ?></td>
                                <td>推荐</td>

                            </tr>
                        <?php } ?>
                    </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                </ul>
            </div>
        </div>

    </div>

</div>