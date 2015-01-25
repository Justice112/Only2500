<div class="examSelectionShips form">
<?php echo $this->Form->create('ExamSelectionShip'); ?>
	<fieldset>
		<legend><?php echo __('添加考试题目'); ?></legend>
	<?php
		echo $this->Form->input('exam_id',array('label'=>'考试信息'));
		echo $this->Form->input('selection_id',array('label'=>'选择题目'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('确定')); ?>
</div>
<div class="actions">
	<h3><?php echo __('考试信息管理'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('考卷'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('考试信息'), array('controller' => 'exams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('添加考试'), array('controller' => 'exams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('选择题目表'), array('controller' => 'selections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('添加选择题'), array('controller' => 'selections', 'action' => 'add')); ?> </li>
	</ul>
</div>
