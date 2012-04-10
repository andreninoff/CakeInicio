<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'posts', 'action' => 'index', 'home'));

	/**
	 * fazendo dessa forma evita, por exemplo, que /clientes seja redirecionado para /posts pq nao achou a hash 'clientes',
	 * quando na verdade a intenção era acessar o controlador de clientes.
	 * Evita também de ter que declarar rotas para todos os controllers por conta desse comportamento.
	 */
	App::uses('PostRoute', 'Lib/routes');
	Router::connect('/:hash', array('controller' => 'posts', 'action' => 'view'), array('pass' => array('hash'), 'routeClass' => 'PostRoute'));

/**
 * Gambi para as urls dos controllers do plugin funcionar como se fossem controllers da app :D
 * esse if existe pois evita MissingPluginException caso acesse uma url do plugin (ex.: /blog/teste) sem o mesmo estar carregado.
 */
	if(CakePlugin::loaded('Blog')){
		Router::connect('/blog/:action', array('plugin' => 'Blog', 'controller' => 'blog'));
		Router::connect('/admin/blog/:action', array('plugin' => 'Blog', 'controller' => 'blog', 'prefix' => 'admin'));
	}
	
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */

	/*
	 * //www.site.com.br/hash
	 */
//	Router::connect('/posts', array('controller' => 'posts', 'action' => 'index', 'home'));
//	Router::connect('/login', array('controller' => 'login', 'action' => 'index', 'login'));
//	Router::connect('/:hash',  array('controller' => 'posts', 'action' => 'view'), array('pass' => array('hash'))); 
	
	/*
	 * www.site.com.br/posts/hash
	 */
//	Router::connect('/posts/:hash',  array('controller' => 'posts', 'action' => 'view'), array('pass' => array('hash')));

/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
