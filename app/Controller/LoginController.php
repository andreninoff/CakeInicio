<?php
App::uses('AppController', 'Controller');
/**
 * Login Controller
 *
 * @property Cliente $Cliente
 */
class LoginController extends AppController { 
	
	public function beforeFilter(){
		$this->Auth->authenticate = array(
		    'Form' => array('userModel' => 'Cliente'),
		    'Basic' => array('userModel' => 'Cliente')
		);
	}

   public $components = array(
	    'Auth' => array(
	        'authError' => 'Did you really think you are allowed to see that?',
	        'authenticate' => array(
	            'Form' => array(
	                'fields' => array('username' => 'login', 'password' => 'senha')
	            )
	        )
	    )
	);

	public function index() {
		
	}
	
	public function login() {
		var_dump($this->request->data); die();
	}

}