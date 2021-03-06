<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 */
class CategoriaPostsController extends AppController {

	public function admin_index() {
		$this->CategoriaPost->recursive = 0;
		$this->paginate = array('order' => array('id' => 'desc'), 'limit' => 2);
		if($this->request->isPost()){
			$this->excluir();
			$this->redirect(array('action' => 'index'));
		}
		$this->set('categorias', $this->paginate("CategoriaPost"));
	}
	
	
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CategoriaPost->create();
			if ($this->CategoriaPost->save($this->request->data)) {
				$this->Session->setFlash(__('Categoria salvo com sucesso'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Por favor, preencha os campos corretamente'));
			}
		}
	}

	public function admin_edit($id = null) {
		$this->CategoriaPost->id = $id;
		if (!$this->CategoriaPost->exists()) {
			throw new NotFoundException(__('Categoria não encontrado'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CategoriaPost->save($this->request->data)) {
				$this->Session->setFlash(__('Post salvo com sucesso'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Por favor, preencha os campos corretamente'));
			}
		} else {
			$this->request->data = $this->CategoriaPost->read(null, $id);
		}
	}

	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->CategoriaPost->id = $id;
		if (!$this->CategoriaPost->exists()) {
			throw new NotFoundException(__('Categoria não encontrado'));
		}
		$categoria = $this->CategoriaPost->read(null, $id);
		if ($this->CategoriaPost->delete()) {
			$this->Session->setFlash(__('A Categoria '. $categoria['CategoriaPost']['titulo'] .' foi apagada'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Por favor, preencha os campos corretamente'));
		$this->redirect(array('action' => 'index'));
	}
	
	private function excluir(){
		if(!empty($this->request->data)){
			foreach($this->request->data['CategoriaPost']['excluir'] as $id){
				$this->CategoriaPost->id = $id;
				if(!$this->CategoriaPost->exists()){
					throw new NotFoundException(__('Categoria não encontrado'));
				}
				$this->CategoriaPost->read(null, $id);
				if ($this->CategoriaPost->delete()) {
					$this->Session->setFlash(__('Categoria(s) apagada(s)'));
				}
			}
		}
	}
}