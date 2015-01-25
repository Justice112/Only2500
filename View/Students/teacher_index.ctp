<div class="students index">
<?php echo $this->Form->create('Student',array('type'=>'get','url'=>array('controller'=>'students','action'=>'TeacherIndex'))); ?>
	<fieldset>
	<?php
        echo $this->Form->input('grade_id',array('label'=>'选择年级'));
		echo $this->Form->input('classroom_id',array('label'=>'选择班级'));	
	?>
	</fieldset>
<?php echo $this->Form->end(__('确定')); ?>
	<h2><?php echo __('学生列表'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id','ID'); ?></th>
			<th><?php echo $this->Paginator->sort('name','姓名'); ?></th>
			<th><?php echo $this->Paginator->sort('number','学号'); ?></th>
			<th><?php echo $this->Paginator->sort('password','登录密码'); ?></th>
			<th><?php echo $this->Paginator->sort('classrom_id','班级'); ?></th>
			<th><?php echo $this->Paginator->sort('grade_id','年级'); ?></th>
			<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($students as $student): ?>
	<tr>
		<td><?php echo h($student['Student']['id']); ?>&nbsp;</td>
		<td><?php echo h($student['Student']['name']); ?>&nbsp;</td>
		<td><?php echo h($student['Student']['number']); ?>&nbsp;</td>
		<td><?php echo h($student['Student']['password']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($student['Classroom']['name'], array('controller' => 'classrooms', 'action' => 'TeacherView', $student['Classroom']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($student['Grade']['name'], array('controller' => 'grades', 'action' => 'TeacherView', $student['Grade']['id'])); ?>
		</td>
			<td class="actions">
			<?php echo $this->Html->link(__('查看'), array('action' => 'TeacherView', $student['Student']['id'])); ?>
			<?php // echo $this->Html->link(__('编辑'), array('action' => 'edit', $student['Student']['id'])); ?>
			<?php //echo $this->Form->postLink(__('删除'), array('action' => 'delete', $student['Student']['id']), array(), __('你确定删除吗 # %s?', $student['Student']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('当前第 {:page}页 共 {:pages}页, 当前第 {:current}条记录 工{:count}条记录 , 当前开始于第 {:start}条, 结束于第 {:end}条')
	));
	?>	</p>	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('上一页'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('下一页') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('学生管理'); ?></h3>
	<ul>
		<li><?php // echo $this->Html->link(__('添加学生'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'teachers','action' => 'index')); ?></li>
	</ul>
</div>
<script>
    $(document).ready(function(){
        $('#StudentGradeId').change(function(){
            $('#StudentClassroomId').html('');
            $.getJSON('/classrooms/ajaxList/'+$(this).val(),function(json){
                $.each(json,function(key,value){
                    $('#StudentClassroomId').append('<option value="'+key+'">'+value+'</option>');
                });
            });
        });
        })
</script>