<div class="teachers view">
<h2><?php echo __('教师详细信息'); ?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($teacher['Teacher']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('姓名'); ?></dt>
		<dd>
			<?php echo h($teacher['Teacher']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('用户名'); ?></dt>
		<dd>
			<?php echo h($teacher['Teacher']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('密码'); ?></dt>
		<dd>
			<?php echo h($teacher['Teacher']['password']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('编辑个人详细信息'), array('action' => 'edit', $teacher['Teacher']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('学生信息'), array('controller' => 'students', 'action' => 'teacherIndex')); ?> </li>
		<li><?php echo $this->Html->link(__('考题管理'), array('controller' => 'selections', 'action' => 'teacherIndex')); ?> </li>
		<li><?php echo $this->Html->link(__('考试信息管理'), array('controller' =>'exams','action' => 'teacherIndex')); ?></li>		
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'teachers','action' => 'index')); ?></li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('%s 管理的科目',$teacher['Teacher']['name']); ?></h3>
	<?php if (!empty($teacher['CourseTeacherShip'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Teacher Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($teacher['CourseTeacherShip'] as $courseTeacherShip): ?>
		<tr>
			<td><?php echo $courseTeacherShip['id']; ?></td>
			<td><?php echo $courseTeacherShip['course_id']; ?></td>
			<td><?php echo $courseTeacherShip['teacher_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'course_teacher_ships', 'action' => 'view', $courseTeacherShip['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'course_teacher_ships', 'action' => 'edit', $courseTeacherShip['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'course_teacher_ships', 'action' => 'delete', $courseTeacherShip['id']), array(), __('Are you sure you want to delete # %s?', $courseTeacherShip['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Course Teacher Ship'), array('controller' => 'course_teacher_ships', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('%s 管理的考试',$teacher['Teacher']['name']); ?></h3>
	<?php if (!empty($teacher['Exam'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ID'); ?></th>
		<th><?php echo __('考试类型'); ?></th>
		<th><?php echo __('出考教师'); ?></th>
		<th><?php echo __('考试科目'); ?></th>
		<th><?php echo __('考试日期'); ?></th>
		
		<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($teacher['Exam'] as $exam): ?>
		<tr>
			<td><?php echo $exam['id']; ?></td>
			<td><?php echo $exam['type']; ?></td>
			<td><?php echo $teacher['Teacher']['name']; ?></td>
			<td><?php echo $exam['course_id']; ?></td>
			<td><?php echo $exam['exam_date']; ?></td>	
			<td class="actions">
				<?php echo $this->Html->link(__('查看'), array('controller' => 'exams', 'action' => 'TeacherView', $exam['id'])); ?>
				<?php echo $this->Html->link(__('编辑'), array('controller' => 'exams', 'action' => 'TeacherEdit', $exam['id'])); ?>
				<?php echo $this->Form->postLink(__('删除'), array('controller' => 'exams', 'action' => 'TeacherDelete', $exam['id']), array(), __('您确定要删除  %s 吗?', $exam['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('添加考试'), array('controller' => 'exams', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>