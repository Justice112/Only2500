<div class="courseTeacherShips view">
<h2><?php echo __('科目管理分配'); ?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($courseTeacherShip['CourseTeacherShip']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('管理科目'); ?></dt>
		<dd>
			<?php echo $this->Html->link($courseTeacherShip['Course']['name'], array('controller' => 'courses', 'action' => 'view', $courseTeacherShip['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('管理教师'); ?></dt>
		<dd>
			<?php echo $this->Html->link($courseTeacherShip['Teacher']['name'], array('controller' => 'teachers', 'action' => 'view', $courseTeacherShip['Teacher']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('科目管理分配管理'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('编辑此分配'), array('action' => 'edit', $courseTeacherShip['CourseTeacherShip']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('删除此分配'), array('action' => 'delete', $courseTeacherShip['CourseTeacherShip']['id']), array(), __('您确定要删除 # %s?', $courseTeacherShip['CourseTeacherShip']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('科目管理分配'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('科目列表'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('添加科目'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('教师列表'), array('controller' => 'teachers', 'action' => 'AdminIndex')); ?> </li>
		<li><?php echo $this->Html->link(__('添加教师'), array('controller' => 'teachers', 'action' => 'AdminAdd')); ?> </li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'admins','action' => 'index')); ?></li>
	</ul>
</div>
