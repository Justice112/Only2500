<div class="courseTeacherShips form">
<?php echo $this->Form->create('CourseTeacherShip'); ?>
	<fieldset>
		<legend><?php echo __('Edit Course Teacher Ship'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('course_id');
		echo $this->Form->input('teacher_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('科目管理分配管理'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('删除此分配'), array('action' => 'delete', $this->Form->value('CourseTeacherShip.id')), array(), __('您确定要删除  %s?', $this->Form->value('CourseTeacherShip.id'))); ?></li>
		<li><?php echo $this->Html->link(__('科目管理分配'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('科目列表'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('添加科目'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('教师列表'), array('controller' => 'teachers', 'action' => 'AdminIndex')); ?> </li>
		<li><?php echo $this->Html->link(__('添加教师'), array('controller' => 'teachers', 'action' => 'AdminAdd')); ?> </li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'admins','action' => 'index')); ?></li>
	</ul>
</div>
