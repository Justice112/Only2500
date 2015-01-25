<div id="content" class="ready">
	<div class="inner cf">
		<div class="fl">
			<h2>考试流程</h2>
			<ol>
				<li class="curr">1、确认考试</li>
				<li>2、考试答题</li>
				<li>3、考试结果</li>
			</ol>
		</div>
		<div class="fr">
			<h2>请确认个人信息及考试科目开始考试</h2>
            <h3 style="margin:0 15px"><span class="error_info"><?php echo $this->Session->flash(); ?></span> </h3>
			<dl>
				<dt>姓名：</dt>
				<dd><?php echo h($student['Student']['name']); ?></dd>
				<dt>学号：</dt>
				<dd><?php echo h($student['Student']['number']); ?></dd>
			</dl>
			<form method="post" action="/test/ready" >
				<table>
					<thead>
						<tr>
							<td>考试科目</td>
                            <td>考试日期</td>
                            <td>考试时间</td>
							<td>分数</td>
						</tr>
					</thead>
					<tbody>
						<?php if(isset($exams)){ foreach ($exams as $exam):  ?>
						<tr>
							<td><label class="input_radio"><input type="radio" name="data[Exam][id]" value="<?php echo $exam['Exam']['Exam']['id'] ?>"><?php echo $exam['Exam']['Course']['name']; ?></label></td>
							<td><?php echo $exam['Exam']['Exam']['exam_date']; ?></td>
                            <td><?php echo $exam['Exam']['Course']['exam_time']; ?></td>
                            <td><?php echo h($exam['status']); ?></td>
						</tr>
						<?php endforeach;} ?>
					</tbody>
				</table>
				<a href="javascript:;" class="btn1 submit">确认考试</a>
			</form>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(e) {
        $('.submit').click(function(e) {
            if($('input:radio:checked').val() != null){
                $(this).parents('form').submit();
            }
            else{
                alert('请选择');
            }
        });
		$('tbody tr').click(function(e) {
			$(this).find('input').prop('checked',true);
		});
	});
</script>