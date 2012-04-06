<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 */
class PostsController extends AppController { 

	public function index() {
		$registros = $this->Post->find('all', array('Post.conditions' => array('publicado' => "ativo")));
		$this->set('registros', $registros);
	}

	public function view($hash = null) {
		if($hash){
			$post = $this->Post->findByHash($hash);
			if($post){
				$this->set('post', $this->Post->findByHash($hash));
			}else{
				$this->redirect('/posts');
			}
		}else{
			$this->redirect('/posts');
		}
	}

	public function admin_index() {
		$this->Post->recursive = 0;
		$this->paginate = array('order' => array('id' => 'desc'), 'limit' => 2);
		if($this->request->isPost()){
			$this->excluir();
			$this->redirect(array('action' => 'index'));
		}
		$this->set('posts', $this->paginate());
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Post->create();
			$this->request->data['Post']['hash'] = $this->tratarHash($this->request->data['Post']['titulo']);
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('Post salvo com sucesso'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Por favor, preencha os campos corretamente'));
			}
		}
		$this->Post->CategoriaPost->recursive = 0;
		$categorias = $this->Post->CategoriaPost->find('list', array("fields" => array("CategoriaPost.id", "CategoriaPost.titulo")));
		$this->set("categorias", $categorias);
		
	}

	public function admin_edit($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Post não encontrado'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('Post salvo com sucesso'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Por favor, preencha os campos corretamente'));
			}
		} else {
			$categorias = $this->Post->CategoriaPost->find('list', array("fields" => array("CategoriaPost.id", "CategoriaPost.titulo")));
			$this->set("categorias", $categorias);
			$this->request->data = $this->Post->read(null, $id);
		}
	}

	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Post não encontrado'));
		}
		$post = $this->Post->read(null, $id);
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('O Post '. $post['Post']['titulo'] .' foi apagado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Por favor, preencha os campos corretamente'));
		$this->redirect(array('action' => 'index'));
	}
	
	private function excluir(){
		if(!empty($this->request->data)){
			foreach($this->request->data['Post']['excluir'] as $id){
				$this->Post->id = $id;
				if(!$this->Post->exists()){
					throw new NotFoundException(__('Post não encontrado'));
				}
				$this->Post->read(null, $id);
				if ($this->Post->delete()) {
					$this->Session->setFlash(__('Post(s) apagado(s)'));
				}
			}
		}
	}
}