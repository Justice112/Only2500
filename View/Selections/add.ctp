<div class="selections form">
<?php echo $this->Form->create('Selection'); ?>
	<fieldset>
		<legend><?php echo $course['Course']['name']; ?>-----<?php echo __('添加题目'); ?></legend>
	<?php
		echo $this->Form->input('id',array('label'=>'ID'));
		echo $this->Form->input('topic',array('label'=>'题目'));
    ?>
    <div class="input text">
        <label>上传图片</label>
        <input id="file_upload" name="file_upload" type="file" multiple="true">
        <input id="src" name="data[Selection][picture]" type="hidden">
    </div>
    <?php
		echo $this->Form->input('optionA',array('label'=>'选项A'));
		echo $this->Form->input('optionB',array('label'=>'选项B'));
		echo $this->Form->input('optionC',array('label'=>'选项C'));
		echo $this->Form->input('optionD',array('label'=>'选项D'));
		echo $this->Form->input('answer',array('options' => array('A'=>'A','B'=>'B','C'=>'C','D'=>'D'),'label'=>'正确答案'));
	?>
	<input type="hidden" name="data[Selection][course_id]" value="<?php echo $course['Course']['id']; ?>">
	</fieldset>
<?php echo $this->Form->end(__('确定')); ?>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('考题列表'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('返回上一级'), $this->request->referer()); ?></li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'admins','action' => 'index')); ?></li>
	</ul>
</div>
<link rel="stylesheet" type="text/css" href="/css/uploadify.css">
<script type="text/javascript" src="/js/jquery.uploadify.js"></script>
<script type="text/javascript">
    <?php $timestamp = time();?>
    $(document).ready(function(){
        $('#file_upload').uploadify({
            'formData'     : {
                'timestamp' : '<?php echo $timestamp;?>',
                'token'     : '<?php echo md5('Jiaqi.Feng' . $timestamp);?>'
            },
            'swf'      : '/uploadify.swf',
            'uploader' : '/Selections/uploadImg',
            'onUploadSuccess' : function(file, data, response) {
                $('#file_upload').hide().after('<img id="cropbox" src="/images/selectionImg/'+data+'" width="500">');
                $('#src').val(data);
            }
        });
    });
</script>