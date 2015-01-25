<div class="exams view">
<h2><?php echo __('考卷信息'); ?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($exam['Exam']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('考卷类型'); ?></dt>
		<dd>
			<?php echo h($exam['Exam']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('管理老师'); ?></dt>
		<dd>
			<?php echo $this->Html->link($exam['Teacher']['name'], array('controller' => 'teachers', 'action' => 'view', $exam['Teacher']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('考卷科目'); ?></dt>
		<dd>
			<?php echo $this->Html->link($exam['Course']['name'], array('controller' => 'courses', 'action' => 'view', $exam['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('考卷日期'); ?></dt>
		<dd>
			<?php echo h($exam['Exam']['exam_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('考卷时间'); ?></dt>
		<dd>
			<?php echo h($exam['Exam']['exam_time']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="examstudentship form">
<?php echo $this->Form->create('ExamStudentShip',array('action'=>'add')); ?>
	<fieldset>
		<legend><?php echo __('选择添加考试学生'); ?></legend>
		
<?php foreach ($students as $student):  ?>
<?php ?>
<?php // echo $this->Form->checkbox('exam_id',array('value'=>$student['Student']['id'],'label'=>$student['Student']['name']));?>
<?php echo $this->Form->input('student_id', array('options' => array( $student['Student']['id']=>$student['Student']['name']), 'type'=>'select', 'multiple'=>'checkbox', 'label'=>false,  'div'=>false,'hiddenField' => false  ) );
		  ?>
	<?php endforeach;?>
	</fieldset>
<?php echo $this->Form->end(__('确定')); ?>
</div>


<div class="actions">
	<h3><?php echo __('考试信息管理'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('考试信息表'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('当前考试信息'), array('controller' => 'exams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('添加考试'), array('controller' => 'exams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'admins','action' => 'index')); ?></li>
	</ul>
</div>

<!--
<div class="examStudentShips index">
	<h2><?php echo __('Exam Student Ships'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID'); ?></th>
			<th><?php echo $this->Paginator->sort('exam_id'); ?></th>
			<th><?php echo $this->Paginator->sort('student_id'); ?></th>
			<th><?php echo $this->Paginator->sort('grade'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($examStudentShips as $examStudentShip): ?>
	<tr>
		<td><?php echo h($examStudentShip['ExamStudentShip']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($examStudentShip['Exam']['id'], array('controller' => 'exams', 'action' => 'view', $examStudentShip['Exam']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($examStudentShip['Student']['name'], array('controller' => 'students', 'action' => 'view', $examStudentShip['Student']['id'])); ?>
		</td>
		<td><?php echo h($examStudentShip['ExamStudentShip']['grade']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $examStudentShip['ExamStudentShip']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $examStudentShip['ExamStudentShip']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $examStudentShip['ExamStudentShip']['id']), array(), __('Are you sure you want to delete # %s?', $examStudentShip['ExamStudentShip']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('当前第 {:page}页 共 {:pages}页, 当前第 {:current}条记录 工{:count}条记录 , 当前开始于第 {:start}条, 结束于第 {:end}条')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('上一页'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('下一页') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'admins','action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('New Exam Student Ship'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Exams'), array('controller' => 'exams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Exam'), array('controller' => 'exams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
	</ul>
</div>

  -->
