<div class="posts form">
<?php echo $this->Form->create('Cliente');?>
	<fieldset>
		<legend><?php echo __('Cliente > Alterar'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('email');
		echo $this->Form->input('login');
		echo $this->Form->password('senha');
		echo $this->Form->label('Post.Publicado');
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
