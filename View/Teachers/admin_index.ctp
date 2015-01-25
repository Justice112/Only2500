<div class="teachers index">
	<h2><?php echo __('教师列表'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID'); ?></th>
			<th><?php echo $this->Paginator->sort('姓名'); ?></th>
			<th><?php echo $this->Paginator->sort('用户名'); ?></th>
			<th><?php echo $this->Paginator->sort('密码'); ?></th>
			<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($teachers as $teacher): ?>
	<tr>
		<td><?php echo h($teacher['Teacher']['id']); ?>&nbsp;</td>
		<td><?php echo h($teacher['Teacher']['name']); ?>&nbsp;</td>
		<td><?php echo h($teacher['Teacher']['username']); ?>&nbsp;</td>
		<td><?php echo h($teacher['Teacher']['password']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('查看'), array('action' => 'adminView', $teacher['Teacher']['id'])); ?>
			<?php echo $this->Html->link(__('编辑'), array('action' => 'adminEdit', $teacher['Teacher']['id'])); ?>
			<?php echo $this->Form->postLink(__('删除'), array('action' => 'adminDelete', $teacher['Teacher']['id']), array(), __('您确定要删除  %s 吗?', $teacher['Teacher']['name'])); ?>
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
	<h3><?php echo __('教师管理'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('添加教师'), array('action' => 'adminAdd')); ?></li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'admins','action' => 'index')); ?></li>
	</ul>
</div>
