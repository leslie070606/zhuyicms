<?php

namespace app\components;

class Match {

    //$pro 用户需求
    //$des 设计师需求
    public function assigns($ProArr, $DesArr) {
        
        
        //完全不符合标准的设计师
        //if ($ProModel->didian == $DesModel->didian && $ProModel->fuwu == $DesModel->fuwu) {
        if (true) {

            //是否为黄色区域
            $huangse = 0;
            $mianjiscore = ''; //面积
            $pro_budget = ''; //用户预算
            $des_budget = ''; //设计师收费

            $peihescore = ''; //配合度
            if ($ProArr['budget_design']) {
                $pro_budget = $ProArr['budget_design'];
                $des_budget = $DesArr['charge'];
            } else {
                $pro_budget = $ProArr['budget_design_work'];
                $des_budget = $DesArr['charge_work'];
            }
            //Ïif ($p->mianji * 1.1 >= $d->mianji && $p->yusuan * 1.5 >= $d->yusuan) {
            if ($ProArr['covered_area'] * 1.1 >= $DesArr['accept_area'] && $pro_budget * 1.5 >= $des_budget) {

                //合理浮动 面积10%以内  预算50%以内
                //计算分数
                //面积计算
                $mianjiscore = $ProArr['covered_area'] / $DesArr['accept_area'] > 1 ? 1 : (49 + $ProArr['covered_area'] / $DesArr['accept_area']) / 50;

                //预算计算
                $yusuanscore = $pro_budget / $des_budget > 1 ? 1 - ($pro_budget - $des_budget) / $des_budget * 0.01 : 1 - (1 - $pro_budget / $des_budget) * 0.02;
                //风格计算
//                $num = count(array_intersect($p, $d));
//                switch ($num) {
//                    case 0:
//                        $fenggescore = 0.85;
//                        break;
//                    case 1:
//                        $fenggescore = 0.9;
//                        break;
//                    case 2:
//                        $fenggescore = 0.95;
//                        break;
//                    case 3:
//                        $fenggescore = 1;
//                        break;
//                    default :
//                        $fenggescore = 1;
//                }
//              //配合度
                switch ($DesArr['matching']) {
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
                $mianjiscore = $ProArr['covered_area'] / $DesArr['accept_area'] > 1 ? 1 : (49 + $ProArr['covered_area'] / $DesArr['accept_area']) / 50;
                $yusuanscore = $pro_budget / $des_budget > 1 ? 1 - ($pro_budget - $des_budget) / $des_budget * 0.01 : 1 - (1 - $pro_budget / $des_budget) * 0.02;

                //配合度
                switch ($DesArr['matching']) {
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
                
                $huangse = 100;
            }

            //设计设总分
            //如是黄色总分为负的
            //$cscore = $mianjiscore + $yusuanscore + $fenggescore + $peihescore - $huangse;
            $cscore = $mianjiscore + $yusuanscore + $peihescore - $huangse;

            return round($cscore,4);
        }
    }

}
?>

