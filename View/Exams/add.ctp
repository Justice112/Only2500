<div class="exams form">
<?php echo $this->Form->create('Exam'); ?>
	<fieldset>
		<legend><?php echo __('添加考试'); ?></legend>
	<?php
		echo $this->Form->input('type',array('label'=>'考试类型','options'=>array('正式考试'=>'正式考试','补考'=>'补考','其他'=>'其他'),'empty'=>'请选择..'));
		echo $this->Form->input('teacher_id',array('label'=>'管理老师'));
		echo $this->Form->input('course_id',array('label'=>'考试科目'));
		echo $this->Form->input('exam_date',array('label'=>'考试日期'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('确定')); ?>
</div>
<div class="actions">
	<h3><?php echo __('考试信息管理'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('当前考试信息'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'admins','action' => 'index')); ?></li>
	</ul>
</div>
