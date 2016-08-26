<?php
	use yii\helpers\Url;
?>
<p style="text-align:right;">
	<a href="<?=Url::to(['add'])?>" class="btn btn-primary">添加</a>
</p>

<table class="table table-hover">
<tr>
	<th>标题</th>
</tr>
<?php foreach($data as $v){?>
<tr>
	<td>

    <!--a 连接 onclick="remove_todo(url) 更改读取状态 "-->
    <!--判断连接是否点击-->
    <?php if($v->link):?>

        <!--判断状态是否可读-->
        <?php if($v->status == 1):?>

            <a href="<?php echo Url::to(["$v->link"]);?>" onclick="remove_todo('<?php echo Url::to(['todoid', 'id' => $v->id]);?>')"><?=$v->contents?></a>

        <?php else:?>

            <a href="javascript:void(0)" onclick="remove_todo('<?php echo Url::to(['todoid', 'id' => $v->id]);?>')"><?=$v->contents?></a>

        <?php endif;?>
    <?php else:?>

        <a href="javascript:void(0)" onclick="remove_todo('<?php echo Url::to(['todoid', 'id' => $v->id]);?>')"><?=$v->contents?></a>

    <?php endif;?>
     </td>

</tr>
<?php }?>
</table>
<div style="float:right;">
<?=\yii\widgets\LinkPager::widget([
	'pagination' => $pagination,
	'options' => [
		'class' => 'pagination',
		]
]);?>
</div>

<script>

    //消除alert任务
    function remove_todo(url){
		if(!url)  return false;
	 	//ajax 更改未读状态 ，变成已读
        $.ajax({
                url: url,
                type: 'post',
                success: function (data) {
                    //alert(data);
                }
            });
    }
	//定时执行任务，刷新本页面
    function todo_reload(){
		location.reload();
	}
  	//10秒执行刷新消息通知
    setInterval('todo_reload()',10000);
</script>
