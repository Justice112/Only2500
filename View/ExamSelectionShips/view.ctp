<div class="examSelectionShips view">
<h2><?php echo __('查看考试题目'); ?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($examSelectionShip['ExamSelectionShip']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('考试'); ?></dt>
		<dd>
			<?php echo $this->Html->link($examSelectionShip['Exam']['id'], array('controller' => 'exams', 'action' => 'view', $examSelectionShip['Exam']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('题目'); ?></dt>
		<dd>
			<?php echo $this->Html->link($examSelectionShip['Selection']['id'], array('controller' => 'selections', 'action' => 'view', $examSelectionShip['Selection']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('考试信息管理'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('编辑该考试题目'), array('action' => 'edit', $examSelectionShip['ExamSelectionShip']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('删除该考试题目'), array('action' => 'delete', $examSelectionShip['ExamSelectionShip']['id']), array(), __('Are you sure you want to delete # %s?', $examSelectionShip['ExamSelectionShip']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('考试题目信息表'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('添加考试题目'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('考试信息'), array('controller' => 'exams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('添加考试信息'), array('controller' => 'exams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('题目'), array('controller' => 'selections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('添加题目'), array('controller' => 'selections', 'action' => 'add')); ?> </li>
	</ul>
</div>
