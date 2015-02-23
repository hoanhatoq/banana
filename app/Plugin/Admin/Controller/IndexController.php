<?php 
/**
 * @author 
 * login, logout
 */
class IndexController extends AdminAppController {
	public $helpers = array('Html', 'Form');
	/**
	 * Use model MstAdmin
	 */
	public $uses = array('MstAdmin');

	/**
  	* Set title for all page
  	*/
	public function beforeRender(){
		$title_for_layout = __('エネルギー効率評価システム | 一般社団法人 日本工業炉協会');
		$this->set('title_for_layout', $title_for_layout); 
	}
	
	/**
	 * login
	 */
	public function index(){

		if($this->Auth->user()){ 			
			return $this->redirect($this->Auth->redirectUrl());
		}

		if($this->request->is('post')){
			if($this->Auth->login()){
				$this->Session->write('Admin_Site', 1);
				//return $this->redirect($this->Auth->redirectUrl());
				return $this->redirect(array('controller' => 'result'));
			}
			else{
				$this->Session->setFlash(__('ログインID・パスワードが誤りしています'));
			}
		}

	}

	/**
	 * logout
	 */
	public function logout(){
		$this->Session->delete('Admin_Site');
		return $this->redirect($this->Auth->logout());
	}
}