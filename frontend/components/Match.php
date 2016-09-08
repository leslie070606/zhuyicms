<?php

namespace app\components;

class Match {

    //$pro 用户需求
    //$des 设计师需求
    public function assigns($ProArr, $DesArr, $user_id) {

        //完全不符合标准的设计师
        //if ($ProModel->didian == $DesModel->didian && $ProModel->fuwu == $DesModel->fuwu) {
        if (true) {

            //是否为黄色区域
            $huangse = 0;
            $mianjiscore = ''; //面积
            $pro_budget = ''; //用户预算
            $des_budget = ''; //设计师收费

            $peihescore = ''; //配合度
            //用户的预算
            if ($ProArr['budget_design']) {
                $pro_budget = $ProArr['budget_design'];
                $des_budget = $DesArr['charge'] ? $DesArr['charge'] : 1;
            } else {
                $pro_budget = $ProArr['budget_design_work'];
                $des_budget = $DesArr['charge_work'] ? $DesArr['charge_work'] : 1;
            }

            //用户面积不能为零
            $ProArr['covered_area'] = $ProArr['covered_area'] ? $ProArr['covered_area'] : 1;

            //用户预算
            $pro_budget = $pro_budget * 10000; //以万为单位

            $pro_budget = $pro_budget / $ProArr['covered_area']; //用户每平米预算

            if (!$DesArr['accept_area']) {
                $DesArr['accept_area'] = 0;
            }

            // 完全符合
            if ($ProArr['covered_area'] >= $DesArr['accept_area'] && $pro_budget >= $des_budget) {

                //绿色
                //计算分数
                //面积计算
                $mianjiscore = 1;
                if ($ProArr['covered_area'] && $DesArr['accept_area']) {
                    $mianjiscore = $ProArr['covered_area'] / $DesArr['accept_area'] > 1 ? 1 : (49 + $ProArr['covered_area'] / $DesArr['accept_area']) / 50;
                }

                //预算计算
                $yusuanscore = 0;
                if ($pro_budget && $des_budget) {
                    $yusuanscore = $pro_budget / $des_budget > 1 ? 1 - ($pro_budget - $des_budget) / $des_budget * 0.01 : 1 - (1 - $pro_budget / $des_budget) * 0.02;
                }

                // 计算设计师的风格得分
                // 用户所选风格
                // 
//                $pstyle = '';
//                
//                //设计师风格
//                $dstyle = '';
//                //判断是否已经有风格测试
//                $styleModel = new \common\models\Style();
//                $userStyle = $styleModel->findOne(['user_id' => $userId]);
//                if (count($userStyle) > 0) {
//                    $pstyle = explode('$', $userStyle['choice_style']);
//                }
//                
//                $dstyle = explode(',',$DesArr['style']);
//                
                // $pstyle = 
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
                //$huangse = 100;
            }
            //黄色浮动
            else if ($ProArr['covered_area'] * 1.1 >= $DesArr['accept_area'] && $pro_budget * 1.15 >= $des_budget) {

                //合理浮动 面积10%以内  预算50%以内 黄色部分
                //计算分数
                //面积计算
                $mianjiscore = 1;
                if ($ProArr['covered_area'] && $DesArr['accept_area']) {
                    $mianjiscore = $ProArr['covered_area'] / $DesArr['accept_area'] > 1 ? 1 : (49 + $ProArr['covered_area'] / $DesArr['accept_area']) / 50;
                }

                //预算计算
                $yusuanscore = 0;
                if ($pro_budget && $des_budget) {
                    $yusuanscore = $pro_budget / $des_budget > 1 ? 1 - ($pro_budget - $des_budget) / $des_budget * 0.01 : 1 - (1 - $pro_budget / $des_budget) * 0.02;
                }
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
                $huangse = 100;
            } else {
                //红色的部分 
                //面积计算
                $mianjiscore = 1;
                if ($ProArr['covered_area'] && $DesArr['accept_area']) {
                    $mianjiscore = $ProArr['covered_area'] / $DesArr['accept_area'] > 1 ? 1 : (49 + $ProArr['covered_area'] / $DesArr['accept_area']) / 50;
                }

                //预算计算
                $yusuanscore = 0;
                if ($pro_budget && $des_budget) {
                    $yusuanscore = $pro_budget / $des_budget > 1 ? 1 - ($pro_budget - $des_budget) / $des_budget * 0.01 : 1 - (1 - $pro_budget / $des_budget) * 0.02;
                }

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

                $huangse = 1000;
            }

            //设计设总分
            //如是黄色总分为负的
            //$cscore = $mianjiscore + $yusuanscore + $fenggescore + $peihescore - $huangse;
            $cscore = $mianjiscore + $yusuanscore + $peihescore - $huangse;
//            if ($DesArr['designer_id'] == 50) {
//                echo 'mianjiscore:' . $mianjiscore . '#####' . 'yusuanscore:' . $yusuanscore . "####" . 'peihescore:' . $peihescore;
//                exit;
//            }
            return round($cscore, 4);
        }
    }

}
?>

