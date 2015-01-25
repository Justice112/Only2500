<div class="selectionStudentShips view">
<h2><?php echo __('Selection Student Ship'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($selectionStudentShip['SelectionStudentShip']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Student'); ?></dt>
		<dd>
			<?php echo $this->Html->link($selectionStudentShip['Student']['name'], array('controller' => 'students', 'action' => 'view', $selectionStudentShip['Student']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Selection'); ?></dt>
		<dd>
			<?php echo $this->Html->link($selectionStudentShip['Selection']['id'], array('controller' => 'selections', 'action' => 'view', $selectionStudentShip['Selection']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Answer'); ?></dt>
		<dd>
			<?php echo h($selectionStudentShip['SelectionStudentShip']['answer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Exam Student Ship'); ?></dt>
		<dd>
			<?php echo $this->Html->link($selectionStudentShip['ExamStudentShip']['id'], array('controller' => 'exam_student_ships', 'action' => 'view', $selectionStudentShip['ExamStudentShip']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Selection Student Ship'), array('action' => 'edit', $selectionStudentShip['SelectionStudentShip']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Selection Student Ship'), array('action' => 'delete', $selectionStudentShip['SelectionStudentShip']['id']), array(), __('Are you sure you want to delete # %s?', $selectionStudentShip['SelectionStudentShip']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Selection Student Ships'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selection Student Ship'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Selections'), array('controller' => 'selections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selection'), array('controller' => 'selections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Exam Student Ships'), array('controller' => 'exam_student_ships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exam Student Ship'), array('controller' => 'exam_student_ships', 'action' => 'add')); ?> </li>
	</ul>
</div>
