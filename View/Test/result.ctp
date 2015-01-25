<div id="content" class="ready">
	<div class="inner cf">
		<div class="fl">
			<h2>考试流程</h2>
			<ol>
				<li>1、确认考试</li>
				<li>2、考试答题</li>
				<li class="curr">3、考试结果</li>
			</ol>
		</div>
		<div class="fr">
			<h2>考试结果</h2>
			<dl>
				<dt>姓名：</dt>
				<dd><?php echo h($student['Student']['name']); ?></dd>
				<dt>学号：</dt>
				<dd><?php echo h($student['Student']['number']); ?></dd>
			</dl>
            <table>
                <thead>
                    <tr>
                        <td>考试科目</td>
                        <td>考试日期</td>
                        <td>考试时间</td>
                        <td>考试分数</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $course['Course']['name']; ?></td>
                        <td><?php echo $exam_student_ship['Exam']['exam_date']; ?></td>
                        <td><?php echo floor($exam_student_ship['ExamStudentShip']['left_time']/60); ?></td>
                        <td><?php echo $exam_student_ship['ExamStudentShip']['grade']; ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="/test/ready" class="btn1 submit">返回考试</a>
		</div>
	</div>
</div>