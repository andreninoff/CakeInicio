<div class="posts form">
<?php echo $this->Form->create('CategoriaPost');?>
	<fieldset>
		<legend><?php echo __('Add CategoriaPost'); ?></legend>
	<?php
		echo $this->Form->input('titulo');
		echo $this->Form->select('publicado', array("ativo" => "Ativo", "inativo" => "Inativo"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List CategoriaPosts'), array('action' => 'index'));?></li>
	</ul>
</div>
