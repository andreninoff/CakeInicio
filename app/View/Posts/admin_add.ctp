<div class="posts form">
<?php echo $this->Form->create('Post');?>
	<fieldset>
		<legend><?php echo __('Add Post'); ?></legend>
	<?php
		echo $this->Form->select('categoria_post_id', array($categorias));
		echo $this->Form->input('titulo');
		echo $this->Form->input('texto');
		echo $this->Form->select('publicado', array("ativo" => "Ativo", "inativo" => "Inativo"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index'));?></li>
	</ul>
</div>
