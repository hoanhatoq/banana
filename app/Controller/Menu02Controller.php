<?php
/**
 * @author Chu Van Quy
 * Menu02: entry of Innovation Pages
 */
class Menu02Controller extends AppController{
	
	public $uses = array('UserDraftInput');
	
	public $layout = 'innovation_input_out';

	/**
	 * Usage some components
	 */
	public $components = array('Session', 'InnovationFlow');

	function beforeFilter() {
		parent::beforeFilter();
		$uid = $this->Auth->user('id');
		
		// check user: performed エネルギー収支計算 
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		if(!$sUserDraftInput){
			$chk = $this->UserDraftInput->findByUserId($uid);		
			if (!$chk) {				
				$this->redirect(array('controller' => 'menu', 'action' => 'index'));
			}
		}				
	}
	
	function beforeRender() {
		$title_for_layout = 'エネルギー効率評価システム | 一般社団法人 日本工業炉協会';
		$this->set('title_for_layout', $title_for_layout);				
		$this->InnovationFlow->pushPage($this->action);
	}
		
	/**
	 * Index page
	 * process button in Menu page (staet input, continue input)
	 */
	public function index($continue=1){		
			
		if ($continue == 1) {
			$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		}else {
			// get data of user エネルギー収支計算(Energy Input)
			$uid = $this->Auth->user('id');
			$chk = $this->UserDraftInput->findByUserId($uid);
			
			$sUserDraftInput = unserialize($chk['UserDraftInput']['data']);
		}
		
		//keys undefined
		$keys = array(
			'Eh_fuel','Erecovery','Eexhaust_hc', 'El_wall_t', 'El_opening_t', 'El_cw_t', 'El_storage_t', 'Mj', 'Tj1', 'Tj2', 'Eeffect', 'El_jig_t'
		);
		foreach ($keys as $key) {
			if (!isset($sUserDraftInput['data'][$key])) {
				$sUserDraftInput['data'][$key] = 0;
			}
		}
		
		
		$EF1 = $sUserDraftInput['data']['Eh_fuel'] + $sUserDraftInput['data']['Erecovery'] - $sUserDraftInput['data']['Eexhaust_hc'];
		$ETA1 = 0;
		if (0 != $sUserDraftInput['data']['Eh_fuel']) {
			$ETA1 = $EF1/$sUserDraftInput['data']['Eh_fuel'];
		}
		
		//save temporary
		$sUserDraftInput['data']['EF1'] = $EF1;
		$sUserDraftInput['data']['ETA1'] = $ETA1;
		$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
		
		$is_burning_type = 0;
		$is_electric_type = 0;
		
		if ($sUserDraftInput['data']['IND1'] == 2) {
			$is_burning_type = 1;
		} else if ($sUserDraftInput['data']['IND1'] == 1) {
			$is_electric_type = 1;
		} else{
			$is_burning_type = 1;
			$is_electric_type = 1;	
		}
		
		$this->set('is_burning_type', $is_burning_type);
		$this->set('is_electric_type', $is_electric_type);
		
		$this->render('/Menu02/menu02');
	}
	
}