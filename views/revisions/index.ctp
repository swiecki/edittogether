<div class="revisions index">
	<h2><?php __('Revisions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('rating');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('essay_id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('content');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($revisions as $revision):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $revision['Revision']['id']; ?>&nbsp;</td>
		<td><?php echo $revision['Revision']['rating']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($revision['User']['id'], array('controller' => 'users', 'action' => 'view', $revision['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($revision['Essay']['name'], array('controller' => 'essays', 'action' => 'view', $revision['Essay']['id'])); ?>
		</td>
		<td><?php echo $revision['Revision']['title']; ?>&nbsp;</td>
		<td><?php echo $revision['Revision']['content']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $revision['Revision']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $revision['Revision']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $revision['Revision']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $revision['Revision']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Revision', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Essays', true), array('controller' => 'essays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Essay', true), array('controller' => 'essays', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Revisionreviews', true), array('controller' => 'revisionreviews', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Revisionreview', true), array('controller' => 'revisionreviews', 'action' => 'add')); ?> </li>
	</ul>
</div>