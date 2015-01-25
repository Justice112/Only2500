<div class="selections view">
<h2><?php echo __('题目信息'); ?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($selection['Selection']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('题目'); ?></dt>
		<dd>
			<?php echo h($selection['Selection']['topic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('图片'); ?></dt>
		<dd>
		<img src="/images/selectionimg/<?php echo h($selection['Selection']['picture']);?>" height="100">
		</dd>
		
		<dt><?php echo __('选项A'); ?></dt>
		<dd>
			<?php echo h($selection['Selection']['optionA']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('选项B'); ?></dt>
		<dd>
			<?php echo h($selection['Selection']['optionB']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('选项C'); ?></dt>
		<dd>
			<?php echo h($selection['Selection']['optionC']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('选项D'); ?></dt>
		<dd>
			<?php echo h($selection['Selection']['optionD']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('正确答案'); ?></dt>
		<dd>
			<?php echo h($selection['Selection']['answer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('所属科目'); ?></dt>
		<dd>
			<?php echo $this->Html->link($selection['Course']['name'], array('controller' => 'courses', 'action' => 'view', $selection['Course']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('编辑该题'), array('action' => 'edit', $selection['Selection']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('删除该题'), array('action' => 'delete', $selection['Selection']['id']), array(), __('您确定要删除 # %s吗?', $selection['Selection']['topic'])); ?> </li>
		<li><?php echo $this->Html->link(__('考题列表'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('添加考题'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'admins','action' => 'index')); ?></li>
	</ul>
</div>
<!--  
<div class="related">
	<h3><?php echo __('参加该考试的学生'); ?></h3>
	<?php if (!empty($selection['SelectionStudentShip'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Student Id'); ?></th>
		<th><?php echo __('Selection Id'); ?></th>
		<th><?php echo __('Answer'); ?></th>
		<th><?php echo __('Exam Student Ship Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($selection['SelectionStudentShip'] as $selectionStudentShip): ?>
		<tr>
			<td><?php echo $selectionStudentShip['id']; ?></td>
			<td><?php echo $selectionStudentShip['student_id']; ?></td>
			<td><?php echo $selectionStudentShip['selection_id']; ?></td>
			<td><?php echo $selectionStudentShip['answer']; ?></td>
			<td><?php echo $selectionStudentShip['exam_student_ship_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'selection_student_ships', 'action' => 'view', $selectionStudentShip['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'selection_student_ships', 'action' => 'edit', $selectionStudentShip['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'selection_student_ships', 'action' => 'delete', $selectionStudentShip['id']), array(), __('Are you sure you want to delete # %s?', $selectionStudentShip['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Selection Student Ship'), array('controller' => 'selection_student_ships', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
-->