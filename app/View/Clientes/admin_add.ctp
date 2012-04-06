<div class="posts form">
<?php echo $this->Form->create('Cliente');?>
	<fieldset>
		<legend><?php echo __('Cliente > Inserir'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('email');
		echo $this->Form->input('login');
		echo $this->Form->label('Senha');
		echo $this->Form->password('senha');
		echo $this->Form->label('Publicado');
		echo $this->Form->select('Cliente.publicado', array('ativo' => 'Ativo', 'inativo' => 'Inativo'));
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
