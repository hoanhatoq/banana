<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	/**
	 * Use components
	 */
	public $components = array(		
		'DebugKit.Toolbar',
		'Session',
		'Auth' => array(
			'className' => 'SiteAuth',
			'loginAction' => array(
				'controller' => 'index',
				'action' => 'index'
			),
			'loginRedirect' => array(
				'controller' => 'menu',
				'action' => 'index'
			),
			'logoutRedirect' => array(
				'controller' => 'logout',
				'action' => 'index'
			),
			'authenticate' => array(
				'SiteForm' => array(
					'userModel' => 'MstUser',
					'passwordHasher' => 'Blowfish'					
				)
			),
			'unauthorizedRedirect' => array(
				'controller' => 'index',
				'action' => 'index'
			)
		),

	);
	
	/**
	 * Allow user to access some page without login
	 * 
	 */
	public function beforeFilter(){	
		// if($this->Auth->loggedIn()){			
		// 	$chk = $this->Session->read('Admin_Site');
		// 	if($chk){				
		// 		$this->redirect(array('plugin'=>'admin', 'controller' => 'index', 'action' => 'index'));
		// 	}			
		// }		
		if($this->request->params['controller'] === 'index'){
			$this->Auth->allow('index', 'logout');
		}
		if($this->request->params['controller'] === 'index_en'){
			$this->Auth->allow('index');
		}
		if($this->request->params['controller'] === 'logout'){
			$this->Auth->allow('index');
		}
		if($this->request->params['controller'] === 'password_remind'){
			$this->Auth->allow('index', 'complete');
		}		
	}
}
