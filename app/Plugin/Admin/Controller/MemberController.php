<?php
/**
 * @author
 * Member page
 */
class MemberController extends AdminAppController{
	public $helpers = array('Html', 'Form','Paginator');
	/**
	 * Use model MstUser
	 */
	public $uses = array('MstUser');
	/**
	 * Page
	 */
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
	 * function search
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

	/**
	 * Member list
	 */
	public function index(){
		// paging
		$this->paginate= array( 
			// $limitpages defined in AdminAppController
			'limit' => parent::$limitpages,
			'order' => array('fullname' => 'asc'), 
		);
		$conditions = array(); 
		$data = array();
		$this->set('posts',$this->paginate());
		// search
		if(!empty($this->passedArgs)){ 
			//Fillter fullname + email
			if(isset($this->passedArgs['MstUser.fullname'])) { 
				$fullname = $this->passedArgs['MstUser.fullname']; 
				$conditions[] = array( 
				            'OR' => array(
                    		'MstUser.fullname LIKE' => "%$fullname%", 
                    		'MstUser.email LIKE' => "%$fullname%", 
                	)
				); 
				$data['MstUser']['fullname'] = $fullname; 
			} 
			//paginate
			$this->data = $data; 
			$this->set("posts",$this->paginate("MstUser",$conditions)); 
		} 
	}

	/**
	 * Member add
	 */
	public function add(){

		if ($this->request->is('post')) {
			$mstUser = $this->request->data;
			
			$mstUser['MstUser']['created'] = date('Y-m-d H:i:s');
			$mstUser['MstUser']['updated'] = date('Y-m-d H:i:s');

			$exist = $this->MstUser->findByEmail($mstUser['MstUser']['email']);
			
			if ($exist){
				$this->Session->setFlash(__(' メールアドレスが既に存在しました'));

			
			$exists = $this->MstUser->findByUsername($mstUser['MstUser']['username']);
			
			if ($exists){
				$this->Session->setFlash(__('ユーザー名は既に存在しています。他のユーザー名を入力してください'));

			}}
			else{

			$this->MstUser->create();
			if ($this->MstUser->save($mstUser)) {
				$this->Session->setFlash(__('会員'). $mstUser['MstUser']['username'] .__('を登録しました'));
				return $this->redirect(array('action' => 'index'));

			} else {
			$error = $this->MstUser->validationErrors;
			$this->set('error', $error);
			}
		}
	}
	}

	/**
	 * Member edit
	 */
	public function edit($id = null){

	    $post = $this->MstUser->findById($id);
		if (!$this->MstUser->exists($id)) {
			throw new NotFoundException(__('ユーザーアカウントは誤っています'));
		}
	    if ($this->request->is(array('post', 'put'))) {
	        $this->MstUser->id = $id;
	        if ($this->MstUser->saves($this->request->data)) {
	            $this->Session->setFlash(__('会員情報を更新完了しました'));
	            return $this->redirect(array('action' => 'index'));
	        }
			else {
					$error = $this->MstUser->validationErrors;
					$this->set('error', $error);
			  }
	    }
	    

	    if (!$this->request->data) {
	        $this->request->data = $post;
	    }
	}

	/**
	 * Member delete
	 */
	public function delete($id = null){

		$this->MstUser->id = $id;
		if (!$this->MstUser->exists()) {
			throw new NotFoundException(__('ユーザーアカウントは誤っています'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->MstUser->delete()) {
			$this->Session->setFlash(__('ユーザーアカウントが削除されました'));
		} else {
			$this->Session->setFlash(__('ユーザーアカウントを削除失敗しましたので再度試してしてください'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}




