<div class="teachers form">
<?php echo $this->Form->create('Teacher'); ?>
	<fieldset>
		<legend><?php echo __('编辑该教师'); ?></legend>
	<?php
		echo $this->Form->input('id',array('label'=>'ID'));
		echo $this->Form->input('name',array('label'=>'姓名'));
		echo $this->Form->input('username',array('label'=>'登录名'));
		echo $this->Form->input('password',array('label'=>'密码'));	?>
	</fieldset>
<?php echo $this->Form->end(__('确定')); ?>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('删除该教师'), array('action' => 'adminDelete', $this->Form->value('Teacher.id')), array(), __('您确定要删除  %s 吗?', $this->Form->value('Teacher.name'))); ?></li>
		<li><?php echo $this->Html->link(__('教师列表'), array('action' => 'adminIndex')); ?></li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'admins','action' => 'index')); ?></li>
	</ul>
</div>
