<h2>Posts</h2>
<h3><?php echo $post['Post']['titulo']?></h3>
<p>
<?php echo nl2br($post['Post']['texto'])?>
</p>
<hr />
<?php
echo $this->Html->link(
    'Voltar para lista de posts',
    array('controller' => 'posts', 'action' => 'index')
);
?>