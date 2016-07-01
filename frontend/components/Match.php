<?php

namespace app\components;

class Match {

    //$pro 用户需求
    //$des 设计师需求
    public function assigns($ProModel, $DesModel) {

        if ($ProModel->didian == $DesModel->didian && $ProModel->fuwu == $DesModel->fuwu) {

            //是否为黄色区域
            $huangse = 0;
            if ($p->mianji * 1.1 >= $d->mianji && $p->yusuan * 1.5 >= $d->yusuan) {
                //合理浮动 面积10%以内  预算50%以内
                //计算分数
                //面积计算
                $mianjiscore = $p->mianji / $d->mianji > 1 ? 1 : (49 + $p->mianji / $d->mianji) / 50;

                //预算计算
                $yusuanscore = $p->yusuan / $d->yusuan > 1 ? 1-($p->yusuan - $d->yusuan) / $d->yusuan * 0.01 : 1-(1-$p->yusuan / $d->yusuan) * 0.02;

                //风格计算
                $num = count(array_intersect($p, $d));
                switch ($num) {
                    case 0:
                        $fenggescore = 0.85;
                        break;
                    case 1:
                        $fenggescore = 0.9;
                        break;
                    case 2:
                        $fenggescore = 0.95;
                        break;
                    case 3:
                        $fenggescore = 1;
                        break;
                    default :
                        $fenggescore = 1;
                }

                //配合度
                switch ($d->manyidu) {
                    case 0:
                        $peihescore = 0.85;
                        break;
                    case 1:
                        $peihescore = 0.9;
                        break;
                    case 2:
                        $peihescore = 0.95;
                        break;
                    case 3:
                        $peihescore = 1;
                        break;
                    default :
                        $peihescore = 1;
                }
            } else {
                //已超出进入黄色部分生成数组 
                $huangse = 100;
            }

            //设计设总分
            //如是黄色总分为负的
            $cscore = $mianjiscore + $yusuanscore + $fenggescore + $peihescore - $huangse;
            return $cscore;
        }
    }

}
?>

