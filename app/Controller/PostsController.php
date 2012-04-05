<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 */
class PostsController extends AppController {

	public function index() {
		$registros = $this->Post->find('all', array('conditions' => array('publicado' => 1)));
		$this->set('registros', $registros);
	}

	public function view($id = null, $strUrl = "") {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			$this->redirect('/posts');
		}
		$this->set('post', $this->Post->read(null, $id));
	}

	public function admin_index() {
		$this->Post->recursive = 0;
		$this->set('posts', $this->paginate());
	}

	public function admin_view($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Post não encontrado'));
		}
		$this->set('post', $this->Post->read(null, $id));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('Post salvo com sucesso'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Por favor, preencha os campos corretamente'));
			}
		}else{
			$this->Post->CategoriaPost->recursive = 0;
			$categorias = $this->Post->CategoriaPost->find('all', array("fields" => array("titulo")));
			foreach($categorias as $categoria){
				$arrayCategorias[] = array($categoria['CategoriaPost']['id'] => $categoria['CategoriaPost']['titulo']); 
			}
			$this->set("categorias", $arrayCategorias);
		}
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
			$categorias = $this->Post->CategoriaPost->find('all', array("fields" => array("titulo")));
			foreach($categorias as $categoria){
				$arrayCategorias[] = array($categoria['CategoriaPost']['id'] => $categoria['CategoriaPost']['titulo']); 
			}
			$this->set("categorias", $arrayCategorias);
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
}