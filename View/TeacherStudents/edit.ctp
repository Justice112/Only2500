<div class="students form">
<?php echo $this->Form->create('Student'); ?>
	<fieldset>
		<legend><?php echo __('编辑学生信息'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('label'=>'学生姓名'));
		echo $this->Form->input('number',array('label'=>'学生学号'));
		echo $this->Form->input('password',array('label'=>'登录密码'));
		echo $this->Form->input('classroom_id',array('label'=>'学生班级'));
		echo $this->Form->input('grade_id',array('label'=>'学生年级'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('确定')); ?>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('删除该学生'), array('action' => 'delete', $this->Form->value('Student.id')), array(), __('您确定删除吗 # %s?', $this->Form->value('Student.name'))); ?></li>
		<li><?php echo $this->Html->link(__('学生列表'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('新建学生'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'admins','action' => 'index')); ?></li>
	</ul>
</div>
