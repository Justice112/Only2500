<div class="selectionStudentShips index">
	<h2><?php echo __('Selection Student Ships'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('student_id'); ?></th>
			<th><?php echo $this->Paginator->sort('selection_id'); ?></th>
			<th><?php echo $this->Paginator->sort('answer'); ?></th>
			<th><?php echo $this->Paginator->sort('exam_student_ship_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($selectionStudentShips as $selectionStudentShip): ?>
	<tr>
		<td><?php echo h($selectionStudentShip['SelectionStudentShip']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($selectionStudentShip['Student']['name'], array('controller' => 'students', 'action' => 'view', $selectionStudentShip['Student']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($selectionStudentShip['Selection']['id'], array('controller' => 'selections', 'action' => 'view', $selectionStudentShip['Selection']['id'])); ?>
		</td>
		<td><?php echo h($selectionStudentShip['SelectionStudentShip']['answer']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($selectionStudentShip['ExamStudentShip']['id'], array('controller' => 'exam_student_ships', 'action' => 'view', $selectionStudentShip['ExamStudentShip']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $selectionStudentShip['SelectionStudentShip']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $selectionStudentShip['SelectionStudentShip']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $selectionStudentShip['SelectionStudentShip']['id']), array(), __('Are you sure you want to delete # %s?', $selectionStudentShip['SelectionStudentShip']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Selection Student Ship'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Selections'), array('controller' => 'selections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Selection'), array('controller' => 'selections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Exam Student Ships'), array('controller' => 'exam_student_ships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exam Student Ship'), array('controller' => 'exam_student_ships', 'action' => 'add')); ?> </li>
	</ul>
</div>
