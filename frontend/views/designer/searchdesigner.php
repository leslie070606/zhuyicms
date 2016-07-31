
<?php
use yii\helpers\Url;
foreach ($data as $designer) { ?>
    <a href="<?php echo Url::toRoute(['/designer/detail','params' => $designer['id']]); ?>">
        <div class="here_bottom line_center">
            <div class="here_head">
                <img src="<?php $db = new frontend\models\DesignerBasic();
    echo Yii::$app->params['frontDomain'] . $db->getHeadPortrait($designer['id']); ?>" />

            </div>

            <div class="bottom_name">
                <span class="here_name"><?= $designer->name ?></span><span class="here_namea"><?php $dwork = new backend\models\DesignerWork();
                $dwmodel = $dwork->find()->where(['designer_id'=>$designer['id']])->one();if($dwmodel){echo $dwmodel->city;} ?></span>
            </div>
            <div class="bottom_label bottom_referral">
                <?php
                $tagArr = explode(',', $designer['tag']);
                if (count($tagArr) > 1) {
                    foreach ($tagArr as $v) {
                        ?>
                        <span><?= $v ?></span>

                        <?php
                    }
                } else {
                    ?>
                    <span><?= $designer['tag'] ?></span>

    <?php } ?>
            </div>

        </div>
    </a>
<?php } ?>
