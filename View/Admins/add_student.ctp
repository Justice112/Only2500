<div class="students form">
<?php echo $this->Form->create('Student'); ?>
	<fieldset>
		<legend><?php echo __('添加学生'); ?></legend>
	<?php
		echo $this->Form->input('姓名');
		echo $this->Form->input('学号');
		echo $this->Form->input('classroom_id',array('label' => '班级'));
		echo $this->Form->input('grade_id',array('label' => '年级'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('提交')); ?>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>
		
		<li><?php echo $this->Html->link(__('添加学生'), array('controller' =>'admins','action' => 'addStudent')); ?></li>
		<li><?php echo $this->Html->link(__('List Classrooms'), array('controller' => 'classrooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classroom'), array('controller' => 'classrooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Grades'), array('controller' => 'grades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grade'), array('controller' => 'grades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Exam Student Ships'), array('controller' => 'exam_student_ships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exam Student Ship'), array('controller' => 'exam_student_ships', 'action' => 'add')); ?> </li>
	</ul>
</div>
