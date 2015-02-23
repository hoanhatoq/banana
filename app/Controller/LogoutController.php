<?php
/**
 * @author Nguyen Duy Linh
 */
class LogoutController extends AppController{
	/**
	 * Disable layout
	 */
	public $layout = false;
		
	/**
	 * logout page
	 *
	 * @return void
	 */
	public function index(){
		$title_for_layout = __('COMPLANメール配信システム | 管理画面');
		$this->set('title_for_layout', $title_for_layout);		
		session_destroy();
		$this->Auth->logout();
	}
}