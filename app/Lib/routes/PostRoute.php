<?php
App::uses('CakeRoute', 'Routing/Route');
class PostRoute extends CakeRoute {
	
	public function parse($url) {
		
		$params = parent::parse($url);
		
		if (empty($params)) {
			return false;
		}

		App::uses('Post', 'Model');

		$post = new Post();

		$count = $post->find('count', array('conditions' => array('Post.hash' => $params['hash'], 'Post.publicado' => 'ativo')));

		if($count) {
			return $params;
		}

		return false;
	}
}