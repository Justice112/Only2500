<div class="examSelectionShips index">
	<h2><?php echo __('考试相关题目'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID'); ?></th>
			<th><?php echo $this->Paginator->sort('考试信息'); ?></th>
			<th><?php echo $this->Paginator->sort('题目信息'); ?></th>
			<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($examSelectionShips as $examSelectionShip): ?>
	<tr>
		<td><?php echo h($examSelectionShip['ExamSelectionShip']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($examSelectionShip['Exam']['id'], array('controller' => 'exams', 'action' => 'view', $examSelectionShip['Exam']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($examSelectionShip['Selection']['id'], array('controller' => 'selections', 'action' => 'view', $examSelectionShip['Selection']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('查看'), array('action' => 'view', $examSelectionShip['ExamSelectionShip']['id'])); ?>
			<?php echo $this->Html->link(__('编辑'), array('action' => 'edit', $examSelectionShip['ExamSelectionShip']['id'])); ?>
			<?php echo $this->Form->postLink(__('删除'), array('action' => 'delete', $examSelectionShip['ExamSelectionShip']['id']), array(), __('Are you sure you want to delete # %s?', $examSelectionShip['ExamSelectionShip']['id'])); ?>
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
	<h3><?php echo __('操作'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('添加考试题目'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('考试信息'), array('controller' => 'exams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('添加考试信息'), array('controller' => 'exams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('选择题目列表'), array('controller' => 'selections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('添加选择题目'), array('controller' => 'selections', 'action' => 'add')); ?> </li>
	</ul>
</div>
