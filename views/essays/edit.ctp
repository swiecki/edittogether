<div class="essays form">
<?php echo $this->Form->create('Essay');?>
	<fieldset>
		<legend><?php __('Edit Essay'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('content');
		echo $this->Form->input('user_id');
		echo $this->Form->input('revision_count');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Essay.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Essay.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Essays', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Revisions', true), array('controller' => 'revisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Revision', true), array('controller' => 'revisions', 'action' => 'add')); ?> </li>
	</ul>
</div>