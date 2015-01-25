<div class="grades view">
<h2><?php echo __('年级信息'); ?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($grade['Grade']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('年级名'); ?></dt>
		<dd>
			<?php echo h($grade['Grade']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>
		<li><?php //echo $this->Html->link(__('编辑该年级'), array('action' => 'edit', $grade['Grade']['id'])); ?> </li>
		<li><?php //echo $this->Form->postLink(__('删除该年级'), array('action' => 'delete', $grade['Grade']['id']), array(), __('您确定要删除 # %s吗？', $grade['Grade']['name'])); ?> </li>
		<li><?php echo $this->Html->link(__('年级列表'), array('action' => 'TeacherIndex')); ?> </li>
		<li><?php // echo $this->Html->link(__('添加年级'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'teachers','action' => 'index')); ?></li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('该年级下班级'); ?></h3>
	<?php if (!empty($grade['Classroom'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ID'); ?></th>
		<th><?php echo __('班级名'); ?></th>
		<th><?php echo __('年级名'); ?></th>
		<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($grade['Classroom'] as $classroom): ?>
		<tr>
			<td><?php echo $classroom['id']; ?></td>
			<td><?php echo $classroom['name']; ?></td>
			<td><?php echo $classroom['grade_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('查看'), array('controller' => 'classrooms', 'action' => 'TeacherView', $classroom['id'])); ?>
				<?php //echo $this->Html->link(__('编辑'), array('controller' => 'classrooms', 'action' => 'edit', $classroom['id'])); ?>
				<?php //echo $this->Form->postLink(__('删除'), array('controller' => 'classrooms', 'action' => 'delete', $classroom['id']), array(), __('Are you sure you want to delete # %s?', $classroom['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php //echo $this->Html->link(__('添加班级'), array('controller' => 'classrooms', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('该年级下学生'); ?></h3>
	<?php if (!empty($grade['Student'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ID'); ?></th>
		<th><?php echo __('学生姓名'); ?></th>
		<th><?php echo __('学号'); ?></th>
		<th><?php echo __('班级 Id'); ?></th>
		<th><?php echo __('年级 Id'); ?></th>
		<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($grade['Student'] as $student): ?>
		<tr>
			<td><?php echo $student['id']; ?></td>
			<td><?php echo $student['name']; ?></td>
			<td><?php echo $student['number']; ?></td>
			<td><?php echo $student['classroom_id']; ?></td>
			<td><?php echo $student['grade_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('查看'), array('controller' => 'students', 'action' => 'TeacherView', $student['id'])); ?>
				<?php //echo $this->Html->link(__('编辑'), array('controller' => 'students', 'action' => 'edit', $student['id'])); ?>
				<?php //echo $this->Form->postLink(__('删除'), array('controller' => 'students', 'action' => 'delete', $student['id']), array(), __('Are you sure you want to delete # %s?', $student['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php //echo $this->Html->link(__('添加学生'), array('controller' => 'students', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
