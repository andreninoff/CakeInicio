<div class="posts form">
<?php echo $this->Form->create('Post');?>
	<fieldset>
		<legend><?php echo __('Post > Alterar'); ?></legend>
	<?php
		echo $this->Form->label('Post.Categoria');
		echo $this->Form->input('id');
		echo $this->Form->select('categoria_post_id', array($categorias));
		echo $this->Form->input('titulo');
		echo $this->Form->input('texto');
		echo $this->Form->select('publicado', array("ativo" => "Ativo", "inativo" => "Inativo"));
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
