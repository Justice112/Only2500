<div class="classrooms index">
	<h2><?php echo __('班级列表'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id','ID'); ?></th>
			<th><?php echo $this->Paginator->sort('name','班级名'); ?></th>
			<th><?php echo $this->Paginator->sort('grade_id','年级'); ?></th>
			<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($classrooms as $classroom): ?>
	<tr>
		<td><?php echo h($classroom['Classroom']['id']); ?>&nbsp;</td>
		<td><?php echo h($classroom['Classroom']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($classroom['Grade']['name'], array('controller' => 'grades', 'action' => 'view', $classroom['Grade']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('查看'), array('action' => 'view', $classroom['Classroom']['id'])); ?>
			<?php echo $this->Html->link(__('编辑'), array('action' => 'edit', $classroom['Classroom']['id'])); ?>
			<?php echo $this->Form->postLink(__('删除'), array('action' => 'delete', $classroom['Classroom']['id']), array(), __('您确定要删除 # %s吗?', $classroom['Classroom']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('当前第 {:page}页 共 {:pages}页, 当前第 {:current}条记录 工{:count}条记录 , 当前开始于第 {:start}条, 结束于第 {:end}条')
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
	<h3><?php echo __('班级管理'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('添加班级'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'admins','action' => 'index')); ?></li>
	</ul>
</div>
