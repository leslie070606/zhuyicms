<?php

namespace common\util;

class DataCount {

    public static $_dataCountTypeArr = [
        '1' => '需求题',
        '2' => '按钮',
        '3' => '页面',
        '4' => '设计师',
        '5' => '转化率',
        '6' => '风格统计',
    ];
    public static $_dataCountDetailArr = [
        '1' => [
            '1001' => '第1题',
            '1002' => '第2题',
            '1003' => '第3题',
            '1004' => '第4题',
            '1005' => '第5题',
            '1006' => '第6题',
            '1007' => '第7题'
        ],
        '2' => [
            '2001' => '细节需求页”完成“按钮',
            '2002' => '细节需求页”稍后再填“按钮',
            '2003' => '匹配设计师列表页”人工匹配“按钮',
            '2004' => '匹配设计师列表页”提交“点击',
            '2005' => '立即约见按钮',
            '2006' => 'BOT弹出框继续按钮',
            '2007' => '侧边栏”住艺设计师“点击',
            '2008' => '页尾”工装项目“按钮',
            '2009' => '“装修设计”按钮',
            '2010' => '“庭院景观”按钮',
            '2011' => '“工装设计”按钮',
            '2012' => '页首“找设计师”按钮点击',
        ],
        '3' => [
            '3001' => '细节需求页面加载量',
            '3002' => '匹配设计师列表页加载量',
            '3003' => '主页面加载量'
        ],
        '4' => [
            '4001' => '“选择该设计师”按钮',
            '4002' => '设计师被浏览',
            '4003' => '所有设计师被收藏总和',
            '4004' => '所有订单总和',
            '4005' => '设计师被浏览总和'
        ],
        '5' => [
            '5001' => '细节需求页转化率',
            '5002' => '匹配需求页转化率',
        ],
        '6' => [
            '6001' => '第1题',
            '6002' => '第2题',
            '6003' => '第3题',
            '6004' => '第4题',
            '6005' => '第5题',
            '6006' => '第6题',
            '6007' => '第7题',
            '6008' => '第8题',
            '6009' => '第9题',
            '6010' => '第10题',
            '6011' => '第11题',
            '6012' => '第12题',
            '6013' => '第13题',
            '6014' => '第14题',
            '6015' => '结果页再测一次',
            '6016' => '查看分享页按钮',
            '6017' => '初始页加载量',
            '6018' => '初始页开始按钮',
            '6019' => '查看其它分格按钮',
            '6020' => '美式风格点击',
            '6021' => '现代风格点击',
            '6022' => '中古风格点击',
            '6023' => '工业风格点击',
            '6024' => '波西风格点击',
            '6025' => '日式风格点击',
            '6026' => '中式风格点击',
            '6027' => '欧式风格点击',
            '6028' => '美式总数',
            '6029' => '波西总数',
            '6030' => '现代总数',
            '6031' => '日式总数',
            '6032' => '中古总数',
            '6033' => '中式总数',
            '6034' => '工业总数',
            '6035' => '欧式总数',
            '6036' => '分享到朋友圈总数',
            '6037' => '分享到朋友',
        ],
    ];

    /**
     * 获取数据统计主分类，默认返回为JSON格式
     * @param sring $_key
     * @param int $_jsonData
     * @return json/array/null   default json
     */
    public static function getMainType($_key = '', $_jsonData = 1) {
        $_tmp = NULL;
        if ($_key) {
            $_tmp = isset(self::$_dataCountTypeArr[$_key]) ? self::$_dataCountTypeArr[$_key] : NULL;
        } else {
            $_tmp = self::$_dataCountTypeArr;
        }

        if ($_jsonData) {
            return json_encode($_tmp);
        } else {
            return $_tmp;
        }
    }

    /**
     * 获取主分类的详情列表项数据 默认JSON格式
     * @param int $_key
     * @param int $_chilKey
     * @param int $_jsonData
     * @return type
     */
    public static function getMainTypeDetail($_key = '', $_chilKey = '', $_jsonData = 1) {
        $_tmp = NULL;
        if ($_key) {
            $_tmp = isset(self::$_dataCountDetailArr[$_key]) ? self::$_dataCountDetailArr[$_key] : NULL;
            if ($_chilKey) {
                $_tmp = isset(self::$_dataCountDetailArr[$_key][$_chilKey]) ? self::$_dataCountDetailArr[$_key][$_chilKey] : NULL;
            }
        } else {
            $_tmp = self::$_dataCountDetailArr;
            if ($_chilKey) {
                $_tmp = self::getDetail($_chilKey, 0);
            }
        }

        if ($_jsonData) {
            return json_encode($_tmp);
        } else {
            return $_tmp;
        }
    }

    /**
     * 
     * 查询主分类详情单个列表项名称
     * @param int $_chilKey
     * @param int $_jsonData
     * @return json/array/null
     */
    private static function getDetail($_chilKey, $_jsonData = 1) {
        $_tmp = NULL;
        foreach (self::$_dataCountDetailArr as $k => $v) {
            if (isset($v[$_chilKey])) {
                $_tmp = $v[$_chilKey];
                break;
            }
        }

        if ($_jsonData) {
            return json_encode($_tmp);
        } else {
            return $_tmp;
        }
    }

}
