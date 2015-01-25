<div class="courses form">
<?php echo $this->Form->create('Course'); ?>
	<fieldset>
		<legend><?php echo __('添加科目'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label'=>'名称'));
		echo $this->Form->input('exam_time',array('label'=>'考试时间'));
		echo $this->Form->input('open_score',array('options'=>array(TRUE=>'是',FALSE=>'否'),'label'=>'是否公开'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('确定')); ?>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('科目列表'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'admins','action' => 'index')); ?></li>
	</ul>
</div>