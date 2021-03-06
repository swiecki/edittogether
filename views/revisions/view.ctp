<div class="revisions view">
<h2><?php  __('Revision');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $revision['Revision']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rating'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $revision['Revision']['rating']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($revision['User']['id'], array('controller' => 'users', 'action' => 'view', $revision['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Essay'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($revision['Essay']['name'], array('controller' => 'essays', 'action' => 'view', $revision['Essay']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $revision['Revision']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Content'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $revision['Revision']['content']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Revision', true), array('action' => 'edit', $revision['Revision']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Revision', true), array('action' => 'delete', $revision['Revision']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $revision['Revision']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Revisions', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Revision', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Essays', true), array('controller' => 'essays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Essay', true), array('controller' => 'essays', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Revisionreviews', true), array('controller' => 'revisionreviews', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Revisionreview', true), array('controller' => 'revisionreviews', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Revisionreviews');?></h3>
	<?php if (!empty($revision['Revisionreview'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Stars'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Revision Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($revision['Revisionreview'] as $revisionreview):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $revisionreview['id'];?></td>
			<td><?php echo $revisionreview['stars'];?></td>
			<td><?php echo $revisionreview['user_id'];?></td>
			<td><?php echo $revisionreview['revision_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'revisionreviews', 'action' => 'view', $revisionreview['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'revisionreviews', 'action' => 'edit', $revisionreview['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'revisionreviews', 'action' => 'delete', $revisionreview['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $revisionreview['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Revisionreview', true), array('controller' => 'revisionreviews', 'action' => 'add', $revision['Revision']['id']));?> </li>
		</ul>
	</div>
</div>
