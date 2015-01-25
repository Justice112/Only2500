<div class="examStudentShips form">
<?php echo $this->Form->create('Student',array('type'=>'get','url'=>array('controller'=>'ExamStudentShips','action'=>'TeacherAdd',$this->Session->read('exam_id')))); ?>
	<fieldset>
	<?php
        echo $this->Form->input('grade_id',array('label'=>'选择年级'));
		echo $this->Form->input('classroom_id',array('label'=>'选择班级'));	
	?>
	</fieldset>
<?php echo $this->Form->end(__('确定')); ?>
<h2><?php echo __('学生列表'); ?></h2>
	<?php echo $this->Form->create('ExamStudentShip',array('url'=>array('controller'=>'ExamStudentShips','action'=>'TeacherAdd',$this->Session->read('exam_id')))); ?>
		<table cellpadding="0" cellspacing="0">
			<tr class="thead2">
				<th><input type="checkbox" class="checkAll"></th>
				<th><?php echo ('学号'); ?></th>
				<th><?php echo ('姓名'); ?></th>
				<th><?php echo ('年级'); ?></th>
				<th><?php echo ('班级'); ?></th>
			</tr>
			<?php foreach ($students as $student): ?>
			<tr>
				<td><input type="checkbox" class="oneCheck" value="<?php echo h($student['Student']['id']); ?>" name="data[student_id][]"></td>
				<td><?php echo h($student['Student']['number']); ?>&nbsp;</td>
				<td><?php echo h($student['Student']['name']); ?>&nbsp;</td>
				<td><?php echo h($student['Grade']['name']);?>&nbsp;</td>
				<td><?php echo h($student['Classroom']['name']); ?>&nbsp;</td>
			</tr>
			<?php endforeach; ?>
		</table>
	<?php echo $this->Form->end(__('添加')); ?>
</div>
<div class="actions">
	<h3><?php echo __('添加考试学生'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('考试信息表'), array('action' => 'TeacherIndex')); ?></li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'teachers','action' => 'index')); ?></li>
	</ul>
</div>
<script>
$('document').ready(function(){
	var flag = true;
	$('.checkAll').click(function(){
		if(flag ==true){
			$('.oneCheck').prop('checked',true);
			flag=false;
		}
		else{
			$('.oneCheck').prop('checked',false);
			flag=true;
		}
	});
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