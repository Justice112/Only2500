<div class="exams index">
	<h2><?php echo __('%s 所有考试信息',$this->Session->read('user_name')); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id','ID'); ?></th>
			<th><?php echo $this->Paginator->sort('type','考试类型'); ?></th>
			<th><?php echo $this->Paginator->sort('teacher_id','管理老师'); ?></th>
			<th><?php echo $this->Paginator->sort('course_id','考试科目'); ?></th>
			<th><?php echo $this->Paginator->sort('exam_date','考试日期'); ?></th>
			<th><?php echo $this->Paginator->sort('exam_time','考试时间'); ?></th>
			<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($exams as $exam): ?>
	<tr>
		<td><?php echo h($exam['Exam']['id']); ?>&nbsp;</td>
		<td><?php echo h($exam['Exam']['type']); ?>&nbsp;</td>
		<td><?php echo h($exam['Teacher']['name']); ?>&nbsp;</td>
		<td><?php echo h($exam['Course']['name']); ?>&nbsp;</td>
		<td><?php echo h($exam['Exam']['exam_date']); ?>&nbsp;</td>
		<td><?php echo h($exam['Course']['exam_time']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('查看'), array('action' => 'TeacherView', $exam['Exam']['id'])); ?>
			<?php echo $this->Html->link(__('编辑'), array('action' => 'TeacherEdit', $exam['Exam']['id'])); ?>
			<?php echo $this->Form->postLink(__('删除'), array('action' => 'TeacherDelete', $exam['Exam']['id']), array(), __('您确定要删除  %s  考试吗?', $exam['Course']['name'])); ?>
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
	<h3><?php echo __('考试信息管理'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('添加考试'), array('action' => 'TeacherAdd')); ?></li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'teachers','action' => 'index')); ?></li>
	</ul>
</div>
