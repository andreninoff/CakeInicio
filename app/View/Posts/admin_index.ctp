<div class="posts index">
	<h2><?php echo __('Posts > Index');?></h2>
	<h2><?php echo $this->Html->link(__('Inserir'), array('action' => 'add')); ?></h2>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="actions">&nbsp;</th>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('categoria_post_id', 'titulo');?></th>
			<th><?php echo $this->Paginator->sort('titulo');?></th>
			<th><?php echo $this->Paginator->sort('texto');?></th>
			<th><?php echo $this->Paginator->sort('publicado');?></th>
	</tr>
	<form action="" id="CategoriaPostAdminForm" method="post" accept-charset="utf-8">
		<?php
		foreach ($posts as $post): ?>
		<tr>
			<td class="actions"><input type="checkbox" name="data[Post][excluir][]"  id="checkbox_<?=$post['Post']['id']?>" value="<?=$post['Post']['id']?>"/></td>
			<td><?php echo $this->Html->link(__(h($post['Post']['id'])), array('action' => 'edit', $post['Post']['id'])); ?></td>
			<td><?php echo $this->Html->link(__(h($post['CategoriaPost']['titulo'])), array('action' => 'edit', $post['Post']['id'])); ?></td>
			<td><?php echo $this->Html->link(__(h($post['Post']['titulo'])), array('action' => 'edit', $post['Post']['id'])); ?></td>
			<td><?php echo $this->Html->link(__(h($post['Post']['texto'])), array('action' => 'edit', $post['Post']['id'])); ?></td>
			<td><?php echo $this->Html->link(__(h($post['Post']['publicado'])), array('action' => 'edit', $post['Post']['id'])); ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
	<br/>
	<?php echo $this->Form->end(__('Excluir'), __('Excluir selecionado(s)'));?>
	<br/>
	<hr>
	<br/>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página atual: {:page} de um total de {:pages}. <br/> Total de registros encontrados: {:count}. <br/> Exibindo: de {:start} até {:end}')
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
	<h3><?php echo __('MENU'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Categorias do Post'), array('controller' =>'categoriaPosts')); ?></li>
		<li><?php echo $this->Html->link(__('Clientes'), array('controller' =>'clientes')); ?></li>
	</ul>
</div>
