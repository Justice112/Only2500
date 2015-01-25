<div class="examStudentShips form">
<?php echo $this->Form->create('ExamStudentShip'); ?>
	<fieldset>
		<legend><?php echo __('Edit Exam Student Ship'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('exam_id');
		echo $this->Form->input('student_id');
		echo $this->Form->input('grade');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ExamStudentShip.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ExamStudentShip.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Exam Student Ships'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Exams'), array('controller' => 'exams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exam'), array('controller' => 'exams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
	</ul>
</div>
