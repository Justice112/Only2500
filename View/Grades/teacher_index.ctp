<div class="grades index">
	<h2><?php echo __('年级列表'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID'); ?></th>
			<th><?php echo $this->Paginator->sort('年级名'); ?></th>
			<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($grades as $grade): ?>
	<tr>
		<td><?php echo h($grade['Grade']['id']); ?>&nbsp;</td>
		<td><?php echo h($grade['Grade']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('查看'), array('action' => 'TeacherView', $grade['Grade']['id'])); ?>
			<?php //echo $this->Html->link(__('编辑'), array('action' => 'edit', $grade['Grade']['id'])); ?>
			<?php //echo $this->Form->postLink(__('删除'), array('action' => 'delete', $grade['Grade']['id']), array(), __('您确定要删除 # %s吗？', $grade['Grade']['name'])); ?>
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
	<h3><?php echo __('年级管理'); ?></h3>
	<ul>
		<li><?php //echo $this->Html->link(__('添加年级'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'teachers','action' => 'index')); ?></li>
	</ul>
</div>
