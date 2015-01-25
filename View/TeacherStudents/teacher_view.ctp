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
		<li><?php //echo $this->Html->link(__('编辑该学生'), array('action' => 'edit', $student['Student']['id'])); ?> </li>
		<li><?php //echo $this->Form->postLink(__('删除该学生'), array('action' => 'delete', $student['Student']['id']), array(), __('您确定删除吗 # %s?', $student['Student']['name'])); ?> </li>
		<li><?php echo $this->Html->link(__('学生列表'), array('action' => 'teacherIndex')); ?> </li>
		<li><?php //echo $this->Html->link(__('新建学生'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'teachsers','action' => 'index')); ?></li>
	</ul>
</div>

