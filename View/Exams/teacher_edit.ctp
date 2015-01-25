<div class="exams form">
<?php echo $this->Form->create('Exam'); ?>
	<fieldset>
		<legend><?php echo __('编辑考试信息'); ?></legend>
	<?php
		echo $this->Form->input('id',array('label'=>'ID'));
		echo $this->Form->input('type',array('label'=>'考考试类型','options'=>array('正式考试'=>'正式考试','补考'=>'补考','其他'=>'其他')));
		echo $this->Form->input('teacher_id',array('label'=>'管理老师','type'=>'hidden','value'=>$this->Session->read('user_id')));
		echo $this->Form->input('course_id',array('label'=>'考考试科目'));
		echo $this->Form->input('exam_date',array('label'=>'考试日期'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('确定')); ?>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('删除该考卷'), array('action' => 'TeacherDelete', $this->Form->value('Exam.id')), array(), __('您确定要删除 # %s吗?', $this->Form->value('Exam.id'))); ?></li>
		<li><?php echo $this->Html->link(__('考卷列表'), array('action' => 'TeacherIndex')); ?></li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'teachers','action' => 'index')); ?></li>
	</ul>
</div>
