<div class="selectionStudentShips form">
<?php echo $this->Form->create('SelectionStudentShip'); ?>
	<fieldset>
		<legend><?php echo __('Edit Selection Student Ship'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('student_id');
		echo $this->Form->input('selection_id');
		echo $this->Form->input('answer');
		echo $this->Form->input('exam_student_ship_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SelectionStudentShip.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('SelectionStudentShip.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Selection Student Ships'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Selections'), array('controller' => 'selections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selection'), array('controller' => 'selections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Exam Student Ships'), array('controller' => 'exam_student_ships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exam Student Ship'), array('controller' => 'exam_student_ships', 'action' => 'add')); ?> </li>
	</ul>
</div>
