<?php
/**
 * @author NDL
 * process save user draf input
 */
App::uses('CakeEmail', 'Network/Email');

class SaveController extends AppController{
	/**
	 * Usage layout : energy_input
	 */
	public $layout = 'energy_input_popup';

	/**
	 * Usage some components
	 */
	public $components = array('Flow', 'Session', 'Math');

	/**
	 * Usage model UserDraftInput
	 */
	public $uses = array('UserDraftInput');

	/**
	 * Index page
	 * save user draf input for save.html
	 */
	public function index(){
		//click buton SEND
		if($this->request->is('post')){					
			$form = $this->request->data['UserDraftInput'];
			
			$this->set('page', $form['page']);
			$this->set('dataDraft', $form['dataDraft']);
			
			$creator_email = $form['creator_email'];
			$memo = $form['memo'];			
			$page_on_save = $form['page'];
			
			
			//prepare data to save.
			$currentInput = $this->Session->read('Session_User_Draft_Input');
			$currentInput['last_page'] = $page_on_save;
			if (!in_array($page_on_save, $currentInput['pages'])) {
				array_push($currentInput['pages'], $page_on_save);
			}
			$draft = unserialize($form['dataDraft']);
			if($draft!=''){				
				$currentInput['data'] = array_merge($currentInput['data'], $draft);	
			}			
						
			$is_side = 1; //energy-input
			$innoPages = array('page_b01', 'page_b02', 'out_b01', 'page_b10', 'page_b11', 'out_b02');
			if(in_array($page_on_save, $innoPages)){
				$is_side = 2; // innovation-input
			}
			$serializeData = serialize($currentInput);
			
			//// Save data into DB ////
			$dataUserDraftInput = array();
			$creator_password = substr(uniqid(), -6, 6) . rand(10,99);				
			$dataUserDraftInput['user_id'] = $this->Auth->user('id');
			// $dataUserDraftInput['UserDraftInput']['creator_password'] = md5($creator_password);
			$dataUserDraftInput['creator_password'] = $creator_password;
			$dataUserDraftInput['creator_email'] = $creator_email;
			$dataUserDraftInput['memo'] = $memo;
			$dataUserDraftInput['is_side'] = $is_side;
			$dataUserDraftInput['data'] = $serializeData;
			$dataUserDraftInput['created'] = date('Y-m-d H:i:s');
			$dataUserDraftInput['updated'] = date('Y-m-d H:i:s');
			
			
			$this->UserDraftInput->create();
			// Send email after save data successfully
			if($this->UserDraftInput->save($dataUserDraftInput)){														
				$to = $creator_email; // email of user
				$subject = __('パスワードお知らせ'); // subject of email
				
				$message = __('パスワード') . ': ' . $creator_password . "\r\n" . __('メモ'). ': ' . $memo; // content of message

				$Email = new CakeEmail();
				$Email->config('default');
				$Email->to($to)
					  ->subject($subject)
				 	  ->send($message); 

				$this->Session->setFlash('<p class="msg">' . __('メールを送信しました') . '</p>');						
			} else {
				
			}
			
		
		}
		// save popup
		else{
			$dataDraft = '';
			//popup from Energy-Input
			if (isset($this->request->query['data']['energy_input'])) {
				$dataDraft = serialize($this->request->query['data']['energy_input']);								
			}
			
			//popup from Innovation-Input
			if (isset($this->request->query['data']['innovation_input'])) {
				$dataDraft = serialize($this->request->query['data']['innovation_input']);								
			}	
			$this->set('dataDraft', $dataDraft);				
			$page = $this->request->query['saveDraft'];
			$this->set('page', $page);	
		}				
	} /* End index*/

}