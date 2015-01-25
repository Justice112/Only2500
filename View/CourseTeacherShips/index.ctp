<div class="courseTeacherShips index">
	<h2><?php echo __('教师管理科目分配'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id','ID'); ?></th>
			<th><?php echo $this->Paginator->sort('course_id','科目'); ?></th>
			<th><?php echo $this->Paginator->sort('teacher_id','教师'); ?></th>
			<th class="操作"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($courseTeacherShips as $courseTeacherShip): ?>
	<tr>
		<td><?php echo h($courseTeacherShip['CourseTeacherShip']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($courseTeacherShip['Course']['name'], array('controller' => 'courses', 'action' => 'view', $courseTeacherShip['Course']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($courseTeacherShip['Teacher']['name'], array('controller' => 'teachers', 'action' => 'view', $courseTeacherShip['Teacher']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('查看'), array('action' => 'view', $courseTeacherShip['CourseTeacherShip']['id'])); ?>
			<?php echo $this->Html->link(__('编辑'), array('action' => 'edit', $courseTeacherShip['CourseTeacherShip']['id'])); ?>
			<?php echo $this->Form->postLink(__('删除'), array('action' => 'delete', $courseTeacherShip['CourseTeacherShip']['id']), array(), __('Are you sure you want to delete # %s?', $courseTeacherShip['CourseTeacherShip']['id'])); ?>
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
	<h3><?php echo __('科目管理分配管理'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('科目管理分配'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('科目列表'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('添加科目'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('教师列表'), array('controller' => 'teachers', 'action' => 'AdminIndex')); ?> </li>
		<li><?php echo $this->Html->link(__('添加教师'), array('controller' => 'teachers', 'action' => 'AdminAdd')); ?> </li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'admins','action' => 'index')); ?></li>
	</ul>
</div>
