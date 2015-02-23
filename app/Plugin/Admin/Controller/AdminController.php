<?php
/**
 * @author Ha Manh Linh
 * Admin page
 */
class AdminController extends AdminAppController{
	/**
	 * Uses model MstAdmin
	 */
	public $uses = array('MstAdmin');

	public $name = "Admin";

	public $helpers = array('Paginator','Html');

	public $components = array('Session','RequestHandler'); 

	public $paginate = array();

	public $layout = 'admin';

	/**
  	* Set title for all page
  	*/
	public function beforeRender(){
		$title_for_layout = __('エネルギー効率評価システム | 一般社団法人 日本工業炉協会');
		$this->set('title_for_layout', $title_for_layout); 
	}

	/**
	 * Function search - url
	 * @return void
	 */
	public function search() { 
		// the page we will redirect to 
		$url['action'] = 'index'; 
		// build a URL will all the search elements in it 
		foreach ($this->request->data as $k=>$v){ 
			foreach ($v as $kk=>$vv){ 
				$tmpV = str_replace('/', '', $vv); 
    			$url[$k.'.'.$kk] = str_replace('\\', '', $tmpV);
			} 
		} 
		// redirect the user to the url 
		$this->redirect($url, null, true); 
	} 
	public function index(){

		/**
    	* paginate
    	*
    	*/
    	$this->paginate= array( 
    		// $limitpages defined in AdminAppController
			'limit' => parent::$limitpages, 
		); 
		$conditions = array(); 
		$data = array();
		$this->set('users',$this->paginate());
		//search
		if(!empty($this->passedArgs)){ 

			//paginate with fillter username
			if(isset($this->passedArgs['MstAdmin.username'])) { 
				$username = $this->passedArgs['MstAdmin.username']; 
				$conditions[] = array( 
				            'OR' => array(
                    		'MstAdmin.username LIKE' => "%$username%", 
                    		'MstAdmin.email LIKE' => "%$username%", 
                			)
				);
				$data['MstAdmin']['username'] = $username; 
		} 
			//paginate
			$this->data = $data; 
			$this->set("users",$this->paginate("MstAdmin",$conditions)); 
    	}	
	}

	/**
	 * Admin add
	 */
	public function add(){

    	if ($this->request->is('post')) {

			$mstAdmin = $this->request->data;
			$mstAdmin['MstAdmin']['created'] = date('Y-m-d H:i:s');
			$mstAdmin['MstAdmin']['updated'] = date('Y-m-d H:i:s');
			$exists = $this->MstAdmin->findByUsername($mstAdmin['MstAdmin']['username']);
			
			if ($exists){
				$this->Session->setFlash(__('ユーザー名は既に存在しています。他のユーザー名を入力してください'));

			}else{				
				$this->MstAdmin->create();
				 if ($this->MstAdmin->save($mstAdmin)) {
					$this->Session->setFlash(__(('会員'). $mstAdmin['MstAdmin']['username'].('を登録しました。')));	
					return $this->redirect(array('plugin'=> 'admin', 'controller' => 'admin','action' => 'index'));
				} else {
			$error = $this->MstAdmin->validationErrors;
			$this->set('error', $error);
			}
			}
		}
	}
	/**
	 * Admin edit
	 */
	public function edit($id = null){

		if (!$this->MstAdmin->exists($id)) {
			throw new NotFoundException(__('ユーザーアカウントは誤っています'));
		}
		if ($this->request->is(array('post', 'put'))) {
				$mstAdmin = $this->request->data;
				$mstAdmin['MstAdmin']['updated'] = date('Y-m-d H:i:s');
			if ($this->MstAdmin->saves($mstAdmin)) {
				$this->Session->setFlash(__('会員情報を更新完了しました'));
				return $this->redirect(array('action' => 'index'));
			 } 
			  else {
				$error = $this->MstAdmin->validationErrors;
				$this->set('error', $error);
			}
		} else {
			$options = array('conditions' => array('MstAdmin.' . $this->MstAdmin->primaryKey => $id));
			$this->request->data = $this->MstAdmin->find('first', $options);
		}
	}

	/**
	 * Admin delete
	 */
	public function delete($id = null){

		$this->MstAdmin->id = $id;
		if (!$this->MstAdmin->exists()) {
			throw new NotFoundException(__('ユーザーアカウントは誤っています'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->MstAdmin->delete()) {
			$this->Session->setFlash(__('ユーザーアカウントが削除されました'));
		} else {
			$this->Session->setFlash(__('ユーザーアカウントを削除失敗しましたので再度試してしてください'));
		}
		return $this->redirect(array('plugin'=> 'admin', 'controller' => 'admin','action' => 'index'));
	}

}