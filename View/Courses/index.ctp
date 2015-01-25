<div class="courses index">
	<h2><?php echo __('科目信息'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id','ID'); ?></th>
			<th><?php echo $this->Paginator->sort('name','名称'); ?></th>
			<th><?php echo $this->Paginator->sort('exam_time','考试时间'); ?></th>
			<th><?php echo $this->Paginator->sort('ecam_number','考试题数'); ?></th>
			<th><?php echo $this->Paginator->sort('open_score','是否公开分数'); ?></th>
			<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($courses as $course): ?>
	<tr>
		<td><?php echo h($course['Course']['id']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['name']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['exam_time']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['selection_number']); ?>&nbsp;</td>
		<td><?php 
				if($course['Course']['open_score']) {
					echo '是';
				}
				else {
					echo '否';
				}
			 ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('查看'), array('action' => 'view', $course['Course']['id'])); ?>
			<?php echo $this->Html->link(__('编辑'), array('action' => 'edit', $course['Course']['id'])); ?>
			<?php echo $this->Form->postLink(__('删除'), array('action' => 'delete', $course['Course']['id']), array(), __('您确定要删除 # %s吗?', $course['Course']['name'])); ?>
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
	<h3><?php echo __('科目管理'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('添加科目'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'admins','action' => 'index')); ?></li>
	</ul>
</div>
