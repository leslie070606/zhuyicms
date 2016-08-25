<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\util;

class Test {
    
    public function __construct() {
        ;
    }
    
    public function testS(){
        echo '123123';
    }
    
    public function writeData(){
        $_arr = ['1','2','3','4'];
        $fileCacheObj = new \yii\caching\FileCache();
        
        $fileCacheObj->set('123123123', $_arr);
        var_dump($fileCacheObj->get('123'));
    }
}