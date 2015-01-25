<div class="teachers view">
<h2><?php echo __('教师详细信息'); ?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($teacher['Teacher']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('姓名'); ?></dt>
		<dd>
			<?php echo h($teacher['Teacher']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('用户名'); ?></dt>
		<dd>
			<?php echo h($teacher['Teacher']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('密码'); ?></dt>
		<dd>
			<?php echo h($teacher['Teacher']['password']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<!--  
<div class="teachers index">
	<h2><?php echo __('教师列表'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID'); ?></th>
			<th><?php echo $this->Paginator->sort('姓名'); ?></th>
			<th><?php echo $this->Paginator->sort('用户名'); ?></th>
			<th><?php echo $this->Paginator->sort('密码'); ?></th>
			<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($teachers as $teacher): ?>
	<tr>
		<td><?php echo h($teacher['Teacher']['id']); ?>&nbsp;</td>
		<td><?php echo h($teacher['Teacher']['name']); ?>&nbsp;</td>
		<td><?php echo h($teacher['Teacher']['username']); ?>&nbsp;</td>
		<td><?php echo h($teacher['Teacher']['password']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('查看'), array('action' => 'view', $teacher['Teacher']['id'])); ?>
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
-->
<div class="actions">
	<h3><?php echo __('教师管理'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('编辑个人信息'), array('action' => 'edit',$this->Session->read('user_id')));  ?> </li>
		<li><?php echo $this->Html->link(__('学生信息'), array('controller' => 'students', 'action' => 'teacherIndex')); ?> </li>
	<!--	<li><?php echo $this->Html->link(__('考题管理'), array('controller' => 'selections', 'action' => 'teacherIndex')); ?> </li>  -->
	 	<li><?php echo $this->Html->link(__('考试信息管理'), array('controller' =>'exams','action' => 'teacherIndex')); ?></li>		
		<li><?php // echo $this->Html->link(__('考试信息管理'), array('controller' => 'exam_student_ships', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('考试成绩查看'), array('controller' => 'exam_student_ships', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('返回首页'), array('controller'=>'teachers','action' => 'index')); ?></li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('%s 管理的科目',$teacher['Teacher']['name']); ?></h3>
	<?php if (!empty($teacher['CourseTeacherShip'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ID'); ?></th>
		<th><?php echo __('分配科目'); ?></th>
		<th><?php echo __('管理教师'); ?></th>
	</tr>
	<?php foreach ($teacher['CourseTeacherShip'] as $courseTeacherShip): ?>
		<tr>
			<td><?php echo $courseTeacherShip['id']; ?></td>
			<td><?php echo $courseTeacherShip['course_id']; ?></td>
			<td><?php echo $teacher['Teacher']['name']; ?></td>

		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
<div class="related">
	<h3><?php echo __('%s 管理的考试',$teacher['Teacher']['name']); ?></h3>
	<?php if (!empty($teacher['Exam'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ID'); ?></th>
		<th><?php echo __('考试类型'); ?></th>
		<th><?php echo __('管理教师'); ?></th>
		<th><?php echo __('考试科目'); ?></th>
		<th><?php echo __('考试日期'); ?></th>
		
		<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($teacher['Exam'] as $exam): ?>
		<tr>
			<td><?php echo $exam['id']; ?></td>
			<td><?php echo $exam['type']; ?></td>
			<td><?php echo $teacher['Teacher']['name']; ?></td>
			<td><?php echo $exam['course_id'];?></td>
			<td><?php echo $exam['exam_date']; ?></td>	
			<td class="actions">
				<?php echo $this->Html->link(__('查看'), array('controller' => 'exams', 'action' => 'TeacherView', $exam['id'])); ?>
				<?php echo $this->Html->link(__('编辑'), array('controller' => 'exams', 'action' => 'TeacherEdit', $exam['id'])); ?>
				<?php echo $this->Form->postLink(__('删除'), array('controller' => 'exams', 'action' => 'TeacherDelete', $exam['id']), array(), __('您确定要删除  %s 吗?', $exam['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('添加考试'), array('controller' => 'exams', 'action' => 'TeacherAdd')); ?> </li>
		</ul>
	</div>
</div>