<div class="examStudentShips view">
<h2><?php echo __('Exam Student Ship'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($examStudentShip['ExamStudentShip']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Exam'); ?></dt>
		<dd>
			<?php echo $this->Html->link($examStudentShip['Exam']['id'], array('controller' => 'exams', 'action' => 'view', $examStudentShip['Exam']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Student'); ?></dt>
		<dd>
			<?php echo $this->Html->link($examStudentShip['Student']['name'], array('controller' => 'students', 'action' => 'view', $examStudentShip['Student']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grade'); ?></dt>
		<dd>
			<?php echo h($examStudentShip['ExamStudentShip']['grade']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Exam Student Ship'), array('action' => 'edit', $examStudentShip['ExamStudentShip']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Exam Student Ship'), array('action' => 'delete', $examStudentShip['ExamStudentShip']['id']), array(), __('Are you sure you want to delete # %s?', $examStudentShip['ExamStudentShip']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Exam Student Ships'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exam Student Ship'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Exams'), array('controller' => 'exams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exam'), array('controller' => 'exams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
	</ul>
</div>
