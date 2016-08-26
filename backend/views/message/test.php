<?php
	use yii\helpers\Url;
?>
<p style="text-align:right;">
	<a href="<?=Url::to(['add'])?>" class="btn btn-primary">添加</a>
</p>

<table class="table table-hover">
<tr>
	<th>id</th><th>标题</th><th>url</th><th>类型</th><th>状态</th><th>添加时间</th><th>读取时间</th><th>操作</th>
</tr>
<?php foreach($data as $v){?>
<tr>
	<td><?=$v->id?></td>
	<td><?=$v->contents?></td>
	<td><?=$v->link?></td>

	<td><?=($v->type == '1' ? '前台' : '用户')?></td>
	<td><?=($v->status == '1' ? '已读' : '未读')?></td>
	<td><?=date("Y-m-d H:i:s" ,$v->create_time)?></td>
    <td><?=date("Y-m-d H:i:s" ,$v->update_time)?></td>
	<td><a href="<?=Url::to(['edit' , 'id'=>$v->id])?>">编辑</a> | <a href="<?=Url::to(['delete' , 'id'=>$v->id])?>">删除</a></td>
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
