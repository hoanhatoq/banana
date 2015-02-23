<?php
/**
 * @author
 * Result page
 */
class ResultController extends AdminAppController {
	public $helpers = array('Html', 'Form','Paginator');
    public $components = array('RequestHandler', 'SandkeyImage','OutPdf', 'Math', 'Flow');
	/**
	 * Use model Result
	 */
	public $uses = array('UserResult');
	/**
	 * paging
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
	 * Function search - url
	 * @return void
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
	 * index
	 */
	public function index(){

		$this->paginate= array(
			// $limitpages defined in AdminAppController
			'limit' => parent::$limitpages,
			'order' => array('created' => 'desc')
		);
		$conditions = array(); 
		$data = array();
		$this->set('posts',$this->paginate());

		if(!empty($this->passedArgs)){ 
			//Fillter fullname 
			if(isset($this->passedArgs['UserResult.creator_email'])) { 
				$email = $this->passedArgs['UserResult.creator_email']; 
				$conditions[] = array( 
				            'OR' => array(
                    		'UserResult.creator_email LIKE' => "%$email%", 
                    		'MstUser.username LIKE' => "%$email%",
                    		'UserResult.TPE_name LIKE' => "%$email%"
                )
							);
				$data['UserResult']['creator_email'] = $email; 
			} 

				$this->data = $data; 
				$this->set("posts",$this->paginate("UserResult",$conditions)); 
		}
	}

	/**
	 * detail
	 */
	public function detail(){
	}

	/**
	 * pdf
	 */
	public function pdf(){
	}

	/**
	 * export_pdf_energy_data
	 */
	public function export_pdf_energy($id = null){
		$this->layout = false;

		$chk = $this->UserResult->findById($id);
		$this->$chk['UserResult']['id'] = $id;
		$username = $chk['MstUser']['username'];

		if($chk){
			$sResult1 = unserialize($chk['UserResult']['data']);
			$this->set('sResult1',$sResult1);
			$data = $sResult1['data'];
			// $this->Math->numberFormatArray($data, 1, null, '');
			$this->Math->numberFormatToShow($data, 1, '.', ' ');
		}
		$page = 'all';
    	$this->OutPdf->genPdfEnergy($page ,$data, $username);

	}
	/**
	 * export_pdf_innovation_data
	 */
	public function export_pdf_innovation($id = null){
		$this->layout = false;
		
		$chk = $this->UserResult->findById($id);
		$this->$chk['UserResult']['id'] = $id;

		$username = $chk['MstUser']['username'];

		if($chk){
			$sResult2 = unserialize($chk['UserResult']['data']);
			$this->set('sResult2',$sResult2);
			$data = $sResult2['data'];
			// $this->Math->numberFormatArray($data, 1, null, '');
			$this->Math->numberFormatToShow($data, 1, '.', ' ');
			if(isset($data['IND1']) && $data['IND1'] == 1){
				$page = 'out_b02';
			}
			elseif(isset($data['IND1']) && $data['IND1'] == 2){
				$page = 'out_b01';
			}
			else{
				$page = 'all';
			}

		}
		$this->OutPdf->genPdfinno($page, $data, $username);
	}
	/**
	 * html_innovation_data
	 * Conditions navigate to out_b01, out_b02 or out_b12
	 */
	public function html_energy($id = null){
		$this->layout = false;
		
		$chk = $this->UserResult->findById($id);
		$this->$chk['UserResult']['id'] = $id;

		if($chk){
			$sResult1 = unserialize($chk['UserResult']['data']);
			$this->set('sResult1',$sResult1);
			$data = $sResult1['data'];
			// $this->Math->numberFormatArray($data, 1, null, '');
			$this->Math->numberFormatToShow($data, 1, '.', ' ');
			
			$last_page = 'page41';
			$next_page = $this->Flow->getNextPage($last_page, $data);

			$this->redirect(array('controller' => 'out', 'action' => $next_page, $id));	

		}
	}

	/**
	 * html_innovation_data
	 * Conditions navigate to out_b01, out_b02 or out_b12
	 */
	public function html_innovation($id = null){
		$this->layout = false;
		
		$chk = $this->UserResult->findById($id);
		$this->$chk['UserResult']['id'] = $id;

		if($chk){
			$sResult2 = unserialize($chk['UserResult']['data']);
			$this->set('sResult2',$sResult2);
			$data = $sResult2['data'];
			// $this->Math->numberFormatArray($data, 1, null, '');
			$this->Math->numberFormatToShow($data, 1, '.', ' ');
			
			if(isset($data['IND1']) && $data['IND1'] == 1){
				$this->redirect(array('controller' => 'out','action' => 'out_b02',$id));
			}
			elseif(isset($data['IND1']) && $data['IND1'] == 2){
				$this->redirect(array('controller' => 'out','action' => 'out_b01',$id));
			}
			else{
				$this->redirect(array('controller' => 'out','action' => 'out_b12',$id));
			}

		}
	}
}