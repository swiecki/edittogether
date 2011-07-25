<div class="revisions form">
<?php echo $this->Form->create('Revision');?>
	<fieldset>
		<legend><?php __('Add Revision'); ?></legend>
	<?php
		if (isset($this->params['named']['essay_id'])) {
    echo $form->input('essay_id', array('type' => 'hidden', 'value' => $this->params['named']['essay_id']));
} else {
    echo $form->input('essay_id');
}
		echo $this->Form->input('title');
		echo $this->Form->input('content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Revisions', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Essays', true), array('controller' => 'essays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Essay', true), array('controller' => 'essays', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Revisionreviews', true), array('controller' => 'revisionreviews', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Revisionreview', true), array('controller' => 'revisionreviews', 'action' => 'add')); ?> </li>
	</ul>
</div>