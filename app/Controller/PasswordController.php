<?php
/**
 * @author
 */
class PasswordController extends AppController{
	public $helpers = array('Html', 'Form','Paginator');
	public $uses = array('MstUser');
	/**
  	* Set title for all page
  	*/
	public function beforeRender(){
		$title_for_layout = __('エネルギー効率評価システム | 一般社団法人 日本工業炉協会');
		$this->set('title_for_layout', $title_for_layout); 
	}
	/**
	 * change password
	 *
	 * @return void
	 */
	public function change(){


		$id = $this->Auth->user('id');
        if ($this->data) {
            if ($this->MstUser->save($this->data))
                $this->Session->setFlash(__('パスワードが更新しました'));
            else
                $this->Session->setFlash(__('パスワードが更新しなかった'));
        } else {
            $this->data = $this->MstUser->read(null, $id);
        }
	}
}
