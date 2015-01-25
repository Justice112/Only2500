<div class="classrooms view">
<h2><?php echo __('班级详细信息'); ?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($classroom['Classroom']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('名称'); ?></dt>
		<dd>
			<?php echo h($classroom['Classroom']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('年级'); ?></dt>
		<dd>
			<?php echo $this->Html->link($classroom['Grade']['name'], array('controller' => 'grades', 'action' => 'TeacherView', $classroom['Grade']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>
		<li><?php //echo $this->Html->link(__('编辑该班级信息'), array('action' => 'edit', $classroom['Classroom']['id'])); ?> </li>
		<li><?php //echo $this->Form->postLink(__('删除该班级'), array('action' => 'delete', $classroom['Classroom']['id']), array(), __('您确定要删除 # %s吗?', $classroom['Classroom']['name'])); ?> </li>
		<li><?php //echo $this->Html->link(__('班级列表'), array('action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('新建班级'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'teachers','action' => 'index')); ?></li>
	</ul>
</div>

<div class="related">
	<h3><?php echo __('该班级下学生'); ?></h3>
	<?php if (!empty($classroom['Student'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ID'); ?></th>
		<th><?php echo __('姓名'); ?></th>
		<th><?php echo __('学号'); ?></th>
		<th><?php echo __('班级 '); ?></th>
		<th><?php echo __('年级 '); ?></th>
		<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($classroom['Student'] as $student): ?>
		<tr>
			<td><?php echo $student['id']; ?></td>
			<td><?php echo $student['name']; ?></td>
			<td><?php echo $student['number']; ?></td>
			<td><?php echo $classroom['Classroom']['name']; ?></td>
			<td><?php echo $classroom['Grade']['name']; ?></td>
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
