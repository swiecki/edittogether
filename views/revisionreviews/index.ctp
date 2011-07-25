<div class="revisionreviews index">
	<h2><?php __('Revisionreviews');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('stars');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('revision_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($revisionreviews as $revisionreview):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $revisionreview['Revisionreview']['id']; ?>&nbsp;</td>
		<td><?php echo $revisionreview['Revisionreview']['stars']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($revisionreview['User']['id'], array('controller' => 'users', 'action' => 'view', $revisionreview['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($revisionreview['Revision']['title'], array('controller' => 'revisions', 'action' => 'view', $revisionreview['Revision']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $revisionreview['Revisionreview']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $revisionreview['Revisionreview']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $revisionreview['Revisionreview']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $revisionreview['Revisionreview']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Revisionreview', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Revisions', true), array('controller' => 'revisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Revision', true), array('controller' => 'revisions', 'action' => 'add')); ?> </li>
	</ul>
</div>