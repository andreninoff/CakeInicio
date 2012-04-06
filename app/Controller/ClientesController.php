<?php
App::uses('AppController', 'Controller');
/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
 */
class ClientesController extends AppController { 

	public function index() {
		$registros = $this->Cliente->find('all', array('Cliente.conditions' => array('publicado' => "ativo")));
		$this->set('registros', $registros);
	}

	public function admin_index() {
		$this->Cliente->recursive = 0;
		$this->paginate = array('order' => array('id' => 'desc'), 'limit' => 2);
		if($this->request->isPost()){
			foreach($this->request->data['Cliente']['excluir'] as $id){
				$this->excluirMultiplas($id);
			}
			$this->redirect(array('action' => 'index'));
		}
		$this->set('clientes', $this->paginate());
	}

	public function admin_add() {
		if ($this->request->isPost()) {
			$this->Cliente->create();
			$this->request->data['Cliente']['senha'] = md5($this->request->data['Cliente']['senha']);
			if ($this->Cliente->save($this->request->data)) {
				$this->Session->setFlash(__('Cliente salvo com sucesso'));
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$this->Session->setFlash(__('Por favor, preencha os campos corretamente'));
			}
		}
		$this->Cliente->recursive = 0;
	}

	public function admin_edit($id = null) {
		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			throw new NotFoundException(__('Cliente não encontrado'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Cliente->save($this->request->data)) {
				$this->Session->setFlash(__('Cliente salvo com sucesso'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Por favor, preencha os campos corretamente'));
			}
		} else {
			$this->request->data = $this->Cliente->read(null, $id);
		}
	}

	public function admin_delete($id = null) {
		if (!$this->request->is('cliente')) {
			throw new MethodNotAllowedException();
		}
		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			throw new NotFoundException(__('Cliente não encontrado'));
		}
		$cliente = $this->Cliente->read(null, $id);
		if ($this->Cliente->delete()) {
			$this->Session->setFlash(__('O Cliente '. $cliente['Cliente']['titulo'] .' foi apagado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Por favor, preencha os campos corretamente'));
		$this->redirect(array('action' => 'index'));
	}
	
	private function excluirMultiplas($id){
		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			throw new NotFoundException(__('Cliente não encontrado'));
		}
		$categoria = $this->Cliente->read(null, $id);
		if ($this->Cliente->delete()) {
			$this->Session->setFlash(__('Cliente(s) apagado(s)'));
		}
	}
}