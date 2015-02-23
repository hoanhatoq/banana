<?php
/**
 * @author Do Tung
 * Password remind page
 */
class PasswordRemindController extends AdminAppController{
	public $uses = array('MstAdmin');
	public $helpers = array('Html','Form');
	public $components = array('Email');

  /**
    * Set title for all page
    */
  public function beforeRender(){
    $title_for_layout = __('パスワード送付 | COMPLANメール配信システム | 管理画面');
    $this->set('title_for_layout', $title_for_layout); 
  }
	/**
	 * Send email function
	 *
	 */	
	public function __sendPasswordEmail($user, $password) {
		if ($user === false) {
	    	return false;
	  	}
	  	
	  	$this->set('user', $user['MstAdmin']);
	  	$this->set('password', $password);
		$Email = new CakeEmail();
	    $Email->config('default');
	    $Email->to($user['MstAdmin']['email']); //
	    $Email->subject( __('パスワードの変更の依頼'));
	    $Email->send(__('ユーザーの新しいパスワード： ').$password);
	}
	/**
	 * Index page
	 *
	 */	
	public function index(){

      if(!empty($this->data)) {
        $user = $this->MstAdmin->findByEmail($this->data['MstAdmin']['email']);
        if($user) {
          $em['MstAdmin']['email'] = $user['MstAdmin']['email'];
          $this->MstAdmin->set($em);
          if($this->MstAdmin->validates($em)) {            
            $newpass = $this->MstAdmin->createTempPassword();
            $user['MstAdmin']['password'] = $this->Auth->password($newpass);
            $user['MstAdmin']['updated'] = date('Y-m-d H:i:s');
            $this->MstAdmin->set($user);
            if($this->MstAdmin->save($user, false)) {
              $this->__sendPasswordEmail($user, $newpass);
              $this->Session->setFlash(__('メールを送信しました'));
              $this->redirect($this->referer());
            }
          }else{
            $this->Session->setFlash('<span style="color:red">'.__('メールアドレスを入力してください').'</a>');
          }          
        } else {
          $this->Session->setFlash('<span style="color:red">'.__('メールが存在しない').'</a>');
        }
      }

	}
}