<div class="students view">
<h2><?php echo __('Student'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($student['Student']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($student['Student']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Number'); ?></dt>
		<dd>
			<?php echo h($student['Student']['number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Classroom'); ?></dt>
		<dd>
			<?php echo $this->Html->link($student['Classroom']['name'], array('controller' => 'classrooms', 'action' => 'view', $student['Classroom']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grade'); ?></dt>
		<dd>
			<?php echo $this->Html->link($student['Grade']['name'], array('controller' => 'grades', 'action' => 'view', $student['Grade']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Student'), array('action' => 'edit', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Student'), array('action' => 'delete', $student['Student']['id']), array(), __('Are you sure you want to delete # %s?', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('action' => 'add')); ?> </li>
		
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Exam Student Ships'); ?></h3>
	<?php if (!empty($student['ExamStudentShip'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Exam Id'); ?></th>
		<th><?php echo __('Student Id'); ?></th>
		<th><?php echo __('Grade'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($student['ExamStudentShip'] as $examStudentShip): ?>
		<tr>
			<td><?php echo $examStudentShip['id']; ?></td>
			<td><?php echo $examStudentShip['exam_id']; ?></td>
			<td><?php echo $examStudentShip['student_id']; ?></td>
			<td><?php echo $examStudentShip['grade']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'exam_student_ships', 'action' => 'view', $examStudentShip['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'exam_student_ships', 'action' => 'edit', $examStudentShip['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'exam_student_ships', 'action' => 'delete', $examStudentShip['id']), array(), __('Are you sure you want to delete # %s?', $examStudentShip['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Exam Student Ship'), array('controller' => 'exam_student_ships', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
