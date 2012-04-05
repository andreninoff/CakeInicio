<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 */
class CategoriaPost extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'titulo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo Obrigatório',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'publicado' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo Obrigatório',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	public $hasMany = array(	
		'Post' => array(
			"className" => "Post",
			"conditions" => array("Post.publicado" => "ativo"),
			"dependent" => true	
		)
	);
}
