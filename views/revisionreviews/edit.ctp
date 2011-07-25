<div class="revisionreviews form">
<?php echo $this->Form->create('Revisionreview');?>
	<fieldset>
		<legend><?php __('Edit Revisionreview'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('stars');
		echo $this->Form->input('user_id');
		echo $this->Form->input('revision_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Revisionreview.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Revisionreview.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Revisionreviews', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Revisions', true), array('controller' => 'revisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Revision', true), array('controller' => 'revisions', 'action' => 'add')); ?> </li>
	</ul>
</div>