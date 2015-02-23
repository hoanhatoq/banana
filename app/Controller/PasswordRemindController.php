<?php
/**
 * @author
 */
class PasswordRemindController extends AppController{
	/**
  	* Set title for all page
  	*/
	public function beforeRender(){
		$title_for_layout = __('エネルギー効率評価システム | 一般社団法人 日本工業炉協会');
		$this->set('title_for_layout', $title_for_layout); 
	}
	/**
	 *
	 */
	public $uses = array('MstUser');
	public $helpers = array('Html', 'Form');
	public $layout = false;
	public $components = array('Email');
	public function __sendPasswordEmail($user, $password) {
	  if ($user === false) {
	    echo 'failed to retrieve User data for user.id: '.$user['MstUser']['id'];
	    return false;
	  }
	  $this->set('user', $user['MstUser']);
	  $this->set('password', $password);
	  $this->Email->to = $user['MstUser']['email']; //
	  $this->Email->subject = __('パスワードの変更の依頼');//
	  $this->Email->from = 'noreply@fees-jifma.jp'; //
	  return $this->Email->send(__('ユーザーの新しいパスワード： ').$password);
	}



	/**
	 * Index
	 *
	 * @return void
	 */
	public function index(){
	
      if(!empty($this->data)) {
        $user = $this->MstUser->findByEmail($this->data['MstUser']['email']);
        if($user) {
          $newpass = $this->MstUser->createTempPassword();
          $user['MstUser']['password'] = $this->Auth->password($newpass);
          if($this->MstUser->save($user, false)) {
            $this->__sendPasswordEmail($user, $newpass);
            $this->Session->setFlash(__('メールを送信しました'));
            $this->redirect($this->referer());
          }
        } else {
          $this->Session->setFlash('<span style="color:red">'.__('メールが存在しない').'</a>');
        }
      }

	}

	/**
	 * complete
	 *
	 * @return void
	 */
	public function complete(){
	}
}
