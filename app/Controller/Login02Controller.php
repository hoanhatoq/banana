<?php 
App::uses('AppController', 'Controller');
/**
 * @author NDL
 * process login 02
 */
class Login02Controller extends AppController {
	/**
	 * Usage layout : energy_input
	 */
	public $layout = 'energy_input_popup';

	/**
	 * Usage some components
	 */
	public $components = array('Flow', 'Session', 'InnovationFlow');

	/**
	 * Set title for all page
	 */
	public function beforeRender(){
		$title_for_layout = __('エネルギー効率評価システム | 一般社団法人 日本工業炉協会');
		$this->set('title_for_layout', $title_for_layout);		
	}

	/**
	 * Usage model : UserDraftInput
	 */
	public $uses = array('UserDraftInput', 'UserResult');

	/**
	 * login page
	 *	 
	 */
	public function index(){
		if($this->request->is('post')){						
			$dataLogin02 = $this->request->data;

			if(isset($dataLogin02['act']) && ($dataLogin02['act']=='act1' || $dataLogin02['act']=='act3')){ // user_draft_input							
				$creator_email = $dataLogin02['user_login02']['creator_email'];

				// $creator_password = md5($dataLogin02['user_login02']['creator_password']);
				$creator_password = $dataLogin02['user_login02']['creator_password'];

				$user = $this->UserDraftInput->find('first', array(
					'conditions' => array(
						'UserDraftInput.creator_email' => $creator_email,
						'UserDraftInput.creator_password' => $creator_password
					)
				));
				if($user){
					$energy_innovation_data = unserialize($user['UserDraftInput']['data']);	
					
					$is_side = (isset($user['UserDraftInput']['is_side']))? $user['UserDraftInput']['is_side']: 1;
						
					if( $is_side==1 ){
						foreach ($energy_innovation_data['pages'] as $page) {						
							$this->Flow->pushPage($page);						
						}
						
						$this->Session->write('Session_User_Draft_Input', $energy_innovation_data);	
						$pageNext = (isset($energy_innovation_data['last_page'])) ? $energy_innovation_data['last_page']:'';

						if( $pageNext=='' ) {
							$url = Router::url(array('controller'=>'energy_input', 'action'=> 'page02'));
						}
						$url = Router::url(array('controller'=>'energy_input', 'action'=> $pageNext));
					}

					if( $is_side==2 )  {
						foreach ($energy_innovation_data['pages'] as $page) {						
							$this->InnovationFlow->pushPage($page);						
						}
						
						$this->Session->write('Session_User_Draft_Input', $energy_innovation_data);	
						$pageNext = (isset($energy_innovation_data['last_page'])) ? $energy_innovation_data['last_page']:'';

						if( $pageNext=='' ) {
							$url = Router::url(array('controller'=>'menu02', 'action'=> 'index'));
						}						
						$url = Router::url(array('controller'=>'innovation_input', 'action'=> $pageNext));
					}															
					echo '<script type="text/javascript">opener.location.href="' . $url . '";window.close();</script>';
				}else{
					$user_ur = $this->UserResult->find('first', array(
						'conditions' => array(
							'UserResult.creator_email' => $creator_email,
							'UserResult.creator_password' => $creator_password
						)
					));
					if($user_ur){
						$energy_innovation_data = unserialize($user_ur['UserResult']['data']);
						
						$is_side = (isset($user_ur['UserResult']['is_side']))? $user_ur['UserResult']['is_side']: 1;

						if( $is_side==1 ){
							foreach ($energy_innovation_data['pages'] as $page) {						
								$this->Flow->pushPage($page);						
							}

							$this->Session->write('Session_User_Draft_Input', $energy_innovation_data);	
							$pageNext = (isset($energy_innovation_data['last_page'])) ? $energy_innovation_data['last_page']:'';

							if( $pageNext=='' ) {
								$url = Router::url(array('controller'=>'energy_input', 'action'=> 'page02'));
							}
							$url = Router::url(array('controller'=>'energy_input', 'action'=> $pageNext));
						}

						if( $is_side==2 )  {
							foreach ($energy_innovation_data['pages'] as $page) {						
								$this->InnovationFlow->pushPage($page);						
							}

							$this->Session->write('Session_User_Draft_Input', $energy_innovation_data);	
							$pageNext = (isset($energy_innovation_data['last_page'])) ? $energy_innovation_data['last_page']:'';

							if( $pageNext=='' ) {
								$url = Router::url(array('controller'=>'menu02', 'action'=> 'index'));
							}						
							$url = Router::url(array('controller'=>'innovation_input', 'action'=> $pageNext));
						}															
						echo '<script type="text/javascript">opener.location.href="' . $url . '";window.close();</script>';
					}else{
						$this->Session->setFlash('<p class="msg">' . __('メール・パスワードは存在していません。') . '</p>');
					}					
				}
			}

			if(isset($dataLogin02['act']) && $dataLogin02['act']=='act2'){ // user_result 
				$creator_email = $dataLogin02['user_login02']['creator_email'];

				// $creator_password = md5($dataLogin02['user_login02']['creator_password']);
				$creator_password = $dataLogin02['user_login02']['creator_password'];

				$user = $this->UserResult->find('first', array(
					'conditions' => array(
						'UserResult.creator_email' => $creator_email,
						'UserResult.creator_password' => $creator_password
					)
				));
				if($user){					
					$energy_innovation_data = unserialize($user['UserResult']['data']);	
					
					foreach ($energy_innovation_data['pages'] as $page) {
						if($page !='page02'){
							$this->Flow->pushPage($page);
						}
					}
					
					$this->Session->write('Session_User_Draft_Input', $energy_innovation_data);									
					$pageNext = $energy_innovation_data['last_page'];	

					if((isset($user['UserResult']['is_side']) && $user['UserResult']['is_side']==1) && (!isset($energy_innovation_data['last_page'])) ){
						$pageNext = 'page02';
					}

					if((isset($user['UserResult']['is_side']) && $user['UserResult']['is_side']==2) && (!isset($energy_innovation_data['last_page'])) ){
						$pageNext = 'menu02';
					}	

					$url = Router::url(array('controller'=>'innovation_input', 'action'=> $pageNext));
									
					echo '<script type="text/javascript">opener.location.href="' . $url . '";window.close();</script>';
				}else{
					$this->Session->setFlash('<p class="msg">' . __('メール・パスワードは存在していません。') . '</p>');
				}
			}		
		}
	}
}