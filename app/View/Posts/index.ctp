<h2>Posts</h2>
<ul>
	<?php 
	foreach($registros as $dado){
	?>
		<li>
			<?php
			echo $this->Html->link(
			    $dado['Post']['titulo'],
			    array('controller' => '', 'action' => $dado['Post']['hash'])
			);
			?>
		</li>
	<?php
	}
	?>
</ul>