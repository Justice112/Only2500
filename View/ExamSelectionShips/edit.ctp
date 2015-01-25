<div class="examSelectionShips form">
<?php echo $this->Form->create('ExamSelectionShip'); ?>
	<fieldset>
		<legend><?php echo __('编辑考试题目'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('exam_id');
		echo $this->Form->input('selection_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('删除该题目'), array('action' => 'delete', $this->Form->value('ExamSelectionShip.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ExamSelectionShip.id'))); ?></li>
		<li><?php echo $this->Html->link(__('考试题目信息'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('考试信息 '), array('controller' => 'exams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('添加考试信息'), array('controller' => 'exams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('题目信息'), array('controller' => 'selections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('添加题目'), array('controller' => 'selections', 'action' => 'add')); ?> </li>
	</ul>
</div>
