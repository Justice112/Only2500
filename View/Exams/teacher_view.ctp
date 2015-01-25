<div class="exams view">
<h2><?php echo __('考试信息'); ?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($exam['Exam']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('考试类型'); ?></dt>
		<dd>
			<?php echo h($exam['Exam']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('管理老师'); ?></dt>
		<dd>
			<?php echo $this->Html->link($exam['Teacher']['name'], array('controller' => 'teachers', 'action' => 'view', $exam['Teacher']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('考试科目'); ?></dt>
		<dd>
			<?php echo $this->Html->link($exam['Course']['name'], array('controller' => 'courses', 'action' => 'TeacherView', $exam['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('考试日期'); ?></dt>
		<dd>
			<?php echo h($exam['Exam']['exam_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('考试时间'); ?></dt>
		<dd>
			<?php echo h($exam['Course']['exam_time']); ?>
			&nbsp;
		</dd>
	</dl>
	<div class="related">
	<h3 style="margin-top:20px"><?php echo __('考试相关学生'); ?></h3>
		<?php if (!empty($examStudentShips)): ?>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('编号'); ?></th>
			<th><?php echo __('学号'); ?></th>
			<th><?php echo __('姓名'); ?></th>
			<th><?php echo __('成绩'); ?></th>
			<th class="actions"><?php echo __('操作'); ?></th>
		</tr>
		<?php $count = 1; ?>
		<?php foreach ($examStudentShips as $examStudentShip): ?>
			<tr>
				<td><?php echo $count; $count++; ?></td>
				<td><?php echo $examStudentShip['Student']['number']; ?></td>
				<td><?php echo $this->Html->link(__($examStudentShip['Student']['name']), array('controller' => 'ExamStudentShips', 'action' => 'TeacherView', $examStudentShip['Student']['id'])); ?></td>
				<td><?php 
							if($examStudentShip['ExamStudentShip']['grade']){
								echo $examStudentShip['ExamStudentShip']['grade']; 
							}
							else{
								echo '未考试';
							}
						?></td>
				<td class="actions">
					<?php echo $this->Form->postLink(__('删除'), array('controller' => 'ExamStudentShips', 'action' => 'TeacherDelete', $examStudentShip['ExamStudentShip']['id']), array(), __('您确定要删除  %s 吗?', $examStudentShip['Student']['name'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
		<?php endif; ?>
	
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('添加该考试学生'), array('controller' => 'ExamStudentShips', 'action' => 'TeacherAdd', $exam['Exam']['id'])); ?> </li>
			</ul>
		</div>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('删除该考试'), array('action' => 'TeacherDelete', $this->Form->value('Exam.id')), array(), __('您确定要删除 # %s吗?', $this->Form->value('Exam.id'))); ?></li>
		<li><?php echo $this->Html->link(__('考试列表'), array('action' => 'TeacherIndex')); ?></li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'teachers','action' => 'index')); ?></li>
	</ul>
</div>

