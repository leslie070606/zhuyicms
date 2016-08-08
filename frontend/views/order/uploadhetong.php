<?php

use kartik\file\FileInput;
use yii\helpers\Url;
?>
<head>
    <link rel="stylesheet" href="css/gloab.css" />
</head>
<body onload="window.parent.document.getElementsByClassName('yijianmian')[0].height=document.body.scrollHeight;">
    
<ul class="hetong_box">
    <?php
    echo FileInput::widget([
        'model' => $model,
        'attribute' => 'contract[]',
        'name' => 'ImgSelect',
        'language' => 'zh-CN',
        'options' => ['multiple' => true, 'accept' => 'image/*'],
        'pluginOptions' => [

            'initialPreview' => $imgurl,
            // 'initialPreviewConfig' => $initialPreviewConfig,  
            'allowedPreviewTypes' => ['image'],
            'allowedFileExtensions' => ['jpg', 'gif', 'png', 'jpeg'],
            'previewFileType' => 'image',
            'initialPreviewAsData' => true, // 是否展示预览图
            'initialPreviewConfig' => $initialPreview,
            'overwriteInitial' => false,
            'browseLabel' => '选择图片',
            'msgFilesTooMany' => "选择上传的图片数量({n}) 超过允许的最大图片数{m}！",
            'dropZoneTitle' => '点击上传文件...',
            'maxFileCount' => 12, //允许上传最多的图片5张  
            'maxFileSize' => 10000, //限制图片最大200kB  
            'uploadUrl' => Url::to(['/order/uploadimage']), //异步上传接口地址
            'uploadExtraData' => ['project_id' => $model->project_id],
            // 是否显示上传按钮，指input上面的上传按钮，非具体图片上的上传按钮
            'showUpload' => false,
            // 展示图片区域是否可点击选择多文件
            'browseOnZoneClick' => true,
            'uploadAsync' => TRUE, //配置异步上传还是同步上传  
            // 如果要设置具体图片上的移除、上传和展示按钮，需要设置该选项
            'fileActionSettings' => [
                // 设置具体图片的查看属性为false,默认为true
                'showZoom' => FALSE,
                // 设置具体图片的上传属性为true,默认为true
                'showUpload' => TRUE,
                // 设置具体图片的移除属性为true,默认为true
                'showRemove' => TRUE,
               
            ],
        ],
    ]);
    ?>
</ul>
<div class="true_time queren_btn hetong_btn">
    <span class="true_btnb hetong">上传合同</span>
</div>
</body>