<?php 
App::uses('AppController', 'Controller');
/**
 * @author Nguyen Duy Linh
 * process log in
 */
class IndexController extends AppController {
	/**
	 * Usage model : MstUser
	 */
	public $uses = array('MstUser');
	
	/**
	 * Use components
	 */
	public $components = array('Session');
		
	/**
	 * login page
	 *	 
	 */
	public function index(){
		$title_for_layout = __('エネルギー効率評価システム | 一般社団法人 日本工業炉協会');
		$this->set('title_for_layout', $title_for_layout);
		
		if($this->Auth->user()){
			return $this->redirect($this->Auth->redirectUrl());
		}
		
		/* because of removing page: /index_en
		// => no need this code. 
		if($this->Session->read('IndexEn')){
			$sess = $this->Session->read('IndexEn');
			$this->request->data['MstUser']['username'] = $sess['username'];
			$this->request->data['MstUser']['password'] = $sess['password'];
			
			$this->Session->delete('IndexEn');	
			
			if($this->Auth->login()){		
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Session->setFlash(__('ユーザー名またはパスワードが間違っています'));
			return $this->redirect(array('controller' => 'index_en', 'action' => 'index'));
		}
		*/
		if($this->request->is('post')){			
			if($this->Auth->login()){			
				//return $this->redirect($this->Auth->redirectUrl());
				return $this->redirect(array('controller' => 'menu', 'action' => 'index'));
			}
			$this->Session->setFlash(__('ユーザー名またはパスワードが間違っています'));
		}
		
		//set url toggle-language
		$locale  = $this->Session->read('Config.language');
		if ($locale == 'eng') {
			$lang = 'jpn';
		} else {
			$lang = 'eng';
		}
		$this->set('url_language', '/index/'.$lang);
	}
	
	public function beforeFilter() {
		//toggle default-language
		$action = $this->action;
		if ($action == "eng") {
			$this->Session->write('Config.language', 'eng');
		} elseif ($action == "jpn") {
			$this->Session->write('Config.language', 'jpn');
		}
	}
	
	public function eng() {
		$this->redirect('index');exit;
	}
	
	public function jpn() {
		$this->redirect('index');exit;
	}
	
	/**
	 * Logout pages	 
	 * 
	 */
	public function logout(){
		$this->Session->delete('Session_User_Draft_Input');	
		$this->Session->delete('Session_Flow_Page');		
		$this->Session->delete('Session_Innovation_Flow_Page');		
		$this->Auth->logout();
		$this->Session->setFlash(__('ログアウトしました。'));
		return $this->redirect(array('controller' => 'index', 'action' => 'index'));
	}
}