<h2>Login</h2>
<?php echo $this->Form->create('Cliente');?>
<?php echo $this->Form->input('login');?>
<?php echo $this->Form->input('senha');?>
<?php echo $this->Form->end(__('Conectar'));?>