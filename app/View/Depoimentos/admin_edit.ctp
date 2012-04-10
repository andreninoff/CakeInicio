<div class="posts form">
<form action="" id="edit" method="post">
	<fieldset>
		<legend><?php echo __('Cliente > Alterar'); ?></legend>
		<div class="input text required">
			<label for="nome">Nome</label>
			<input name="nome" maxlength="255" value="<?=$this->request->data['Depoimento']['nome']?>" type="text" id="nome"/>
		</div>
		<div class="input text required">
			<label for="email">E-mail</label>
			<input name="email" maxlength="255" type="text" value="<?=$this->request->data['Depoimento']['email']?>" id="email"/>
		</div>
		<div class="input text required">
			<label for="depoimento">Depoimento</label>
			<textarea rows="10" cols="" name="depoimento"><?=$this->request->data['Depoimento']['depoimento']?></textarea>
		</div>
		<div class="input text required">
			<label for="data">Data</label>
			<input name="data" maxlength="255" type="text" value="<?=$this->request->data['Depoimento']['data']?>" id="data"/>
		</div>
		<?php 
		echo $this->Form->label('Publicado');
		echo $this->Form->select('Depoimento.publicado', array("ativo" => "Ativo", "inativo" => "Inativo"));
		?>
	</fieldset>
	<input type="submit" name="cadastrar" value="Salvar">
</form>
</div>
<div class="actions">
	<h3><?php echo __('AÇÃO'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Voltar'), array('action' => 'index'));?></li>
	</ul>
</div>
