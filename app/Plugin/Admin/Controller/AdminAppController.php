<?php
/**
 * @author Do Tung
 */
class AdminAppController extends AppController {
	public static $limitpages = 30;
	public $components = array(
		'Session', 
		'Auth' => array(
			'className' => 'SiteAuth',
			'loginAction' => array('controller' => 'index', 'action' => 'index'),
			'loginRedirect' => array('controller' => 'result', 'action' => 'index'),
			'logoutRedirect' => array('controller' => 'index', 'action' => 'index'),
			'authenticate' => array(
				'SiteForm' => array(
					'userModel' => 'MstAdmin',
					'passwordHasher' => 'Blowfish'
				)
			),
			'unauthorizedRedirect' => array('controller' => 'index', 'action' => 'index')
		)
	);

	public function beforeFilter(){		
		AuthComponent::$sessionKey = 'Auth.Admin';				
		// if($this->Auth->loggedIn()){			
		// 	$chk = $this->Session->read('Admin_Site');
		// 	if(!$chk){
		// 		$this->redirect(array('plugin'=>'', 'controller' => 'index', 'action' => 'index'));
		// 	}			
		// }
		if($this->request->params['controller'] === 'index'){
			$this->Auth->allow('index', 'logout');
		}
		if($this->request->params['controller'] === 'passwordRemind'){
			$this->Auth->allow('index');
		}
		
	}
}
