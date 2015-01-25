<div class="grades form">
<?php echo $this->Form->create('Grade'); ?>
	<fieldset>
		<legend><?php echo __('编辑年级信息'); ?></legend>
	<?php
		echo $this->Form->input('id',array('label'=>'ID'));
		echo $this->Form->input('name',array('label'=>'年级名'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('确定')); ?>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('删除该年级'), array('action' => 'delete', $this->Form->value('Grade.id')), array(), __('您确定要删除 # %s吗？', $this->Form->value('Grade.name'))); ?></li>
		<li><?php echo $this->Html->link(__('年级列表'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('返回首页'), array('controller'=>'admins','action' => 'index')); ?></li>
	</ul>
</div>
