<div class="students view">
<h2><?php echo __('学生详细信息'); ?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($student['Student']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('姓名'); ?></dt>
		<dd>
			<?php echo h($student['Student']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('学号'); ?></dt>
		<dd>
			<?php echo h($student['Student']['number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('班级'); ?></dt>
		<dd>
			<?php echo $this->Html->link($student['Classroom']['name'], array('controller' => 'classrooms', 'action' => 'view', $student['Classroom']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('年级'); ?></dt>
		<dd>
			<?php echo $this->Html->link($student['Grade']['name'], array('controller' => 'grades', 'action' => 'view', $student['Grade']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('编辑该学生'), array('action' => 'edit', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('删除该学生'), array('action' => 'delete', $student['Student']['id']), array(), __('您确定删除吗 # %s?', $student['Student']['name'])); ?> </li>
		<li><?php echo $this->Html->link(__('学生列表'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('新建学生'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'admins','action' => 'index')); ?></li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('%s 的考试信息',$student['Student']['name']); ?></h3>
	<?php if (!empty($student['ExamStudentShip'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ID'); ?></th>
		<th><?php echo __('考试信息 Id'); ?></th>
		<th><?php echo __('考试学生 Id'); ?></th>
		<th><?php echo __('成绩'); ?></th>
		<th><?php echo __('考试状态'); ?></th>
		<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($student['ExamStudentShip'] as $examStudentShip): ?>
		<tr>
			<td><?php echo $examStudentShip['id']; ?></td>
			<td><?php echo $examStudentShip['exam_id']; ?></td>
			<td><?php echo $examStudentShip['student_id']; ?></td>
			<td><?php echo $examStudentShip['grade']; ?></td>
			<td><?php echo $examStudentShip['status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('查看'), array('controller' => 'exam_student_ships', 'action' => 'view', $examStudentShip['id'])); ?>
				<?php echo $this->Html->link(__('编辑'), array('controller' => 'exam_student_ships', 'action' => 'edit', $examStudentShip['id'])); ?>
				<?php echo $this->Form->postLink(__('删除'), array('controller' => 'exam_student_ships', 'action' => 'delete', $examStudentShip['id']), array(), __('Are you sure you want to delete # %s?', $examStudentShip['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php // echo $this->Html->link(__('New Exam Student Ship'), array('controller' => 'exam_student_ships', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('%s 的考试答题情况',$student['Student']['name']); ?></h3>
	<?php if (!empty($student['SelectionStudentShip'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ID'); ?></th>
		<th><?php echo __('Student Id'); ?></th>
		<th><?php echo __('Selection Id'); ?></th>
		<th><?php echo __('Answer'); ?></th>
		<th><?php echo __('Exam Student Ship Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($student['SelectionStudentShip'] as $selectionStudentShip): ?>
		<tr>
			<td><?php echo $selectionStudentShip['id']; ?></td>
			<td><?php echo $selectionStudentShip['student_id']; ?></td>
			<td><?php echo $selectionStudentShip['selection_id']; ?></td>
			<td><?php echo $selectionStudentShip['answer']; ?></td>
			<td><?php echo $selectionStudentShip['exam_student_ship_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('查看'), array('controller' => 'selection_student_ships', 'action' => 'view', $selectionStudentShip['id'])); ?>
				<?php echo $this->Html->link(__('编辑'), array('controller' => 'selection_student_ships', 'action' => 'edit', $selectionStudentShip['id'])); ?>
				<?php echo $this->Form->postLink(__('删除'), array('controller' => 'selection_student_ships', 'action' => 'delete', $selectionStudentShip['id']), array(), __('Are you sure you want to delete # %s?', $selectionStudentShip['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
<!-- 
<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Selection Student Ship'), array('controller' => 'selection_student_ships', 'action' => 'add')); ?> </li>
		</ul>
	</div>
 -->
 </div>