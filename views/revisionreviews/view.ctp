<div class="revisionreviews view">
<h2><?php  __('Revisionreview');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $revisionreview['Revisionreview']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Stars'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $revisionreview['Revisionreview']['stars']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($revisionreview['User']['id'], array('controller' => 'users', 'action' => 'view', $revisionreview['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Revision'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($revisionreview['Revision']['title'], array('controller' => 'revisions', 'action' => 'view', $revisionreview['Revision']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Revisionreview', true), array('action' => 'edit', $revisionreview['Revisionreview']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Revisionreview', true), array('action' => 'delete', $revisionreview['Revisionreview']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $revisionreview['Revisionreview']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Revisionreviews', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Revisionreview', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Revisions', true), array('controller' => 'revisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Revision', true), array('controller' => 'revisions', 'action' => 'add')); ?> </li>
	</ul>
</div>
