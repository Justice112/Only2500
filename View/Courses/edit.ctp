<div class="courses form">
<?php echo $this->Form->create('Course'); ?>
	<fieldset>
		<legend><?php echo __('编辑科目信息'); ?></legend>
	<?php
		echo $this->Form->input('id',array('label'=>'ID'));
		echo $this->Form->input('name',array('label'=>'名称'));
		echo $this->Form->input('exam_time',array('label'=>'考试时间'));
        echo $this->Form->input('selection_number',array('label'=>'考试题数'));
		echo $this->Form->input('open_score',array('options'=>array(TRUE=>'是',FALSE=>'否'),'label'=>'是否公开'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('确定')); ?>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('删除该科目'), array('action' => 'delete', $this->Form->value('Course.id')), array(), __('您确定要删除  %s 吗?', $this->Form->value('Course.name'))); ?></li>
		<li><?php echo $this->Html->link(__('科目列表'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'admins','action' => 'index')); ?></li>
	</ul>
</div>

<script>
    var maxnumber = <?php echo $maxnumber; ?>;
    $(document).ready(function(){
        $('#CourseSelectionNumber').change(function(){
            if($(this).val()>maxnumber||$(this).val()<0){
                $(this).val('0');
                alert('题目数量超出限制');
            }
        })
    })
</script>