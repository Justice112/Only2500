<div class="courseTeacherShips form">
<?php echo $this->Form->create('CourseTeacherShip'); ?>
	<fieldset>
		<legend><?php echo __('教师管理科目分配'); ?></legend>
	<?php
		echo $this->Form->input('teacher_id',array('label'=>'管理教师'));
		echo $this->Form->input('course_id',array('label'=>'分配科目'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('确定')); ?>
</div>
<div class="actions">
	<h3><?php echo __('科目管理分配管理'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('科目管理分配'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('科目列表'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('添加科目'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('教师列表'), array('controller' => 'teachers', 'action' => 'AdminIndex')); ?> </li>
		<li><?php echo $this->Html->link(__('添加教师'), array('controller' => 'teachers', 'action' => 'AdminAdd')); ?> </li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'admins','action' => 'index')); ?></li>
	</ul>
</div>
