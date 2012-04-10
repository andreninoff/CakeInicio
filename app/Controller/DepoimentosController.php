<?php
App::uses('AppController', 'Controller');
/**
 * Depoimentos Controller
 *
 * @property Depoimento $Depoimento
 */
class DepoimentosController extends AppController { 

	public function index() {
		$registros = $this->Depoimento->find('all', array('Depoimento.conditions' => array('publicado' => "ativo")));
		$this->set('registros', $registros);
	}

	public function admin_index() {
		$this->Depoimento->recursive = 0;
		$this->paginate = array('order' => array('id' => 'desc'), 'limit' => 2);
		if($this->request->isPost()){
			$this->excluir();
			$this->redirect(array('action' => 'index'));
		}
		$this->set('depoimentos', $this->paginate());
	}

	public function admin_add() {
		if ($this->request->isPost()) {
			$this->Depoimento->create();
			if ($this->Depoimento->save($this->request->data)) {
				$this->Session->setFlash(__('Depoimento salvo com sucesso'));
				$this->redirect(array('action' => 'admin_index'));
			} else {
				$this->Session->setFlash(__('Por favor, preencha os campos corretamente'));
			}
		}
		$this->Depoimento->recursive = 0;
	}

	public function admin_edit($id = null) {
		$this->Depoimento->id = $id;
		if (!$this->Depoimento->exists()) {
			throw new NotFoundException(__('Depoimento não encontrado'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Depoimento->save($this->request->data)) {
				$this->Session->setFlash(__('Depoimento salvo com sucesso'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Por favor, preencha os campos corretamente'));
			}
		} else {
			$this->request->data = $this->Depoimento->read(null, $id);
		}
	}

	public function admin_delete($id = null) {
		if (!$this->request->is('depoimento')) {
			throw new MethodNotAllowedException();
		}
		$this->Depoimento->id = $id;
		if (!$this->Depoimento->exists()) {
			throw new NotFoundException(__('Depoimento não encontrado'));
		}
		$depoimento = $this->Depoimento->read(null, $id);
		if ($this->Depoimento->delete()) {
			$this->Session->setFlash(__('O Depoimento '. $depoimento['Depoimento']['titulo'] .' foi apagado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Por favor, preencha os campos corretamente'));
		$this->redirect(array('action' => 'index'));
	}
	
	private function excluir(){
		if(!empty($this->request->data)){
			foreach($this->request->data['Depoimento']['excluir'] as $id){
				$this->Depoimento->id = $id;
				if(!$this->Depoimento->exists()){
					throw new NotFoundException(__('Depoimento não encontrado'));
				}
				$this->Depoimento->read(null, $id);
				if ($this->Depoimento->delete()) {
					$this->Session->setFlash(__('Depoimento(s) apagado(s)'));
				}
			}
		}
	}
}