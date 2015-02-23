<?php
/**
 * @author NDL
 * process save02 user draf input
 */
App::uses('CakeEmail', 'Network/Email');

class Save02Controller extends AppController{
	/**
	 * Usage layout : energy_input
	 */
	public $layout = 'energy_input_popup';

	/**
	 * Usage some components
	 */
	public $components = array('Flow', 'Math', 'Statistics', 'Session');

	/**
	 * Usage model UserResult
	 */
	public $uses = array('UserResult');

	/**
	 * Index page
	 * save user draf input for save.html
	 */
	public function index(){	
		
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		//popup form energy-input OR innovation-input.
		if($this->request->is('get')){
			
			
			if (isset($this->request->query['data']['energy_input'])) { //energy-input
				$dataPage41 = $this->request->query['data']['energy_input'];
				//var_dump($dataPage41);exit;
				$dataPage41['Eu_oxy'] = 0;
				if( $dataPage41['Isanso'] != 1 ){
					$dataPage41['Aoxy'] = 0;
					$dataPage41['Voxy'] = 0;
				}else{
					$dataPage41['Eu_oxy'] = $dataPage41['Aoxy'] * $dataPage41['Voxy'] * 3600.0;
				}
				
				$dataPage41['Eu_atm'] = 0;
				if( $dataPage41['Iatm'] != 1 ){
					$dataPage41['Aatm'] = 0;
					$dataPage41['Vatm'] = 0;
				}else{
					$dataPage41['Eu_atm'] 	= $dataPage41['Aatm'] * $dataPage41['Vatm'] * 3600.0;
				}
				
				$sUserDraftInput['data'] = array_merge($sUserDraftInput['data'], $dataPage41);
								
				$this->set('act', $this->request->query['saveDraft']);
				$this->Statistics->set_input($sUserDraftInput);
				$this->Statistics->energy_input();
				$sUserDraftInput = $this->Statistics->get_output();
				$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
			} elseif (isset($this->request->query['data']['innovation_input'])) { //innovation-input
				$this->Statistics->set_input($sUserDraftInput);
				$this->Statistics->innovation_input();
				$sUserDraftInput = $this->Statistics->get_output();
				$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
				
				$this->set('act', $this->request->query['actSave']);
			}			
		}
		
		//click button SEND
		if ($this->request->is('post')) {
			$form = $this->request->data['UserResult'];
		
			$act = $this->request->data['act'];
			if($act==""){
				$act = $this->request->data['savePage'];
			}
			$this->set('act', $act);			
			$is_side = 1;
			if(in_array($act, array('page_b02', 'page_b11', 'out_b01', 'out_b02'))) {
				$is_side = 2;
			}
			
			$serializeData = serialize($sUserDraftInput);			
			$TPE_name = (isset($sUserDraftInput['data']['TPE_name']))? $sUserDraftInput['data']['TPE_name']: '';
			$creator_password = substr(uniqid(), -6, 6) . rand(10,99);
			
			$dataUserResult = array();
			$dataUserResult['user_id'] = $this->Auth->user('id');
			$dataUserResult['TPE_name'] = $TPE_name;
			// $dataUserResult['creator_password'] = md5($creator_password);	
			$dataUserResult['creator_password'] = $creator_password;
			$dataUserResult['creator_email'] = $form['creator_email'];
			$dataUserResult['memo'] = $form['memo'];
			$dataUserResult['data'] = $serializeData;
			$dataUserResult['is_side'] = $is_side;
			$dataUserResult['created'] = date('Y-m-d H:i:s');
			$dataUserResult['updated'] = date('Y-m-d H:i:s');
			
			$this->UserResult->create();		
			
			if ($this->UserResult->save($dataUserResult)){				
				$to = $form['creator_email']; // email of user
				$subject = __('パスワードお知らせ'); // subject of email
				
				$memo = $form['memo']; // memo of user				
				$message = __('パスワード') . ': ' . $creator_password . "\r\n" . __('メモ'). ': ' . $memo; // content of message

				$Email = new CakeEmail();
				$Email->config('default');
				$Email->to($to)
					  ->subject($subject)
				 	  ->send($message); 

				$this->Session->setFlash('<p class="msg">' . __('メールを送信しました') . '</p>');
				if(in_array($act, array('out_b01', 'out_b02'))) {
					$url = Router::url(array('controller'=>'end', 'action'=> 'index'));
					echo '<script type="text/javascript">opener.location.href="' . $url . '";window.close();</script>';
				}
			}					
		} 
	} /* End index*/

}
