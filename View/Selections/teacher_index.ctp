<div class="selections index">
	<h2><?php echo __('考题列表'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID'); ?></th>
			<th><?php echo $this->Paginator->sort('题目'); ?></th>
			<th><?php echo $this->Paginator->sort('图片'); ?></th>
			<th><?php echo $this->Paginator->sort('选项A'); ?></th>
			<th><?php echo $this->Paginator->sort('选项B'); ?></th>
			<th><?php echo $this->Paginator->sort('选项C'); ?></th>
			<th><?php echo $this->Paginator->sort('选项D'); ?></th>
			<th><?php echo $this->Paginator->sort('正确答案'); ?></th>
			<th><?php echo $this->Paginator->sort('所属科目'); ?></th>
			<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php $i = 1; ?>
	<?php foreach ($selections as $selection): ?>
	<tr>
		<td><?php echo $i++; ?></td>
		<td><?php echo h($selection['Selection']['topic']); ?>&nbsp;</td>
		<td><img src="/images/selectionimg/<?php if ($selection['Selection']['picture']) {echo h($selection['Selection']['picture']);}else {echo "default.jpg";}?>" height="50"></td>
		<td><?php echo h($selection['Selection']['optionA']); ?>&nbsp;</td>
		<td><?php echo h($selection['Selection']['optionB']); ?>&nbsp;</td>
		<td><?php echo h($selection['Selection']['optionC']); ?>&nbsp;</td>
		<td><?php echo h($selection['Selection']['optionD']); ?>&nbsp;</td>
		<td><?php echo h($selection['Selection']['answer']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($selection['Course']['name'], array('controller' => 'courses', 'action' => 'TeacherView', $selection['Course']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('查看'), array('action' => 'TeacherView', $selection['Selection']['id'])); ?>
			<?php echo $this->Html->link(__('编辑'), array('action' => 'TeacherEdit', $selection['Selection']['id'])); ?>
			<?php echo $this->Form->postLink(__('删除'), array('action' => 'TeacherDelete', $selection['Selection']['id']), array(), __('您确定要删除# %s吗?', $selection['Selection']['topic'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('当前第 {:page}页 共 {:pages}页, 当前第 {:current}条记录 共{:count}条记录 , 当前开始于第 {:start}条, 结束于第 {:end}条')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('上一页'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('下一页') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('添加考题'), array('action' => 'TeacherAdd')); ?></li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'teachers','action' => 'index')); ?></li>
	</ul>
</div>
