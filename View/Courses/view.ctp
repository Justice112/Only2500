<div class="courses view">
<h2><?php echo __('科目详细信息'); ?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($course['Course']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('名称'); ?></dt>
		<dd>
			<?php echo h($course['Course']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('考试时间'); ?></dt>
		<dd>
			<?php echo h($course['Course']['exam_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('考试题数'); ?></dt>
		<dd>
			<?php echo h($course['Course']['selection_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('是否公开'); ?></dt>
		<dd>
			<?php if($course['Course']['open_score']==1) echo '是';else {
				echo '否';
			} ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('编辑该科目'), array('action' => 'edit', $course['Course']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('删除该科目'), array('action' => 'delete', $course['Course']['id']), array(), __('您确定要删除  %s 吗?', $course['Course']['name'])); ?> </li>
		<li><?php echo $this->Html->link(__('科目列表'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('添加科目'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'admins','action' => 'index')); ?></li>	</ul>
</div>
 <div class="related">
	<h3><?php echo __('%s 的管理教师列表',$course['Course']['name']); ?></h3>
	<?php if (!empty($course['CourseTeacherShip'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ID'); ?></th>
		<th><?php echo __('科目'); ?></th>
		<th><?php echo __('教师'); ?></th>
		<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($course['CourseTeacherShip'] as $courseTeacherShip): ?>
		<tr>
			<td><?php echo $courseTeacherShip['id']; ?></td>
			<td><?php echo $courseTeacherShip['course_id']; ?></td>
			<td><?php echo $courseTeacherShip['teacher_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('查看'), array('controller' => 'course_teacher_ships', 'action' => 'view', $courseTeacherShip['id'])); ?>
				<?php echo $this->Html->link(__('编辑'), array('controller' => 'course_teacher_ships', 'action' => 'edit', $courseTeacherShip['id'])); ?>
				<?php echo $this->Form->postLink(__('删除'), array('controller' => 'course_teacher_ships', 'action' => 'delete', $courseTeacherShip['id']), array(), __('您确定要删除 # %s?', $courseTeacherShip['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('添加科目管理老师'), array('controller' => 'course_teacher_ships', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('%s 的考试列表',$course['Course']['name']); ?></h3>
	<?php if (!empty($course['Exam'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ID'); ?></th>
		<th><?php echo __('考试类型'); ?></th>
		<th><?php echo __('教师 Id'); ?></th>
		<th><?php echo __('科目 Id'); ?></th>
		<th><?php echo __('考试日期'); ?></th>
		<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($course['Exam'] as $exam): ?>
		<tr>
			<td><?php echo $exam['id']; ?></td>
			<td><?php echo $exam['type']; ?></td>
			<td><?php echo $exam['teacher_id']; ?></td>
			<td><?php echo $exam['course_id']; ?></td>
			<td><?php echo $exam['exam_date']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('查看'), array('controller' => 'exams', 'action' => 'view', $exam['id'])); ?>
				<?php echo $this->Html->link(__('编辑'), array('controller' => 'exams', 'action' => 'edit', $exam['id'])); ?>
				<?php echo $this->Form->postLink(__('删除'), array('controller' => 'exams', 'action' => 'delete', $exam['id']), array(), __('您确定要删除 # %s?', $exam['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('添加考试'), array('controller' => 'exams', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('%s 的题目列表',$course['Course']['name']); ?></h3>
	<?php if (!empty($course['Selection'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ID'); ?></th>
		<th><?php echo __('题目'); ?></th>
		<th><?php echo __('图片'); ?></th>
		<th><?php echo __('选项A'); ?></th>
		<th><?php echo __('选项B'); ?></th>
		<th><?php echo __('选项C'); ?></th>
		<th><?php echo __('选项D'); ?></th>
		<th><?php echo __('正确答案'); ?></th>
		<th><?php echo __('所属科目 Id'); ?></th>
		<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php $i = 1; ?>
	<?php foreach ($course['Selection'] as $selection): ?>
		<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $selection['topic']; ?></td>
		<td><img src="/images/selectionimg/<?php if ($selection['picture']) {echo h($selection['picture']);}else {echo "default.jpg";}?>" height="50"></td>
			<td><?php echo $selection['optionA']; ?></td>
			<td><?php echo $selection['optionB']; ?></td>
			<td><?php echo $selection['optionC']; ?></td>
			<td><?php echo $selection['optionD']; ?></td>
			<td><?php echo $selection['answer']; ?></td>
			<td><?php echo $selection['course_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('查看'), array('controller' => 'selections', 'action' => 'view', $selection['id'])); ?>
				<?php echo $this->Html->link(__('编辑'), array('controller' => 'selections', 'action' => 'edit', $selection['id'])); ?>
				<?php echo $this->Form->postLink(__('删除'), array('controller' => 'selections', 'action' => 'delete', $selection['id']), array(), __('Are you sure you want to delete # %s?', $selection['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php
					$this->Session->write('course_id',$course['Course']['id']); 
					echo $this->Html->link(__('添加题目'), array('controller' => 'selections', 'action' => 'add',$id = $course['Course']['id'])); ?> </li>
		</ul>
	</div>
</div>
