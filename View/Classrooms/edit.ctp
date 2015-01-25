<div class="classrooms form">
<?php echo $this->Form->create('Classroom'); ?>
	<fieldset>
		<legend><?php echo __('编辑班级信息'); ?></legend>
	<?php
		echo $this->Form->input('id',array('label'=>'ID'));
		echo $this->Form->input('name',array('label'=>'名称'));
		echo $this->Form->input('grade_id',array('label'=>'年级'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('确定')); ?>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('删除'), array('action' => 'delete', $this->Form->value('Classroom.id')), array(), __('您确定要删除 # %吗？?', $this->Form->value('Classroom.name'))); ?></li>
		<li><?php echo $this->Html->link(__(' 班级列表'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'admins','action' => 'index')); ?></li>
	</ul>
</div>
