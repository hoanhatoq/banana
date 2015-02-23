<?php
/**
 * @author
 * Result page
 */
class OutController extends AdminAppController {
	// public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler', 'SandkeyImage', 'Math', 'Flow', 'OutPdf');
	/**
	 * Use model Result
	 */
	public $uses = array('UserResult');
	/**
  	* Set title for all page
  	*/
	public function beforeRender(){
		$title_for_layout = __('エネルギー効率評価システム | 一般社団法人 日本工業炉協会');
		$this->set('title_for_layout', $title_for_layout); 
	}
	/**
	* click Back button.
	*/
	public function previous() {
		//back previous-page
		$previous = $this->Flow->popPage();
		$this->redirect('/out/'.$previous);
		exit;
	}
	/**
	 * out html
	 */
	public function out($id = null){
		$this->layout = 'energy_input_out';

		$chk = $this->UserResult->findById($id);
		$this->set('chk', $chk);
		$this->$chk['UserResult']['id'] = $id;

		if($chk){
			$sResult1 = unserialize($chk['UserResult']['data']);
			$this->set('sResult1',$sResult1);
			$EnergyInput = $sResult1['data'];
			
			// $this->Math->numberFormatArray($EnergyInput, 1, null, '');
			$this->Math->numberFormatToShow($EnergyInput, 1, '.', ' ');
			$this->set('EnergyInput',$EnergyInput);
		}
		if($this->request->is('post')){			
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $EnergyInput);
			$this->redirect(array('controller' => 'out', 'action' => $next_page, $id));
		}

	}
	/**
	 * out_02 html
	 */
	public function out_02($id = null){
		$this->layout = 'energy_input_out';
		$chk = $this->UserResult->findById($id);
		$this->set('chk', $chk);
		$this->$chk['UserResult']['id'] = $id;

		if($chk){
			$sResult1 = unserialize($chk['UserResult']['data']);
			$this->set('sResult1',$sResult1);
			$EnergyInput = $sResult1['data'];
			
			// $this->Math->numberFormatArray($EnergyInput, 1, null, '');
			$this->Math->numberFormatToShow($EnergyInput, 1, '.', ' ');
			$this->set('EnergyInput',$EnergyInput);
		}
		if($this->request->is('post')){			
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $EnergyInput);
			$this->redirect(array('controller' => 'out', 'action' => $next_page, $id));
		}
	}

	/**
	 * out_03 html
	 */
	public function out_03($id = null){
		$this->layout = 'energy_input_out';
		$chk = $this->UserResult->findById($id);
		$this->set('chk', $chk);
		$this->$chk['UserResult']['id'] = $id;

		if($chk){
			$sResult1 = unserialize($chk['UserResult']['data']);
			$this->set('sResult1',$sResult1);
			$EnergyInput = $sResult1['data'];
			
			// $this->Math->numberFormatArray($EnergyInput, 1, null, '');
			$this->Math->numberFormatToShow($EnergyInput, 1, '.', ' ');
			$this->set('EnergyInput',$EnergyInput);
		}
		if($this->request->is('post')){			
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $EnergyInput);
			$this->redirect(array('controller' => 'out', 'action' => $next_page, $id));
		}
	}

	/**
	 * out_04 html
	 */
	public function out_04($id = null){
		$this->layout = 'energy_input_out';
		$chk = $this->UserResult->findById($id);
		$this->set('chk', $chk);
		$this->$chk['UserResult']['id'] = $id;

		if($chk){
			$sResult1 = unserialize($chk['UserResult']['data']);
			$this->set('sResult1',$sResult1);
			$EnergyInput = $sResult1['data'];
			
			// $this->Math->numberFormatArray($EnergyInput, 1, null, '');
			$this->Math->numberFormatToShow($EnergyInput, 1, '.', ' ');
			$this->set('EnergyInput',$EnergyInput);
		}
		if($this->request->is('post')){			
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $EnergyInput);
			$this->redirect(array('controller' => 'out', 'action' => $next_page, $id));
		}
	}
	/**
	 * out_05 html
	 */
	public function out_05($id = null){
		$this->layout = 'energy_input_out';
		$chk = $this->UserResult->findById($id);
		$this->set('chk', $chk);
		$this->$chk['UserResult']['id'] = $id;

		if($chk){
			$sResult1 = unserialize($chk['UserResult']['data']);
			$this->set('sResult1',$sResult1);
			$EnergyInput = $sResult1['data'];
			
			// $this->Math->numberFormatArray($EnergyInput, 1, null, '');
			$this->Math->numberFormatToShow($EnergyInput, 1, '.', ' ');
			$this->set('EnergyInput',$EnergyInput);
		}
		if($this->request->is('post')){			
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $EnergyInput);
			$this->redirect(array('controller' => 'out', 'action' => $next_page, $id));
		}
	}

	/**
	 * out_06 html
	 */
	public function out_06($id = null){
		$this->layout = 'energy_input_out';
		$chk = $this->UserResult->findById($id);
		$this->set('chk', $chk);
		$this->$chk['UserResult']['id'] = $id;

		if($chk){
			$sResult1 = unserialize($chk['UserResult']['data']);
			$this->set('sResult1',$sResult1);
			$EnergyInput = $sResult1['data'];
			
			// $this->Math->numberFormatArray($EnergyInput, 1, null, '');
			$this->Math->numberFormatToShow($EnergyInput, 1, '.', ' ');
			$this->set('EnergyInput',$EnergyInput);
		}
		if($this->request->is('post')){			
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $EnergyInput);
			$this->redirect(array('controller' => 'out', 'action' => $next_page, $id));
		}
	}

	/**
	 * out_07 html
	 */
	public function out_07($id = null){
		$this->layout = 'energy_input_out';		
		if($this->request->is('post')){	

			$id = $this->request->data['uid'];
			$chk = $this->UserResult->findById($id);
			$this->$chk['UserResult']['id'] = $id;

			if($chk){
				$sResult1 = unserialize($chk['UserResult']['data']);
				$this->set('sResult1',$sResult1);
				$EnergyInput = $sResult1['data'];
				
				// $this->Math->numberFormatArray($EnergyInput, 1, null, '');	
				$this->Math->numberFormatToShow($EnergyInput, 1, '.', ' ');			
			}
			
			$Q11 = (isset($EnergyInput['Q11']))? $EnergyInput['Q11']: 1;
			$Ibd1 = (isset($EnergyInput['Ibd1']))? $EnergyInput['Ibd1']: 1;
			$Ibd2 = (isset($EnergyInput['Ibd2']))? $EnergyInput['Ibd2']: 1;
			$Ibd3 = (isset($EnergyInput['Ibd3']))? $EnergyInput['Ibd3']: 1;

			$sankeyPage = $this->Flow->checkPageSankey($Q11, $Ibd1, $Ibd2, $Ibd3, 'out_07');				
			
			if($sankeyPage != 1) $this->redirect(array('plugin' => 'admin','controller' => 'out', 'action' => $sankeyPage . '/' .$id));						
		}else{
			$chk = $this->UserResult->findById($id);
			$this->set('chk', $chk);
			$this->$chk['UserResult']['id'] = $id;
			

			if($chk){
				$sResult1 = unserialize($chk['UserResult']['data']);
				$this->set('sResult1',$sResult1);
				$EnergyInput = $sResult1['data'];
				
				// $this->Math->numberFormatArray($EnergyInput, 1, null, '');
				$this->Math->numberFormatToShow($EnergyInput, 1, '.', ' ');
				$this->set('EnergyInput',$EnergyInput);
			}
		}

	}

	/**
	 * out_08 html
	 */
	public function out_08($id = null){
		$this->layout = 'energy_input_out';
		$chk = $this->UserResult->findById($id);
		$this->set('chk', $chk);
		$this->$chk['UserResult']['id'] = $id;

		if($chk){
			$sResult1 = unserialize($chk['UserResult']['data']);
			$this->set('sResult1',$sResult1);
			$EnergyInput = $sResult1['data'];
			
			// $this->Math->numberFormatArray($EnergyInput, 1, null, '');
			$this->Math->numberFormatToShow($EnergyInput, 1, '.', ' ');
			$this->set('EnergyInput',$EnergyInput);
		}
	}

	/**
	 * out_09 html
	 */
	public function out_09($id = null){
		$this->layout = 'energy_input_out';
		$chk = $this->UserResult->findById($id);
		$this->set('chk', $chk);
		$this->$chk['UserResult']['id'] = $id;

		if($chk){
			$sResult1 = unserialize($chk['UserResult']['data']);
			$this->set('sResult1',$sResult1);
			$EnergyInput = $sResult1['data'];
			
			// $this->Math->numberFormatArray($EnergyInput, 1, null, '');
			$this->Math->numberFormatToShow($EnergyInput, 1, '.', ' ');
			$this->set('EnergyInput',$EnergyInput);
		}
	}

	/**
	 * out_10 html
	 */
	public function out_10($id = null){
		$this->layout = 'energy_input_out';
		$chk = $this->UserResult->findById($id);
		$this->set('chk', $chk);
		$this->$chk['UserResult']['id'] = $id;

		if($chk){
			$sResult1 = unserialize($chk['UserResult']['data']);
			$this->set('sResult1',$sResult1);
			$EnergyInput = $sResult1['data'];
			
			// $this->Math->numberFormatArray($EnergyInput, 1, null, '');
			$this->Math->numberFormatToShow($EnergyInput, 1, '.', ' ');
			$this->set('EnergyInput',$EnergyInput);
		}
	}

	/**
	 * out_11 html
	 */
	public function out_11($id = null){
		$this->layout = 'energy_input_out';
		$chk = $this->UserResult->findById($id);
		$this->set('chk', $chk);
		$this->$chk['UserResult']['id'] = $id;

		if($chk){
			$sResult1 = unserialize($chk['UserResult']['data']);
			$this->set('sResult1',$sResult1);
			$EnergyInput = $sResult1['data'];
			
			// $this->Math->numberFormatArray($EnergyInput, 1, null, '');
			$this->Math->numberFormatToShow($EnergyInput, 1, '.', ' ');
			$this->set('EnergyInput',$EnergyInput);
		}
	}

	/**
	 * out_12 html
	 */
	public function out_12($id = null){
		$this->layout = 'energy_input_out';
		$chk = $this->UserResult->findById($id);
		$this->set('chk', $chk);
		$this->$chk['UserResult']['id'] = $id;

		if($chk){
			$sResult1 = unserialize($chk['UserResult']['data']);
			$this->set('sResult1',$sResult1);
			$EnergyInput = $sResult1['data'];
			
			// $this->Math->numberFormatArray($EnergyInput, 1, null, '');
			$this->Math->numberFormatToShow($EnergyInput, 1, '.', ' ');
			$this->set('EnergyInput',$EnergyInput);
		}
	}

	/**
	 * out_13 html
	 */
	public function out_13($id = null){
		$this->layout = 'energy_input_out';
		$chk = $this->UserResult->findById($id);
		$this->set('chk', $chk);
		$this->$chk['UserResult']['id'] = $id;

		if($chk){
			$sResult1 = unserialize($chk['UserResult']['data']);
			$this->set('sResult1',$sResult1);
			$EnergyInput = $sResult1['data'];
			
			// $this->Math->numberFormatArray($EnergyInput, 1, null, '');
			$this->Math->numberFormatToShow($EnergyInput, 1, '.', ' ');
			$this->set('EnergyInput',$EnergyInput);
		}
	}

	/**
	 * out_14 html
	 */
	public function out_14($id = null){
		$this->layout = 'energy_input_out';
		$chk = $this->UserResult->findById($id);
		$this->set('chk', $chk);
		$this->$chk['UserResult']['id'] = $id;

		if($chk){
			$sResult1 = unserialize($chk['UserResult']['data']);
			$this->set('sResult1',$sResult1);
			$EnergyInput = $sResult1['data'];
			
			// $this->Math->numberFormatArray($EnergyInput, 1, null, '');
			$this->Math->numberFormatToShow($EnergyInput, 1, '.', ' ');
			$this->set('EnergyInput',$EnergyInput);
		}
	}

	/**
	 * out_15 html
	 */
	public function out_15($id = null){
		$this->layout = 'energy_input_out';
		$chk = $this->UserResult->findById($id);
		$this->set('chk', $chk);
		$this->$chk['UserResult']['id'] = $id;

		if($chk){
			$sResult1 = unserialize($chk['UserResult']['data']);
			$this->set('sResult1',$sResult1);
			$EnergyInput = $sResult1['data'];
			
			// $this->Math->numberFormatArray($EnergyInput, 1, null, '');
			$this->Math->numberFormatToShow($EnergyInput, 1, '.', ' ');
			$this->set('EnergyInput',$EnergyInput);
		}
	}

	/**
	 * out_16 html
	 */
	public function out_16($id = null){
		$this->layout = 'energy_input_out';
		$chk = $this->UserResult->findById($id);
		$this->set('chk', $chk);
		$this->$chk['UserResult']['id'] = $id;

		if($chk){
			$sResult1 = unserialize($chk['UserResult']['data']);
			$this->set('sResult1',$sResult1);
			$EnergyInput = $sResult1['data'];
			
			// $this->Math->numberFormatArray($EnergyInput, 1, null, '');
			$this->Math->numberFormatToShow($EnergyInput, 1, '.', ' ');
			$this->set('EnergyInput',$EnergyInput);
		}
	}
	/**
	 * out pdf
	 */
	public function out_pdf($id = null){
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
		$page = 'out';
    	$this->OutPdf->genPdfEnergy($page , $data, $username);
	}


	/**
	 * 
	 */
	public function out_02_pdf($id = null){
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
		$page = 'out_02';
    	$this->OutPdf->genPdfEnergy($page , $data, $username);
	}


	/**
	 * 
	 */
	public function out_03_pdf($id = null){
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
		$page = 'out_03';
    	$this->OutPdf->genPdfEnergy($page , $data, $username);
	}


	/**
	 * 
	 */
	public function out_04_pdf($id = null){
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
		$page = 'out_04';
    	$this->OutPdf->genPdfEnergy($page , $data, $username);
	}

	/**
	 * 
	 */
	public function out_05_pdf($id = null){
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
		$page = 'out_05';
    	$this->OutPdf->genPdfEnergy($page , $data, $username);
	}


	/**
	 * 
	 */
	public function out_06_pdf($id = null){
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
		$page = 'out_06';
    	$this->OutPdf->genPdfEnergy($page , $data, $username);
	}


	/**
	 * 
	 */
	public function out_07_pdf($id = null){
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
		$page = 'out_07';
    	$this->OutPdf->genPdfEnergy($page , $data, $username);
	}


	/**
	 * 
	 */
	public function out_08_pdf($id = null){
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
		$page = 'out_08';
    	$this->OutPdf->genPdfEnergy($page , $data, $username);
	}


	/**
	 * 
	 */
	public function out_09_pdf($id = null){
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
		$page = 'out_09';
    	$this->OutPdf->genPdfEnergy($page , $data, $username);
	}


	/**
	 * 
	 */
	public function out_10_pdf($id = null){
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
		$page = 'out_10';
    	$this->OutPdf->genPdfEnergy($page , $data, $username);
	}


	/**
	 * 
	 */
	public function out_11_pdf($id = null){
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
		$page = 'out_11';
    	$this->OutPdf->genPdfEnergy($page , $data, $username);
	}


	/**
	 * 
	 */
	public function out_12_pdf($id = null){
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
		$page = 'out_12';
    	$this->OutPdf->genPdfEnergy($page , $data, $username);
	}


	/**
	 * 
	 */
	public function out_13_pdf($id = null){
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
		$page = 'out_13';
    	$this->OutPdf->genPdfEnergy($page , $data, $username);
	}


	/**
	 * 
	 */
	public function out_14_pdf($id = null){
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
		$page = 'out_14';
    	$this->OutPdf->genPdfEnergy($page , $data, $username);
	}


	/**
	 * 
	 */
	public function out_15_pdf($id = null){
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
		$page = 'out_15';
    	$this->OutPdf->genPdfEnergy($page , $data, $username);
	}


	/**
	 * 
	 */
	public function out_16_pdf($id = null){
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
		$page = 'out_16';
    	$this->OutPdf->genPdfEnergy($page , $data, $username);
	}
	/**
	 * out_b01 html
	 */
	public function out_b01($id = null){

		$this->layout = 'innovation_input_out';
		$chk = $this->UserResult->findById($id);
		$this->set('chk', $chk);
		$this->$chk['UserResult']['id'] = $id;

		if($chk){
			$sResult2 = unserialize($chk['UserResult']['data']);
			$this->set('sResult2',$sResult2);
			$data = $sResult2['data'];
			// $this->Math->numberFormatArray($data, 1, null, '');
			$this->Math->numberFormatToShow($data, 1, '.', ' ');
			$this->set('data',$data);
		}
	}
	/**
	 * 
	 */
	public function out_b01_pdf($id = null){
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
		}
		$page = 'out_b01';
    	$this->OutPdf->genPdfInno($page , $data, $username);
	}

	/**
	 * out_b02 html
	 */
	public function out_b02($id = null){
		$this->layout = 'innovation_input_out';
		$chk = $this->UserResult->findById($id);
		$this->set('chk', $chk);
		$this->$chk['UserResult']['id'] = $id;

		if($chk){
			$sResult2 = unserialize($chk['UserResult']['data']);
			$this->set('sResult2',$sResult2);
			$data = $sResult2['data'];
			// $this->Math->numberFormatArray($data, 1, null, '');
			$this->Math->numberFormatToShow($data, 1, '.', ' ');
			$this->set('data',$data);
		}
	}
	/**
	 * 
	 */
	public function out_b02_pdf($id = null){
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
		}
		$page = 'out_b02';
    	$this->OutPdf->genPdfInno($page , $data, $username);
	}
	/**
	 * out_b12 html
	 */
	public function out_b12($id = null){
		$this->layout = 'innovation_input_out';
		$chk = $this->UserResult->findById($id);
		$this->set('chk', $chk);
		$this->$chk['UserResult']['id'] = $id;

		if($chk){
			$sResult2 = unserialize($chk['UserResult']['data']);
			$this->set('sResult2',$sResult2);
			$data = $sResult2['data'];
			// $this->Math->numberFormatArray($data, 1, null, '');
			$this->Math->numberFormatToShow($data, 1, '.', ' ');
			$this->set('data',$data);
		}
	}
	/**
	 * 
	 */
	public function out_b12_pdf($id = null){
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
		}
		$page = 'all';
    	$this->OutPdf->genPdfInno($page , $data, $username);
	}

}