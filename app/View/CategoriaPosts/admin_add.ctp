<div class="posts form">
<?php echo $this->Form->create('CategoriaPost');?>
	<fieldset>
		<legend><?php echo __('Categorias Post > Inserir'); ?></legend>
	<?php
		echo $this->Form->input('titulo');
		echo $this->Form->label('Post.Publicado');
		echo $this->Form->select('Post.publicado', array('ativo' => 'Ativo', 'inativo' => 'Inativo'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar'));?>
</div>
<div class="actions">
	<h3><?php echo __('AÇÃO'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index'));?></li>
	</ul>
</div>
