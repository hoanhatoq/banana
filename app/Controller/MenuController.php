<?php
/**
 * @author Nguyen Duy Linh
 * Menu page
 */
class MenuController extends AppController{
	/**
	 * Usage model : UserDraftInputEnergy, UserDraftInputInnovation
	 */
	public $uses = array('UserDraftInputEnergy', 'UserDraftInputInnovation');

	/**
	 * Set title for all page
	 */
	public function beforeRender(){
		$title_for_layout = 'エネルギー効率評価システム | 一般社団法人 日本工業炉協会';
		$this->set('title_for_layout', $title_for_layout);		
	}

	/**
	 * Index page
	 * process menu page
	 */
	public function index(){	

	}
}