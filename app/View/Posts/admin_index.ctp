<div class="posts index">
	<h2><?php echo __('Posts');?></h2>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="actions"><?php echo __('Actions');?></th>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('categoria_post_id', 'titulo');?></th>
			<th><?php echo $this->Paginator->sort('titulo');?></th>
			<th><?php echo $this->Paginator->sort('texto');?></th>
			<th><?php echo $this->Paginator->sort('publicado');?></th>
	</tr>
	<?php
	foreach ($posts as $post): ?>
	<tr>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $post['Post']['id'])); ?>
			<?php echo $this->Html->link(__('Alterar'), array('action' => 'edit', $post['Post']['id'])); ?>
			<?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $post['Post']['id']), null, __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?>
		</td>
		<td><?php echo h($post['Post']['id']); ?>&nbsp;</td>
		<td><?php echo h($post['CategoriaPost']['titulo']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['titulo']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['texto']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['publicado']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página {:page} de {:pages}, com um total de {:current} registros encontrados {:count}, iniciando em {:start}, finalizando {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('próximo') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Categorias do Post'), array('controller' =>'CategoriaPosts')); ?></li>
		<li><?php echo $this->Html->link(__('Inserir Post'), array('action' => 'add')); ?></li>
	</ul>
</div>
