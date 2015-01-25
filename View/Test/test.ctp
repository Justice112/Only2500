<div id="content" class="test">
	<div class="inner cf">
		<div class="fl">
			<h2>当前考试科目为：<strong><?php echo $exam['Course']['name']; ?></strong></h2>
			<p class="test_time">考试时间共:<strong><?php echo $exam['Course']['exam_time']; ?></strong>分钟</p>
			<p class="count_down">距考试结束还有:<strong><?php echo floor($left_time/60); ?></strong>分钟</p>
			<p class="rest_question">您还有<strong><?php echo $unanswer ?></strong>未答</p>
		</div>
		<div class="fr">
			<h3>第<span><?php echo $recent_number; ?></span>题，题目类型：<strong>单选题</strong>，题目分值：<strong><?php echo floor(100/$exam['Course']['selection_number']); ?></strong></h3>
			<p><?php echo $selectionstudentship['Selection']['topic']; ?></p>
			<?php if($selectionstudentship['Selection']['picture']){ ?>
                <img src="/images/selectionImg/<?php echo $selectionstudentship['Selection']['picture'] ; ?>">
            <?php } ?>
			<p class="description">请答题</p>
			<form method="post" action="/test/test/<?php echo $recent_number; ?>" >
				<label class="input_radio"><input type="radio" value="A" name="data[answer]">A：<?php echo $selectionstudentship['Selection']['optionA']; ?></label>
				<label class="input_radio"><input type="radio" value="B" name="data[answer]">B：<?php echo $selectionstudentship['Selection']['optionB']; ?></label>
				<label class="input_radio"><input type="radio" value="C" name="data[answer]">C：<?php echo $selectionstudentship['Selection']['optionC']; ?></label>
				<label class="input_radio"><input type="radio" value="D" name="data[answer]">D：<?php echo $selectionstudentship['Selection']['optionD']; ?></label>
				
				<div class="btnbox cf">
                    <?php if($recent_number<$exam['Course']['selection_number']){ ?>
                        <a href="javascript:;" class="btn1 submit">下一题</a>
                    <?php }else{ ?>
                        <a href="javascript:;" class="btn1 submit" onclick= "return confirm('是否确定');">交卷</a>
                    <?php } ?>
                    <?php if($recent_number>1){ ?>
					    <a href="/test/test/<?php echo $recent_number-1; ?>" class="btn1 prev">上一题</a>
                    <?php } ?>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
    function online(){
        $.get('/Test/ajaxCheck',function(data,status){
            if(data == 'post'){
                location.href = '/test/ready';
            }
            else if (data == 'error'){
                location.href = '/users/logout';
            }
            else{
                $('.count_down strong').text(Math.floor(data/60));
                setTimeout("online()", 5000);
            }
        });
    }
    $(document).ready(function(e){
        $('.submit').click(function(e) {
            if($('input:radio:checked').val() != null){
                $(this).parents('form').submit();
            }
            else{
                alert('请选择');
            }
        });
        $('input[value = "<?php echo $selectionstudentship['SelectionStudentShip']['answer']; ?>"]').prop('checked',true);
        online();
    })
</script>