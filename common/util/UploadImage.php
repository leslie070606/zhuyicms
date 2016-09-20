<?php

namespace common\util;

/**
 * 
 * 图片流上传
 * @author 郝帅卫
 * @date 2016-09-19
 * 
 */
class UploadImage {

    /**
     * 上传到图片服务器方法，成功返回为json，失败为false
     * @param stream $file  post的file文件流
     * @return boolean or json
     */
    public static function uploadImgStream($file = NULL) {
        if (!$file) {
            return false;
        }
        $f = $file ['tmp_name'];
        if (!$f) {
            return false;
        }
        $imgType = $file ['type'];
        $fileSize = filesize($f);
        $pictureData = fread(fopen($f, "r"), $fileSize);
        $fileType = explode('/', $imgType);
        $head = array("Content-Type:" . $fileType ['1']);
        $res = \common\util\CurlExt::getHttpPostRes($pictureData, "http://img.zy.zhuyidesign.com:4869/", $head);
        return $res;
    }

}
