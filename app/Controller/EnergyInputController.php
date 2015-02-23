<?php
/**
 * @author NDL
 * process all energy input pages
 */
class EnergyInputController extends AppController{
	/**
	 * Usage layout : energy_input
	 */
	public $layout = 'energy_input';

	/**
	 * Usage some components
	 */
	public $components = array('Subroutine', 'Flow', 'Math', 'OutPdf', 'SandkeyImage', 'Statistics', 'Session');

	/**
	 * Set title for all page
	 */
	public function beforeRender(){
		$title_for_layout = __('エネルギー効率評価システム | 一般社団法人 日本工業炉協会');
		$this->set('title_for_layout', $title_for_layout);
		
		//output default value.
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		$pageOuts = array('out', 'out_02', 'out_03', 'out_04', 'out_05', 'out_06', 'out_07', 
							'out_08', 'out_09', 'out_10', 'out_11', 'out_12', 'out_13', 'out_14', 'out_15', 'out_16');
		if(!in_array($this->action, $pageOuts)){
			$this->Math->numberFormatArray($sUserDraftInput['data'], 10, '.', '');			
			$this->set('EnergyInput', $sUserDraftInput['data']);
		} else {			
			$EnergyInput = $sUserDraftInput['data'];			
			$this->Math->numberFormatToShow($EnergyInput, 1, '.', ' ');								
			$this->set('EnergyInput', $EnergyInput);
		}
		
		$this->set('actionDraft', $this->action);
		$this->set('previousPage', 'previous');	
	}

	/**
	 * pre-process of each page
	 */
	public function beforeFilter(){	
		//set current-language.
		$locale  = ($this->Session->read('Config.language'))? $this->Session->read('Config.language'):'jpn';
		$this->set('locale', $locale);
		
		//skip any process if It's temp.page
		if ($this->action == 'previous' || $this->action == 'pdf') {
			return true;
		}
		
		//SESSION is cleared or not decleare.
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		if(!isset($sUserDraftInput['data']) && $this->action != 'page02'){ 
			$this->redirect(array('controller' => 'energy_input', 'action' => 'page02'));
			exit;
		}
		// all pages of innovation input
		$fpages = $this->Flow->getPageFlow();
		$innoPages = array('index', 
							'page_b01', 'page_b02', 'page_b03', 'page_b04', 'page_b05', 'page_b06', 'page_b07', 'out_b01',
							'page_b10', 'page_b11', 'page_b15', 'page_b12', 'page_b13', 'page_b14', 'out_b02');
		// clear flow page of innovation input
		if($fpages){
			foreach ($innoPages as $pg) {
				if(in_array($pg, $fpages)){
					$this->Flow->clearFlowPage();
					break;
				}
			}
		}
		
		//check current page is weather in flow or not.
		if($this->request->is('get')) {
			$current_page = $this->action;
			$popup = array('page02', 'page8910', 'page1011', 'page13208', 'page19',
							'page22', 'page23', 'page24', 'page25', 'page26', 'page27', 'page28',
							'page33', 'page34', 'page35', 'page37', 'page38', '', 'page39', 'page40'
						);
			
			if(!in_array($current_page, $popup)){	
				
				if($this->Flow->checkPageInFlow($current_page)){  
					$this->Flow->clearFromPage($current_page);
				}else{ 
					$last_page = $this->Flow->getLastPage();
					$fork_data = $sUserDraftInput['data'];					
					$chk = $this->Flow->checkPageFlow($last_page, $fork_data, $current_page);
					
					if(!$chk){
						$this->redirect(array('controller' => 'energy_input', 'action' => $last_page));							
					}
				}
				
			}
		}
		
		
		//for save-draft tracking
		if ($this->request->is('post')) {
			//tracking page
			if ($this->action != 'previous') {				
				$pages = array('page8910', 'page1011', 'page13208', 'page19',
								'page22', 'page23', 'page24', 'page25', 'page26', 'page27', 'page28',
								'page33', 'page34', 'page35', 'page37', 'page38', '', 'page39', 'page40'
							);
				
				if(!in_array($this->action, $pages)){
					$this->Flow->pushPage($this->action);					
				}
			}

			$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
			$sUserDraftInput['last_page'] = $this->action;
			$sUserDraftInput['pages'] = $this->Flow->getPageFlow();					
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);			
		}

	}

	/**
	* click Back button.
	*/
	public function previous() {
		//back previous-page
		$previous = $this->Flow->popPage();
		$this->redirect('/energy_input/'.$previous);
		exit;
	}

	/**
	 * page02
	 * process user draf input for page02.html
	 * IND1: fortran-spec: 1: Yes, 0: No - 2: 燃焼加熱, 1:電気加熱
	 * @return void
	 */
	public function page02(){		
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		if($this->request->is('post')){			
			$dataPage02 = $this->request->data['energy_input'];
			
			foreach($dataPage02 as $key => $val){
				$sUserDraftInput['data'][$key] = $val;
			}
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
			$this->redirect(array('controller' => 'energy_input', 'action' => 'page03'));			
		}
	} /* End Page02 */

	/**
	 * page03
	 * process user draf input for page03.html
	 * // Ibatch: (spec - fortran) 1 <=> 0, 2 <=> 1	
	 * @return void
	 */
	public function page03(){	
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){				
			$dataPage03 = $this->request->data['energy_input'];
			foreach ($dataPage03 as $key => $value) {
				if($dataPage03[$key] == ''){
					$dataPage03[$key] = 0;
				}
			}

			// Ibatch: code-spec: 0=2, 1=1
			if($dataPage03['Ibatch'] == 1){
				$dataPage03['TPH'] = $dataPage03['TPC']/$dataPage03['Tzairo'];
			}
			
			$dataPage03['Tp'] = 1.0/($dataPage03['TPH']/3600);
			
			foreach($dataPage03 as $key => $val){
				$sUserDraftInput['data'][$key] = $val;
			}

			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
			$this->redirect(array('controller' => 'energy_input', 'action' => 'page04'));
		}
	} /* End Page03 */


	/**
	 * page04
	 * process user draf input for page04.html
	 * IND1: fortran-spec: 1: Yes, 0: No - 2: 燃焼加熱, 1:電気加熱
	 * @return void
	 */
	public function page04(){	
		
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		if($this->request->is('post')){	
			$dataPage04 = $this->request->data['energy_input'];
			
			if(!isset($dataPage04['Ibd1'])){
				$dataPage04['Ibd1'] = 0;	
			}

			if(!isset($dataPage04['Ibd2'])){
				$dataPage04['Ibd2'] = 0;	
			}

			if(!isset($dataPage04['Ibd3'])){
				$dataPage04['Ibd3'] = 0;	
			}
			foreach($dataPage04 as $key => $val){
				$sUserDraftInput['data'][$key] = $val;
			}

			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);									
			$this->redirect(array('controller' => 'energy_input', 'action' => 'page05'));			
		}
		
	} /* End Page04 */

	/**
	 * page05
	 * process user draf input for page05.html
	 *
	 * @return void
	 */
	public function page05(){				
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){
			$dataPage05 = $this->request->data['energy_input'];
			
			if(!isset($dataPage05['IND2'])){
				$dataPage05['IND2'] = 0;				
			}

			if(!isset($dataPage05['Q3'])){
				$dataPage05['Q3'] = 0;	
			}

			if(!isset($dataPage05['IND3'])){
				$dataPage05['IND3'] = 0;
			}

			foreach($dataPage05 as $key => $val){
				$sUserDraftInput['data'][$key] = $val;
			}
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
			
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);
			
			
			if ($next_page == 'page06') {
				$this->redirect(array('controller' => 'energy_input', 'action' => 'page06'));
				exit;
			}
			
			$this->page8910();
			if ($next_page == 'page10') {
				$this->redirect(array('controller' => 'energy_input', 'action' => 'page10'));
				exit;
			}
			
			$this->page1011();//page15, page13, page12, page11
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));
			exit;
			
		}
	} /* End Page05 */

	/**
	 * page06
	 * process user draf input for page06.html
	 * Q5: spec-fortran: 1: 有り, 2: 無し - 1: Yes, 0: No
	 * Fg_o2 = Fg_O2
	 * Fa_O2d = Fa_O2D
	 * Fa_H2o = Fa_H2O	 
	 */
	public function page06(){
		
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		if($this->request->is('post')){			
			$dataPage06 = $this->request->data['energy_input'];			
			
			foreach ($dataPage06 as $key => $value) {
				if($dataPage06[$key] == ''){
					$dataPage06[$key] = 0;
				}
			}

			// $dataPage06['Vfuel'] = $dataPage06['Vf'];
			$dataPage06['Vaobs']	= $dataPage06['Vme'];
			$dataPage06['FgO2'] 	= $dataPage06['Fg_O2'];			
			$dataPage06['Fg_O2D'] 	= $dataPage06['Fg_O2'];
			$dataPage06['Fg_O2'] 	= $dataPage06['Fg_O2']/100.0;
			$dataPage06['FaO2D']	= $dataPage06['Fa_O2D'];
			$dataPage06['T'] 		= $dataPage06['Ta1'];

			if( $dataPage06['T'] <= 0.0 ) $dataPage06['T'] = 1.0;

			$pow4 = -0.000000000543131 * pow($dataPage06['T'], 4);
			$pow3 = 0.000000360475263 * pow($dataPage06['T'], 3);
			$pow2 = 0.00012264315679 * pow($dataPage06['T'], 2);
			$pow1 = 0.031390372490756 * $dataPage06['T'];

			$dataPage06['Psf'] = pow(10, $pow4 + $pow3 - $pow2 + $pow1 - 2.2047366048003);

			$dataPage06['Psf'] = $dataPage06['Psf'] * 1000;     //KPaに変換
			
			$dataPage06['Pf'] = 101.325;      //kPa
			$dataPage06['Fa_H2O'] 	= $dataPage06['Ff'] * $dataPage06['Psf'] / (100 * $dataPage06['Pf']);	//分圧
			$dataPage06['Fa_O2D'] 	= $dataPage06['Fa_O2D'] / 100.0;

			$dataPage06['Fa_O2'] 	= 0;
			if((1 + $dataPage06['Fa_H2O'])!=0){
				$dataPage06['Fa_O2'] 	= $dataPage06['Fa_O2D'] / (1 + $dataPage06['Fa_H2O']);
			}

			$dataPage06['FaH2O'] 	= $dataPage06['Fa_H2O'];

			$dataPage06['FaO2'] 	= 0;
			if((1.0 + $dataPage06['FaH2O'])!=0){
				$dataPage06['FaO2']	= $dataPage06['Fa_O2D']/(1.0 + $dataPage06['FaH2O']);
			}

			$dataPage06['FaN2'] 	= 1.0 - $dataPage06['FaO2'] - $dataPage06['FaH2O']; //!tuika
			$dataPage06['Fa_N2'] 	= $dataPage06['FaN2'];

			foreach($dataPage06 as $key => $val){
				$sUserDraftInput['data'][$key] = $val;
			}
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
			
			$this->redirect(array('controller' => 'energy_input', 'action' => 'page07'));
		}
	} /* End Page06 */

	/**
	 * page07
	 * process user draf input for page07.html
	 * Q1: spec-fortran: 1-A, 2-B
	 * @return void
	 */
	public function page07(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		if ($this->request->is('get')) {
			if(isset($sUserDraftInput['data']['Q2'])) { 
				if ($sUserDraftInput['data']['Q2']=='C'){
					$sUserDraftInput['data']['VfC'] = $sUserDraftInput['data']['Vf'];
				}
			}
			
			if(isset($sUserDraftInput['data']['Q2'])) {
				if ($sUserDraftInput['data']['Q2']=='D'){
					$sUserDraftInput['data']['VfD'] = $sUserDraftInput['data']['Vf'];
				}
			}
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
		}
		
		if($this->request->is('post')){			
			$tdataPage07 = $this->request->data['energy_input'];
			
			$dataPage07['Q1'] = $tdataPage07['Q1'];
			$dataPage07['Q2'] = $tdataPage07['Q2'];

			if($tdataPage07['Q2'] == 'C'){
				$dataPage07['Vf'] = $tdataPage07['VfC'];
				$dataPage07['VfC'] = $dataPage07['Vf'];
				$dataPage07['VfD'] = '';
			}
			if($tdataPage07['Q2'] == 'D'){
				$dataPage07['Vf'] = $tdataPage07['VfD'];
				$dataPage07['VfD'] = $dataPage07['Vf'];
				$dataPage07['VfC'] = '';
			}
			$dataPage07['Vfuel'] = $dataPage07['Vf'];

			foreach($dataPage07 as $key => $val){
				$sUserDraftInput['data'][$key] = $val;
			}
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
			
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);
			
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));
			
		}
		
	} /* End Page07 */


	/**
	 * page08 
	 * process user draf input for page08.html
	 *
	 * @return void
	 */
	public function page08(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		$this->loadModel('MstData');
		$FUELDATA = $this->MstData->getAllData('FUELDATA');
		$this->set('FUELDATA', $FUELDATA);

		$GFUELDATA = $this->MstData->getAllData('GFUELDATA');

		if($this->request->is('post')){			
			$dataPage08 = $this->request->data['energy_input'];
			$Ifuel = $dataPage08['Ifuel'];
			
			$dataPage08['Hl1'] 	= $FUELDATA[$Ifuel][1];
			$dataPage08['A01'] 	= $FUELDATA[$Ifuel][3];
			$dataPage08['G0D1'] = $FUELDATA[$Ifuel][5];
			$dataPage08['G01'] 	= $FUELDATA[$Ifuel][4];
			$dataPage08['FCO21'] 	= $FUELDATA[$Ifuel][6];
			$dataPage08['FH2O1'] 	= $FUELDATA[$Ifuel][8];
			$dataPage08['FN21'] = $FUELDATA[$Ifuel][7];

			$dataPage08['Hl'] = $FUELDATA[$Ifuel][1];
			$dataPage08['A0'] = $FUELDATA[$Ifuel][3];
			$dataPage08['G0D'] 	= $FUELDATA[$Ifuel][5];
			$dataPage08['G0'] 	= $FUELDATA[$Ifuel][4];
			$dataPage08['FCO2'] = $FUELDATA[$Ifuel][6];
			$dataPage08['FH2O'] = $FUELDATA[$Ifuel][8];
			$dataPage08['FN2'] 	= $FUELDATA[$Ifuel][7];

			//　取りあえずドライでやっておく。
			if($Ifuel < 11){ // If ( ifuel.gt.11) go to 199 !tuika
				// real,dimension(10,18)::GFUELDATA
				for($i=1 ; $i<=18 ; $i++){
					$dataPage08['CFUEL'][$i] = $GFUELDATA[$Ifuel][$i]/100.0;
				}
			}
			
			// Print *,  " Q4, 水蒸気霧化の有無　1:YES,0:NO = " ! teisei Q5>Q4
			// Read *, Q4 ! teisei Q5>Q4
			// !Q5=0
			// GO TO 201

			foreach($dataPage08 as $key => $val){
				$sUserDraftInput['data'][$key] = $val;
			}
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);						
			
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);
			
			$this->page8910();
			if ($next_page == 'page_10') {
				$this->redirect(array('controller' => 'energy_input', 'action' => 'page10'));
				exit;
			}
			
			$this->page1011();//page15, page13, page12, page11
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));
			exit;
		}
		
	} /* End Page08 */

	/**
	 * page09 
	 * process user draf input for page09.html
	 * Q4 spec-fortran: 1: 有り, 2: 無し - 1: Yes, 0: No
	 * @return void
	 */
	public function page09(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		if($this->request->is('post')){			
			$dataPage09 = $this->request->data['energy_input'];
					
			foreach($dataPage09 as $key => $val){
				if($dataPage09[$key]==''){
					$dataPage09[$key] = 0;
				}
				$sUserDraftInput['data'][$key] = $dataPage09[$key];
			}						
			//Q4 is need to check
			if (!isset($sUserDraftInput['data']['Q4'])) {
				$sUserDraftInput['data']['Q4'] = 2;
			}
			if(isset($dataPage09['XGD'])) { // Q2=C
				// Call GASCOM(XGD,XG,Ff,Tf1,Fa,Ta1,FaO2d,Hl,A0d,A0,G0,G0d,FCO2,FH2O,FN2)
				//      GASCOM(XD,X,Ff,Tf1,Fa,Ta1,FaO2d,Hl,A0d,A0,G0,G0d,FCO2,FH2O,FN2)				
				$XGD 	= (isset($sUserDraftInput['data']['XGD']))? $sUserDraftInput['data']['XGD'] : 0;
				$XG  	= array();
				$Ff 	= (isset($sUserDraftInput['data']['Ff']))? $sUserDraftInput['data']['Ff'] : 0;
				$Tf1 	= (isset($sUserDraftInput['data']['Tf1']))? $sUserDraftInput['data']['Tf1'] : 0;
				$Fa 	= (isset($sUserDraftInput['data']['Fa']))? $sUserDraftInput['data']['Fa'] : 0;
				$Ta1 	= (isset($sUserDraftInput['data']['Ta1']))? $sUserDraftInput['data']['Ta1'] : 0;
				$FaO2D 	= (isset($sUserDraftInput['data']['FaO2D']))? $sUserDraftInput['data']['FaO2D'] : 0;
				$Hl 	= 0;
				$A0D 	= 0;
				$A0 	= 0;
				$G0 	= 0;
				$G0D 	= 0;
				$FCO2 	= 0;
				$FH2O 	= 0;
				$FN2 	= 0;
				$this->Subroutine->GASCOM($XGD, $XG, $Ff, $Tf1, $Fa, $Ta1, $FaO2D, $Hl, $A0D, $A0, $G0, $G0D, $FCO2, $FH2O, $FN2);
				// print *," Hl,A0,G0,G0d=",Hl,A0,G0,G0d
				$CFUEL = array();
				// Do i=1,18
				// CFUEL(i)=XG(i)
				// END do
				for($i=1 ; $i<=18 ; $i++){
					$CFUEL[$i] = $XG[$i];
				}
				$Hl1 	= $Hl;
				$A01 	= $A0;
				$G0D1 	= $G0D;
				$G01 	= $G0;
				$FCO21 	= $FCO2;
				$FH2O1 	= $FH2O;
				$FN21 	= $FN2;

				$sUserDraftInput['data']['XGD'] = $XGD;
				$sUserDraftInput['data']['XG'] 	= $XG;
				$sUserDraftInput['data']['Ff'] 	= $Ff;
				$sUserDraftInput['data']['Tf1'] = $Tf1;
				$sUserDraftInput['data']['Fa'] 	= $Fa;
				$sUserDraftInput['data']['Ta1'] = $Ta1;
				$sUserDraftInput['data']['FaO2D'] 	= $FaO2D;
				$sUserDraftInput['data']['Hl'] 	= $Hl;
				$sUserDraftInput['data']['A0D'] = $A0D;

				$sUserDraftInput['data']['A0'] 	= $A0;
				$sUserDraftInput['data']['G0'] 	= $G0;
				$sUserDraftInput['data']['G0D'] = $G0D;
				$sUserDraftInput['data']['FCO2'] 	= $FCO2;
				$sUserDraftInput['data']['FH2O'] 	= $FH2O;
				$sUserDraftInput['data']['FN2'] = $FN2;		

				$sUserDraftInput['data']['Hl1'] = $Hl1;
				$sUserDraftInput['data']['A01'] = $A01;
				$sUserDraftInput['data']['G0D1'] 	= $G0D1;
				$sUserDraftInput['data']['G01'] = $G01;
				$sUserDraftInput['data']['FCO21'] 	= $FCO21;
				$sUserDraftInput['data']['FH2O1'] 	= $FH2O1;
				$sUserDraftInput['data']['FN21'] 	= $FN21;

				$sUserDraftInput['data']['CFUEL'] 	= $CFUEL;				
			}

			if(isset($dataPage09['XLD'])){ // Q2=D
				// !  CALL　OILCOM()
				// OILCOM(XLD,XL,Ff,Ta1,FaO2d,Hh,Hl,A0d,A0,G0,G0d,FCO2,FH2O,FN2,FSO2,FaN2,FaO2,FaH2O)

				//SUB OILCOM(POd,PO,Ff,Ta1,FaO2d,Hh,Hl,A0d,A0,G0,G0d,FCO2,FH2O,FN2,FSO2,FaN2,FaO2,FaH2O)
				$XLD	= (isset($sUserDraftInput['data']['XLD']))? $sUserDraftInput['data']['XLD'] : 0;
				$XL 	= (isset($sUserDraftInput['data']['XL']))? $sUserDraftInput['data']['XL'] : 0;
				
				$Ff 	= (isset($sUserDraftInput['data']['Ff']))? $sUserDraftInput['data']['Ff'] : 0;
				$Ta1 	= (isset($sUserDraftInput['data']['Ta1']))? $sUserDraftInput['data']['Ta1'] : 0;
				$FaO2D 	= (isset($sUserDraftInput['data']['FaO2D']))? $sUserDraftInput['data']['FaO2D'] : 0;
				$Hh 	= (isset($sUserDraftInput['data']['Hh']))? $sUserDraftInput['data']['Hh'] : 0;
				$Hl 	= 0;
				$A0D 	= 0;
				$A0 	= 0;
				$G0 	= 0;
				$G0D 	= 0;
				$FCO2 	= 0;
				$FH2O 	= 0;
				$FN2 	= 0;
				$FSO2 	= 0;
				$FaN2 	= (isset($sUserDraftInput['data']['FaN2']))? $sUserDraftInput['data']['FaN2'] : 0;
				$FaO2 	= (isset($sUserDraftInput['data']['FaO2']))? $sUserDraftInput['data']['FaO2'] : 0;
				$FaH2O 	= (isset($sUserDraftInput['data']['FaH2O']))? $sUserDraftInput['data']['FaH2O'] : 0;
				$this->Subroutine->OILCOM($XLD, $XL, $Ff, $Ta1, $FaO2D, $Hh, $Hl, $A0D, $A0, $G0, $G0D, $FCO2, $FH2O, $FN2, $FSO2, $FaN2, $FaO2, $FaH2O);
				
				$Hl1 	= $Hl;
				$A01 	= $A0;
				$G0D1 	= $G0D;
				$G01 	= $G0;
				$FCO21 	= $FCO2;
				$FH2O1 	= $FH2O;
				$FN21 	= $FN2;

				$sUserDraftInput['data']['XLD'] = $XLD;
				$sUserDraftInput['data']['XL'] 	= $XL;
				$sUserDraftInput['data']['Ff'] 	= $Ff;
				$sUserDraftInput['data']['Ta1'] = $Ta1;
				$sUserDraftInput['data']['FaO2D'] 	= $FaO2D;
				$sUserDraftInput['data']['Hh'] 	= $Hh;
				$sUserDraftInput['data']['Hl'] 	= $Hl;
				$sUserDraftInput['data']['A0D'] = $A0D;
				$sUserDraftInput['data']['A0'] 	= $A0;
				$sUserDraftInput['data']['G0'] 	= $G0;
				$sUserDraftInput['data']['G0D'] = $G0D;
				$sUserDraftInput['data']['FCO2'] 	= $FCO2;
				$sUserDraftInput['data']['FH2O'] 	= $FH2O;
				$sUserDraftInput['data']['FN2'] = $FN2;
				$sUserDraftInput['data']['FSO2'] 	= $FSO2;
				$sUserDraftInput['data']['FaN2'] 	= $FaN2;
				$sUserDraftInput['data']['FaO2'] 	= $FaO2;
				$sUserDraftInput['data']['FaH2O'] 	= $FaH2O;

				$sUserDraftInput['data']['Hl1'] = $Hl1;
				$sUserDraftInput['data']['A01'] = $A01;
				$sUserDraftInput['data']['G0D1'] 	= $G0D1;
				$sUserDraftInput['data']['G01'] = $G01;
				$sUserDraftInput['data']['FCO21'] 	= $FCO21;
				$sUserDraftInput['data']['FH2O1']	= $FH2O1;
				$sUserDraftInput['data']['FN21'] 	= $FN21;
			}					
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);						
			
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);
			
			$this->page8910();
			if ($next_page == 'page10') {
				$this->redirect(array('controller' => 'energy_input', 'action' => 'page10'));
				exit;
			}
			
			$this->page1011();//page15, page13, page12, page11
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));
			exit;
		}
	} /* End Page09 */

	/**
	 * page8910
	 * process before check Q3 value : line: 553: If(Q3.ne.1) go to 205
	 *
	 * @return void
	 */
	private function page8910(){
		//$this->autoRender = false;
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		if($sUserDraftInput){
			if(isset($sUserDraftInput['data'])){
				$EnergyInput = $sUserDraftInput['data'];				
			}				
			$EnergyInput['Vf'] = (isset($EnergyInput['Vf']))?$EnergyInput['Vf']: 0;
			$EnergyInput['Hl'] = (isset($EnergyInput['Hl']))?$EnergyInput['Hl']: 0;
			$EnergyInput['Vfuel'] 	= $EnergyInput['Vf'];
			$EnergyInput['Eh_fuel'] = $EnergyInput['Vf'] * $EnergyInput['Hl'] * 1000; //!　Eh-fuelの計算処理
			$EnergyInput['Eh1'] 	= $EnergyInput['Eh_fuel'];			
			$EnergyInput['Vf_waste'] = 0;			
			$EnergyInput['Hl_waste'] = (isset($EnergyInput['Hl_waste']))?$EnergyInput['Hl_waste']: 0;

			$sUserDraftInput['data'] = $EnergyInput;

			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
		}
	}  /* End Page8910 */

	/**
	 * page10
	 * process user draf input for page10.html
	 *
	 * @return void
	 */
	public function page10(){		
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		$this->loadModel('MstData');
		$FUELDATA = $this->MstData->getAllData('FUELDATA');
		$this->set('FUELDATA', $FUELDATA);

		if($this->request->is('post')){	
			$dataPage10 = $this->request->data['energy_input'];;
			$Ifuel2 = $dataPage10['Ifuel2'];
			
			// Hl2=FUELDATA(Ifuel2,1)
			$dataPage10['Hl2'] = $FUELDATA[$Ifuel2][1];			
			
			// A02=FUELDATA(Ifuel2,3)
			$dataPage10['A02'] = $FUELDATA[$Ifuel2][3];

			// G0D2=FUELDATA(Ifuel2,5)
			$dataPage10['G0D2'] = $FUELDATA[$Ifuel2][5];

			// G02=FUELDATA(Ifuel2,4)
			$dataPage10['G02'] = $FUELDATA[$Ifuel2][4];

			// FCO22=FUELDATA(Ifuel2,6)
			$dataPage10['FCO22'] = $FUELDATA[$Ifuel2][6];

			// FH2O2=FUELDATA(Ifuel2,8)
			$dataPage10['FH2O2'] = $FUELDATA[$Ifuel2][8];

			// FN22=FUELDATA(Ifuel2,7)
			$dataPage10['FN22'] = $FUELDATA[$Ifuel2][7];

			// Hl_waste=Hl2
			$dataPage10['Hl_waste'] = $dataPage10['Hl2'];

			foreach($dataPage10 as $key => $val){
				$sUserDraftInput['data'][$key] = $val;
			}

			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
			
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);
			
			$this->page1011();
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));
			exit;
			
		}
		
	} /* End Page10 */

	/**
	 * page1011 
	 * process before check IND3 value: line: 557, If (IND3.ne.1) GO TO 206
	 *
	 * @return void
	 */
	private function page1011(){
		//$this->autoRender = false;

		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($sUserDraftInput){
			if(isset($sUserDraftInput['data'])){
				$EnergyInput = $sUserDraftInput['data'];
				$this->set('EnergyInput', $EnergyInput);
			}				

			// !　9	付着燃料燃焼計算処理　Q3=1の場合	既定燃料ファイルと燃料指定コードから燃焼計算用ファイルに書き込み。"		
			// Eh_waste=Vf_waste*Hl_waste*1000;
			$EnergyInput['Vf_waste'] = (isset($EnergyInput['Vf_waste']))? $EnergyInput['Vf_waste']:0;
			$EnergyInput['Hl_waste'] = (isset($EnergyInput['Hl_waste']))? $EnergyInput['Hl_waste']:0;
			$EnergyInput['Eh_waste'] = $EnergyInput['Vf_waste'] * $EnergyInput['Hl_waste'] * 1000;
			// Eh2=Eh_waste
			$EnergyInput['Eh2'] = $EnergyInput['Eh_waste'];

			$sUserDraftInput['data'] = $EnergyInput;
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
		}
	} /* End page1011 */

	/**
	 * page11
	 * process user draf input for page11.html
	 *
	 * @return void
	 */
	public function page11(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		
		$this->loadModel('MstData');
		$FUELDATA = $this->MstData->getAllData('FUELDATA');
		$this->set('FUELDATA', $FUELDATA);

		if($this->request->is('post')){				
			$dataPage11 = $this->request->data['energy_input'];
			$Ifuel3 = $dataPage11['Ifuel3'];
			
			// Hl_source=FUELDATA(Ifuel3,1)
			$dataPage11['Hl_source'] = $FUELDATA[$Ifuel3][1];	

			// !　13	Eu_atm_calの計算処理					
			// Eu_atm_cal=Vsource*Hl_source*1000
			$dataPage11['Eu_atm_cal'] = $dataPage11['Vsource'] * $dataPage11['Hl_source'] * 1000;
			
			foreach($dataPage11 as $key => $val){
				$sUserDraftInput['data'][$key] = $val;
			}
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);				
			
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));
			exit;
		}	
		
	} /* End Page11 */

	/**
	 * page12 
	 * process user draf input for page12.html
	 *
	 * @return void
	 */
	public function page12(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		if($this->request->is('post')){			
			$dataPage12 = $this->request->data['energy_input'];

			// !　15	蒸気エンタルピ-計算処理　蒸気エンタルピー計算サブルーチン処理(logic提供)
			// CAll STEAM(Tatmize,Patmize,Hatmize)			
			$Tatmize = ($dataPage12['Tatmize']!='')? $dataPage12['Tatmize']:0;
			$Patmize = ($dataPage12['Patmize']!='')? $dataPage12['Patmize']:0;
			$Vatmize = ($dataPage12['Vatmize']!='')? $dataPage12['Vatmize']:0;
			$Hatmize = 0;
			$this->Subroutine->STEAM($Tatmize, $Patmize, $Hatmize);

			// !16	Es_atmizeの計算						
			// Es_atmize=Vatmize*Hatmize	;print *, " Es_atmize=",Es_atmize
			$Es_atmize = $Vatmize * $Hatmize;

			$dataPage12['Tatmize'] = $Tatmize;
			$dataPage12['Patmize'] = $Patmize;
			$dataPage12['Vatmize'] = $Vatmize;
			$dataPage12['Hatmize'] = $Hatmize;
			$dataPage12['Es_atmize'] = $Es_atmize;

			foreach($dataPage12 as $key => $val){
				$sUserDraftInput['data'][$key] = $val;
			}
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);						
			
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));
			exit;
		}
		
	} /* End Page12 */

	/**
	 * page13 NOT DONE
	 * process user draf input for page13.html
	 *
	 * @return void
	 */
	public function page13(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		$this->loadModel('MstData');
		$CATM = $this->MstData->getAllData('CATM');
		$this->set('CATM', $CATM);

		if($this->request->is('post')){		
			$dataPage13 = $this->request->data['energy_input'];
			
			$Tatm1 = $dataPage13['Tatm1'];
			$Tatm2 = $dataPage13['Tatm2'];
			$Vatm = $dataPage13['Vatm'];
			$Iatm = $dataPage13['Iatm'];

			// !18	雰囲気ガス組成の決定						
			// !Iatmから組成決定
			for($i=1 ; $i<=20 ; $i++){
				$XX[$i] = 0;
			}

			$XX[8] = $CATM[$Iatm][1];
			$XX[5] = $CATM[$Iatm][2];
			$XX[1] = $CATM[$Iatm][3];
			$XX[11] = $CATM[$Iatm][4];
			$XX[2] = $CATM[$Iatm][5];

			// !19	比熱計算処理
			// Call GASSH(XX,Tatm1,CPX1)
			$CPX1 = 0;
			$this->Subroutine->GASSH($XX, $Tatm1, $CPX1);

			// Call GASSH(XX,Tatm2,CPX2)	
			$CPX2 = 0;
			$this->Subroutine->GASSH($XX, $Tatm2, $CPX2);
			// !　CPX1	Tatm1とガス組成を与えて	ガス比熱計算サブルーチン処理(logic提供)				
			// !　CPX2	Tatm2とガス組成を与えて	ガス比熱計算サブルーチン処理(logic提供)	

			// !　20	Es_atmの計算	Q11=3のとき
			$Es_atm = $Vatm*($Tatm2*$CPX2 - $Tatm1*$CPX1);

			$dataPage13['Tatm1'] = $Tatm1;
			$dataPage13['Tatm2'] = $Tatm2;
			$dataPage13['Vatm'] = $Vatm;
			$dataPage13['Iatm'] = $Iatm;
			$dataPage13['CPX1'] = $CPX1;
			$dataPage13['CPX2'] = $CPX2;
			$dataPage13['Es_atm'] = $Es_atm;
			$dataPage13['XX'] = $XX;

			foreach($dataPage13 as $key => $val){
				$sUserDraftInput['data'][$key] = $val;
			}
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);				
			$this->redirect(array('controller' => 'energy_input', 'action' => 'page15'));
		}
		
	} /* End Page13 */

	/**
	 * page13208
	 * process between page13.html and page15.html
	 */
	private function page13208(){
		//$this->autoRender = false;
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		$EnergyInput = $sUserDraftInput['data'];
		
		// !　21	共通部分の計算処理						
		// !	Es_fuel,Es_fuel2の計算	
		if(isset($EnergyInput['Q2']) && $EnergyInput['Q2'] == 'C'){	// If(Q2.ne.'C') Go To 209	
			// 	!　Q2=C	気体燃料の場合	燃料組成を主燃料計算用テンポファイルより呼び出し				
			// 	!		ガス組成をガス組成テンポファイルに出力	
			// DO i=1,20
			// XX(i)=0.0
			// END DO
			for($i=0 ; $i<=20 ; $i++){
				$XX[$i]= 0;
			}
			// XX(1)=CFUEL(1)!H2
			$XX[1] = (isset($EnergyInput['CFUEL'][1]))? $EnergyInput['CFUEL'][1] :0; //!H2

			// XX(2)=CFUEL(16); //!N2
			$XX[2] = (isset($EnergyInput['CFUEL'][16]))? $EnergyInput['CFUEL'][16] : 0; //!N2

			// XX(4)=CFUEL(14); //!O2
			$XX[4] = (isset($EnergyInput['CFUEL'][14]))? $EnergyInput['CFUEL'][14] : 0; //!O2

			// XX(5)=CFUEL(2); //!CO
			$XX[5] = (isset($EnergyInput['CFUEL'][2]))? $EnergyInput['CFUEL'][2] : 0; //!CO

			// XX(6)=CFUEL(18); //!H2O
			$XX[6] = (isset($EnergyInput['CFUEL'][18]))? $EnergyInput['CFUEL'][18] : 0; //!H2O

			// XX(8)=CFUEL(17); //!CO2
			$XX[8] = (isset($EnergyInput['CFUEL'][17]))? $EnergyInput['CFUEL'][17] : 0; //!CO2

			// XX(10)=CFUEL(15); //!Air
			$XX[10] = (isset($EnergyInput['CFUEL'][15]))? $EnergyInput['CFUEL'][15] : 0; //!Air

			// XX(11)=CFUEL(13); //!　; //!CH4
			$XX[11] = (isset($EnergyInput['CFUEL'][13]))? $EnergyInput['CFUEL'][13] : 0; //!　; //!CH4

			// XX(12)=CFUEL(8); //!　; //!C2H4
			$XX[12] = (isset($EnergyInput['CFUEL'][8]))? $EnergyInput['CFUEL'][8] : 0; //!　; //!C2H4

			// XX(13)=CFUEL(4); //!　; //!C2H6
			$XX[13] = (isset($EnergyInput['CFUEL'][4]))? $EnergyInput['CFUEL'][4] : 0; //!　; //!C2H6

			// XX(14)=CFUEL(13); //!　; //!C2H2
			$XX[14] = (isset($EnergyInput['CFUEL'][13]))?$EnergyInput['CFUEL'][13]: 0; //!　; //!C2H2

			// XX(15)=CFUEL(9); //!C3H6
			$XX[15] = (isset($EnergyInput['CFUEL'][9]))?$EnergyInput['CFUEL'][9]: 0; //!C3H6

			// XX(16)=CFUEL(5); //!C3H8
			$XX[16] = (isset($EnergyInput['CFUEL'][5]))?$EnergyInput['CFUEL'][5]: 0; //!C3H8

			// XX(17)=CFUEL(10); //!C4H8-1B
			$XX[17] = (isset($EnergyInput['CFUEL'][10]))?$EnergyInput['CFUEL'][10]: 0; //!C4H8-1B

			// XX(18)=CFUEL(11)+CFUEL(12); //!C4H8-2B
			$CFUEL11 = (isset($EnergyInput['CFUEL'][11]))? $EnergyInput['CFUEL'][11]: 0;
			$CFUEL12 = (isset($EnergyInput['CFUEL'][12]))? $EnergyInput['CFUEL'][12]: 0;

			$XX[18] = $CFUEL11 + $CFUEL12; //!C4H8-2B

			// XX(19)=CFUEL(6); //!C4H10-nB
			$XX[19] = (isset($EnergyInput['CFUEL'][6]))?$EnergyInput['CFUEL'][6]: 0; //!C4H10-nB

			// XX(20)=CFUEL(7); //!C4H10-iB
			$XX[20] = (isset($EnergyInput['CFUEL'][7]))?$EnergyInput['CFUEL'][7]: 0; //!C4H10-iB
			
			// !XX(1):H2
			// !XX(2):N2
			// !XX(3):N2/Air
			// !XX(4):O2
			// !XX(5):CO
			// !XX(6):H2O
			// !XX(7):H2S
			// !XX(8):CO2
			// !XX(9):SO2
			// !XX(10):Air
			// !XX(11):CH4
			// !XX(12):C2H4
			// !XX(13):C2H6
			// !XX(14):C2H2
			// !XX(15):C3H6
			// !XX(16):C3H8
			// !XX(17):C4H8-1B
			// !XX(18):C4H8-2B
			// !XX(19):C4H10-nB
			// !XX(20):C4H10-iB
			// Call GASSH(XX,Tf1,CPX1)
			$Tf1 = (isset($EnergyInput['Tf1']))?$EnergyInput['Tf1']: 0;
			$CPX1 = 0;
			$this->Subroutine->GASSH($XX, $Tf1, $CPX1);
			$EnergyInput['Tf1'] = $Tf1;
			$EnergyInput['CPX1'] = $CPX1;

			// ! continue
			// Call GASSH(XX,Tf2,CPX2)
			$Tf2 = (isset($EnergyInput['Tf2']))?$EnergyInput['Tf2']:0;
			$CPX2 = 0;
			$this->Subroutine->GASSH($XX, $Tf2, $CPX2);
			$EnergyInput['Tf2'] = $Tf2;
			$EnergyInput['CPX2'] = $CPX2;

			$EnergyInput['XX'] = $XX;

			// Es_fuel=Vf*CPX1*Tf1
			$EnergyInput['Vf'] = (isset($EnergyInput['Vf']))? $EnergyInput['Vf'] : 0;
			$EnergyInput['Es_fuel'] = $EnergyInput['Vf'] * $EnergyInput['CPX1'] * $EnergyInput['Tf1'];
			// print *,Es_fuel		
										
			// Es_fuel2=Vf*CPX2*Tf2	
			$EnergyInput['Es_fuel2'] = $EnergyInput['Vf'] * $EnergyInput['CPX2'] * $EnergyInput['Tf2'];

			// Go TO 210
		}else{  // If(Q2.ne.'C') Go To 209
			// 209 continue	
			// Print *,  " OILの比熱を入力してください。"
			// Print *, "液体燃料の比熱　KJ/Kg,℃　　 CPX= ";Read *,CPX
			$EnergyInput['CPX'] = 1.7;
			// !Es_fuel					
			// Es_fuel=Vf*CPX*Tf1	;print *, " Es_fuel=",Es_fuel	
			$EnergyInput['Vf'] = (isset($EnergyInput['Vf']))? $EnergyInput['Vf'] : 0;
			$EnergyInput['Tf1'] = (isset($EnergyInput['Tf1']))? $EnergyInput['Tf1'] : 0;
			$EnergyInput['Es_fuel'] = $EnergyInput['Vf'] * $EnergyInput['CPX'] * $EnergyInput['Tf1'];

			// !Es_fuel2					
			// Es_fuel2=Vf*CPX*Tf2	;print *, " Es_fuel2=",Es_fuel2
			$EnergyInput['Tf2'] = (isset($EnergyInput['Tf2']))? $EnergyInput['Tf2'] : 0;
			$EnergyInput['Es_fuel2'] = $EnergyInput['Vf'] * $EnergyInput['CPX'] * $EnergyInput['Tf2'];
		}		
		// 210 continue	
		
		// !　混合燃料計算
		// !CAll　MULTIFUEL()
		// Call MULTIFUEL(Eh1,Eh2,Hl1,Hl2,A01,A02,G0D1,G0D2,G01,G02,FCO21,FH2O1,FN21,FSO21,FCO22,FH2O2,FN22, FSO22,A0M,G0DM,G0M,FCO2M,FH2OM,FN2M,FSO2M)
		$Eh1 = (isset($EnergyInput['Eh1'])) ? $EnergyInput['Eh1']: 0;
		$Eh2 = (isset($EnergyInput['Eh2'])) ? $EnergyInput['Eh2']:0;
		$Hl1 = (isset($EnergyInput['Hl1'])) ? $EnergyInput['Hl1']:0;
		$Hl2 = (isset($EnergyInput['Hl2'])) ? $EnergyInput['Hl2']:0;
		$A01 = (isset($EnergyInput['A01'])) ? $EnergyInput['A01']:0;
		$A02 = (isset($EnergyInput['A02'])) ? $EnergyInput['A02']:0;
		$G0D1 	= (isset($EnergyInput['G0D1'])) ? $EnergyInput['G0D1']:0;
		$G0D2 	= (isset($EnergyInput['G0D2'])) ? $EnergyInput['G0D2']:0;
		$G01 	= (isset($EnergyInput['G01'])) ? $EnergyInput['G01']:0;
		$G02 	= (isset($EnergyInput['G02'])) ? $EnergyInput['G02']:0;
		$FCO21 	= (isset($EnergyInput['FCO21'])) ? $EnergyInput['FCO21']:0;
		$FH2O1 	= (isset($EnergyInput['FH2O1'])) ? $EnergyInput['FH2O1']:0;
		$FN21 	= (isset($EnergyInput['FN21'])) ? $EnergyInput['FN21']:0;
		$FSO21 	= 0;
		$FCO22 	= (isset($EnergyInput['FCO22'])) ? $EnergyInput['FCO22']:0;
		$FH2O2 	= (isset($EnergyInput['FH2O2'])) ? $EnergyInput['FH2O2']:0;
		$FN22	= (isset($EnergyInput['FN22'])) ? $EnergyInput['FN22']:0;
		$FSO22 	= 0;
		$A0M 	= 0;
		$G0DM 	= 0;
		$G0M 	= 0;
		$FCO2M 	= 0;
		$FH2OM 	= 0;
		$FN2M 	= 0;
		$FSO2M 	= 0;

		$this->Subroutine->MULTIFUEL($Eh1, $Eh2, $Hl1, $Hl2, $A01, $A02, $G0D1, $G0D2, $G01, $G02, $FCO21, $FH2O1, $FN21, $FSO21, $FCO22, $FH2O2, $FN22, $FSO22, $A0M, $G0DM, $G0M, $FCO2M, $FH2OM, $FN2M, $FSO2M);
		// PRINT *, "A0M,G0DM,G0M=", A0M,G0DM,G0M

		$EnergyInput['Eh1'] = $Eh1;
		$EnergyInput['Eh2'] = $Eh2;
		$EnergyInput['Hl1'] = $Hl1;
		$EnergyInput['Hl2'] = $Hl2;
		$EnergyInput['A01'] = $A01;
		$EnergyInput['A02'] = $A02;
		$EnergyInput['G0D1'] 	= $G0D1;
		$EnergyInput['G0D2'] 	= $G0D2;
		$EnergyInput['G01'] 	= $G01;
		$EnergyInput['G02'] 	= $G02;
		$EnergyInput['FCO21'] 	= $FCO21;
		$EnergyInput['FH2O1'] 	= $FH2O1;
		$EnergyInput['FN21'] 	= $FN21;
		$EnergyInput['FSO21'] 	= $FSO21;
		$EnergyInput['FCO22'] 	= $FCO22;
		$EnergyInput['FH2O2'] 	= $FH2O2;
		$EnergyInput['FN22'] 	= $FN22;
		$EnergyInput['FSO22'] 	= $FSO22;
		$EnergyInput['A0M'] 	= $A0M;
		$EnergyInput['G0DM'] 	= $G0DM;
		$EnergyInput['G0M'] 	= $G0M;
		$EnergyInput['FCO2M'] 	= $FCO2M;
		$EnergyInput['FH2OM'] 	= $FH2OM;
		$EnergyInput['FN2M'] 	= $FN2M;
		$EnergyInput['FSO2M'] 	= $FSO2M;

		$EnergyInput['A0_hyp'] 	= $A0M;
		$EnergyInput['G0D'] 	= $G0DM;
		$EnergyInput['G0'] 		= $G0M;
		$EnergyInput['FCO2'] 	= $FCO2M;
		$EnergyInput['FH2O'] 	= $FH2OM;
		$EnergyInput['FN2'] 	= $FN2M;
		
		// Call Airratio(Fg_O2,Fa_O2,Fa_H2O,G0D,A0M,M) 
		$Fg_O2 	= (isset($EnergyInput['Fg_O2']))? $EnergyInput['Fg_O2']: 0;
		$Fa_O2 	= (isset($EnergyInput['Fa_O2']))? $EnergyInput['Fa_O2']: 0; 
		$Fa_H2O = (isset($EnergyInput['Fa_H2O']))? $EnergyInput['Fa_H2O']: 0;
		$G0D 	= (isset($EnergyInput['G0D']))? $EnergyInput['G0D']: 0;
		$M 		= 0;
		$A0M 	= (isset($EnergyInput['A0M']))? $EnergyInput['A0M']: 0;
		$this->Subroutine->AIRRATIO($Fg_O2, $Fa_O2, $Fa_H2O, $G0D, $A0M, $M);
		$EnergyInput['Fg_O2'] 	= $Fg_O2;
		$EnergyInput['Fa_O2']	= $Fa_O2; 
		$EnergyInput['Fa_H2O'] 	= $Fa_H2O;
		$EnergyInput['G0D'] 	= $G0D;
		$EnergyInput['A0M']		= $A0M;
		$EnergyInput['M'] 		= $M;

		$EnergyInput['Mhyp'] = $M;
		// print *, " M=", M		
									
		// ! 空気比の算出		混合計算用テンポファイルデ-タと,Fg_O2より,				
		// !		Mhyp	空気比計算サブルーチン処理(logic提供)				
									
		// ! 全空気量の計算	Ahyp	
		$EnergyInput['Ahyp'] = $EnergyInput['Mhyp'] * $EnergyInput['A0_hyp'] * ($EnergyInput['Eh1'] + $EnergyInput['Eh2']);
									
		// ! 侵入空気量の計算		
		$EnergyInput['A'] = $EnergyInput['Ahyp'];
		$Vme = (isset($EnergyInput['Vme']))? $EnergyInput['Vme']:0;		
		$EnergyInput['Vair'] = $Vme;

		// CAll INFILT(Vme,A,Vinfilt)		
		$A 	 = (isset($EnergyInput['A']))? $EnergyInput['A']:0;	
		$Vinfilt = 0;
		$this->Subroutine->INFILT($Vme, $A, $Vinfilt);
		$EnergyInput['Vme'] = $Vme;		
		$EnergyInput['A'] 	= $A;	
		$EnergyInput['Vinfilt'] = $Vinfilt;

		$Vair = $A - $Vinfilt;
		$EnergyInput['Vair'] = $Vair/1000;
		$EnergyInput['A'] = $A/1000;
		$EnergyInput['Vinfilt'] = $Vinfilt/1000;

		// !Es_air,Es_air2の計算
		
		for($i=1 ; $i<=20 ; $i++){
			$XX[$i] = 0;
		}
		$XX[3] = (isset($EnergyInput['FaN2']))? $EnergyInput['FaN2']: 0; //!N2
		$XX[4] = (isset($EnergyInput['FaO2']))? $EnergyInput['FaO2']: 0; //!O2
		$XX[6] = (isset($EnergyInput['FaH2O']))? $EnergyInput['FaH2O']: 0; //!H2O
		// !XX(3):N2/Air
		// !XX(4):O2
		// !XX(6):H2O
		// ! Ifile は不要だった。

		// Call GASSH(XX,Ta1,CPX1)
		$Ta1 = (isset($EnergyInput['Ta1']))? $EnergyInput['Ta1']: 0;
		$CPX1 = 0;
		$this->Subroutine->GASSH($XX, $Ta1, $CPX1);
		$EnergyInput['Ta1'] = $Ta1;
		$EnergyInput['CPX1'] = $CPX1;
		
		// Call GASSH(XX,Ta2,CPX2)
		$Ta2 = (isset($EnergyInput['Ta2']))? $EnergyInput['Ta2']:0;
		$CPX2 = 0;
		$this->Subroutine->GASSH($XX, $Ta2, $CPX2);
		$EnergyInput['Ta2'] = $Ta2;
		$EnergyInput['CPX2'] = $CPX2;

		$EnergyInput['Es_air'] = $EnergyInput['Vair'] * $CPX1 * $EnergyInput['Ta1'];
		// 	print *, " Es_air=",Es_air							
		$EnergyInput['Es_air2'] = $EnergyInput['Vair'] * $CPX2 * $EnergyInput['Ta2'];
		//    print *, " Es_air2=",Es_air2							
		// !　Es_infiltの計算
								
		$EnergyInput['Es_infilt'] = $EnergyInput['Vinfilt'] * $CPX1 * $EnergyInput['Ta1'];
		// 	 print *, " Es_infilt=",Es_infilt					
		// !Eexhaust,Eexhaust１，Eexhaust2の計算						
								
		// !排ガス量計算	Vg	
		$G0M = (isset($EnergyInput['G0M']))? $EnergyInput['G0M']: 0;
		$EnergyInput['G0_hyp'] = $G0M;
		$EnergyInput['Gg'] = ($EnergyInput['G0_hyp'] + ($EnergyInput['Mhyp'] - 1.0)*$EnergyInput['A0_hyp']);
		$Eh_fuel = (isset($EnergyInput['Eh_fuel']))?$EnergyInput['Eh_fuel']:0;
		$Eh_waste = (isset($EnergyInput['Eh_waste']))?$EnergyInput['Eh_waste']:0;
		$EnergyInput['Vg'] = ($EnergyInput['Gg'] *($Eh_fuel + $Eh_waste))/1000;

		// !ガス組成計算		空気比と混合計算用テンポファイルから組成計算	
		$EnergyInput['PN2'] = 0;
		$EnergyInput['PO2'] = 0;
		$EnergyInput['PH2O'] = 0;
		$EnergyInput['PCO2'] = 0;
		if ($EnergyInput['Gg'] != 0) {
			$EnergyInput['Fa_N2'] = (isset($EnergyInput['Fa_N2']))? $EnergyInput['Fa_N2']: 0;
			$EnergyInput['PN2'] = ($EnergyInput['FN2M'] + ($EnergyInput['Mhyp'] - 1.0)*$EnergyInput['A0_hyp']*$EnergyInput['Fa_N2'])/$EnergyInput['Gg'];

			$EnergyInput['PO2'] = (($EnergyInput['Mhyp']-1.0)*$EnergyInput['A0_hyp']*$EnergyInput['Fa_O2'])/$EnergyInput['Gg'];

			$EnergyInput['PH2O'] = ($EnergyInput['FH2OM']+($EnergyInput['Mhyp']-1.0)*$EnergyInput['A0_hyp']*$EnergyInput['Fa_H2O'])/$EnergyInput['Gg'];

			$EnergyInput['PCO2'] = $EnergyInput['FCO2M']/$EnergyInput['Gg'];
		}
		
		for($i=1 ; $i<=20 ; $i++){
			$XX[$i] = 0;
		}
		$XX[2] = $EnergyInput['PN2']; // !N2
		$XX[4] = $EnergyInput['PO2']; // !O2
		$XX[6] = $EnergyInput['PH2O']; // !H2O
		$XX[8] = $EnergyInput['PCO2']; // !CO2

		// !XX(2):N2
		// !XX(4):O2
		// !XX(6):H2O
		// !XX(8):CO2
		// !XX(9):SO2
		// !XX(10):Air
		// Call GASSH(XX,Tescape,cpx1);print *, " cpx1=",cpx1
		$Tescape = (isset($EnergyInput['Tescape']))? $EnergyInput['Tescape'] : 0;
		$CPX1 = 0;		
		$this->Subroutine->GASSH($XX, $Tescape, $CPX1); //print *, " cpx1=",cpx1
		$EnergyInput['Tescape'] = $Tescape;
		$EnergyInput['CPX1'] = $CPX1;

		// Call GASSH(XX,te,CPX2)
		$Te = (isset($EnergyInput['Te']))?$EnergyInput['Te']:0;
		$CPX2 = 0;
		$this->Subroutine->GASSH($XX, $Te, $CPX2);
		$EnergyInput['Te'] = $Te;
		$EnergyInput['CPX2'] = $CPX2;

		// Call GASSH(XX,Twg1,cpx3)
		$Twg1 = (isset($EnergyInput['Twg1']))?$EnergyInput['Twg1']:0;
		$CPX3 = 0;
		$this->Subroutine->GASSH($XX, $Twg1, $CPX3);
		$EnergyInput['Twg1'] = $Twg1;
		$EnergyInput['CPX3'] = $CPX3;

		// Call GASSH(XX,Twg2,cpx4)
		$Twg2 = (isset($EnergyInput['Twg2']))? $EnergyInput['Twg2']: 0;
		$CPX4 = 0;
		$this->Subroutine->GASSH($XX, $Twg2, $CPX4);
		$EnergyInput['Twg2'] = $Twg2;
		$EnergyInput['CPX4'] = $CPX4;

		$EnergyInput['XX']  = $XX;

		$EnergyInput['Eexhaust1'] = $CPX1 * $EnergyInput['Tescape'] * $EnergyInput['Vg']; // print *, " Eexhaust1=", Eexhaust1
		$EnergyInput['Eexhaust2'] = $CPX2 * $EnergyInput['Te'] * $EnergyInput['Vg']; // print *, " Eexhaust2=", Eexhaust2
		$EnergyInput['Eexhaust3'] = $CPX3 * $EnergyInput['Twg1'] * $EnergyInput['Vg']; // print *, " Eexhaust3=", Eexhaust3
		$EnergyInput['Eexhaust4'] = $CPX4 * $EnergyInput['Twg2'] * $EnergyInput['Vg']; //print *, " Eexhaust4=", Eexhaust4

		if(isset($EnergyInput['Q5']) && $EnergyInput['Q5'] == 1){
			// 		!Eexhaust１	Twg1とガス組成ファイルから比熱を算出する。				
			// 		!CPX１	ガス比熱計算サブルーチン処理(logic提供)										
			$EnergyInput['Aescape'] = (isset($EnergyInput['Aescape']))? $EnergyInput['Aescape'] : 0;
			$EnergyInput['Aes'] = $EnergyInput['Aescape']/100.0;

			$EnergyInput['Eexhaust'] = $EnergyInput['Aes']*$EnergyInput['Eexhaust1'] + (1 - $EnergyInput['Aes'])*$EnergyInput['Eexhaust2'];

			$EnergyInput['Eescape'] = $EnergyInput['Aes'] * $EnergyInput['Eexhaust1'];
			$EnergyInput['Ereg'] = (1 - $EnergyInput['Aes'])*$EnergyInput['Eexhaust2'];
			// print *, " Eexhaust=", Eexhaust;print *, " Eescape=", Eescape;print *, " Ereg=", Ereg
			// GO TO 212
		}else{ // if(q5.ne.1) go to 211
			// !Eexhaustの計算
			// 211 continue
			/*if(isset($EnergyInput['Ibd3']) && $EnergyInput['Ibd3'] == 1){ //if(ibd3.eq.1) then
				$EnergyInput['Tg1'] = $EnergyInput['Twg1'];
				$Tg1 = $EnergyInput['Tg1'];
				$this->Subroutine->GASSH($XX, $Tg1, $CPX1);
				$EnergyInput['Tg1'] = $Tg1;
				$EnergyInput['CPX1'] = $CPX1;
				$EnergyInput['XX'] = $XX;

				$EnergyInput['Eexhaust_hc'] = $CPX1 * $EnergyInput['Tg1'] * $EnergyInput['Vg'];
			}else{
				$EnergyInput['Eexhaust'] = $CPX2 * $EnergyInput['Te'] * $EnergyInput['Vg'];
			}*/
			$EnergyInput['Eexhaust_hc'] = $EnergyInput['Eexhaust3'];
			$EnergyInput['Eexhaust'] = $EnergyInput['Eexhaust2'];
		}

		// 212 continue

		// print *," Eexhaust=",Eexhaust
		// print *," Eexhaust_hc=",Eexhaust_hc							
		// !Erecoveryの計算						
		// 	!排熱回収量の計算		
		/*$EnergyInput['Erecovery'] =($EnergyInput['Es_fuel2'] - $EnergyInput['Es_fuel'])+($EnergyInput['Es_air2'] - $EnergyInput['Es_air']);*/
		// print *," Erecovery=",Erecovery
		$EnergyInput['Es_fuel2'] = (isset($EnergyInput['Es_fuel2'])) ? $EnergyInput['Es_fuel2']: 0;
		$EnergyInput['Es_fuel'] = (isset($EnergyInput['Es_fuel'])) ? $EnergyInput['Es_fuel'] : 0;	
		$EnergyInput['Es_air2'] = (isset($EnergyInput['Es_air2']))? $EnergyInput['Es_air2']: 0;
		$EnergyInput['Es_air'] = (isset($EnergyInput['Es_air']))? $EnergyInput['Es_air']: 0;
		$EnergyInput['Erecovery'] = ($EnergyInput['Es_fuel2'] - $EnergyInput['Es_fuel']) + ($EnergyInput['Es_air2'] - $EnergyInput['Es_air']); 

		$EnergyInput['Erecovery_obs'] = $EnergyInput['Erecovery'];
		// print *," Erecovery_obs=",Erecovery_obs
			
		// !Eexhaustの計算
		if(isset($EnergyInput['Q5']) && $EnergyInput['Q5'] == 1){ // If(Q5 .eq. 1) then
			$EnergyInput['Erecovery'] = (1 - $EnergyInput['Aes'])*($EnergyInput['Eexhaust3'] - $EnergyInput['Eexhaust2']);

			$EnergyInput['Eexhaust_hc'] = $EnergyInput['Aes']*$EnergyInput['Eexhaust1'] + (1 - $EnergyInput['Aes'])*$EnergyInput['Eexhaust3'];

			$EnergyInput['Erecovery_reg'] = $EnergyInput['Erecovery'];
			// GO TO 2120
		// }else{	
			// if(isset($EnergyInput['Ibd2']) && $EnergyInput['Ibd2'] == 1){ // If(Ibd2 .eq. 1) then
				// $EnergyInput['Eexhaust_hc'] = $EnergyInput['Eexhaust'] + $EnergyInput['Erecovery'];
			}else{
				// $EnergyInput['Eexhaust_hc'] = $EnergyInput['Eexhaust'];
			}
		// }
		
		// 2120 continue
		// print *," Eexhaust_hc=",Eexhaust_hc	;print *," Erecovery=",	 Erecovery
		// !Eexhaust_hcの計算
		// !加熱室出口排ガス顕熱
		// !リジェネの場合	Q5=1	Eexhaust_hc=Eexhaust+Erecovery
		// !レキュ含む	Q5=0;Ibd=2	Eexhaust_hc=Eexhaust+Erecovery
		// !加熱室のみ	Q5=0;Ibd=4	Eexhaust_hc=Eexhaust1
		
		$sUserDraftInput['data'] = $EnergyInput;
			
		$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);		
		
	}/* End page13208 */

	/**
	 * page15 
	 * process user draf input for page15.html
	 *
	 * @return void
	 */
	public function page15(){
		//pre-process
		$this->page13208();
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		$this->loadModel('MstData');
		$PRODATA = $this->MstData->getAllData('PRODATA');
		$this->set('PRODATA', $PRODATA);

		if($this->request->is('post')){			
			$dataPage15 = $this->request->data['energy_input'];;
			$Ipro = $dataPage15['Ipro'];
			$Tp1 = $dataPage15['Tp1'];
			$Tp2 = $dataPage15['Tp2'];
			$Mloss = $dataPage15['Mloss'];
									
			if($Ipro <= 10){ // If(Ipro .le. 10) GO TO 300
				// 300 continue

				// !比熱計算処理	CPX1	Tp1,　Iproより固体比熱計算
				// !Ifileは不要だった。

				$CPX1 = 0;
				// call SH_SOLID(PRODATA,Ipro,Tp1,CPX1);cpx1=cpx1*4.184
				$this->Subroutine->SH_SOLID($PRODATA, $Ipro, $Tp1, $CPX1);
				$CPX1 = $CPX1 * 4.184;
				$dataPage15['CPX1'] = $CPX1;

				// print *, TP1,CPX1
				// !　　　　　　　CPX２	Tp2,　Iproより固体比熱計算
				// call SH_SOLID(PRODATA,Ipro,Tp2,CPX2);;cpx2=cpx2*4.184
				$CPX2 = 0;
				$this->Subroutine->SH_SOLID($PRODATA, $Ipro, $Tp2, $CPX2);
				$CPX2 = $CPX2 * 4.184;
				$dataPage15['CPX2'] = $CPX2;
				// print *, TP2,CPX2

				// 301 continue
				// !　計算処理	Ep1
				$Ep1 = 1000 * $CPX1 * $Tp1;
				$dataPage15['Ep1'] = $Ep1;
				// !Ep2
				$Ep2 = (1000 - $Mloss)* $CPX2 * $Tp2;
				$dataPage15['Ep2'] = $Ep2; 
				
				$Es_oxid = 0;
				if ($Tp2 != 0) {
					$Es_oxid = $Mloss * 100 / 77 * 0.9 * $Tp2; //print *,"	Es_oxid =",	Es_oxid
				}
				$dataPage15['Es_oxid'] = $Es_oxid; 

				// 302 continue
				// !Eeffect
				$Eeffect = $Ep2 - $Ep1;
				$dataPage15['Eeffect'] = $Eeffect; 
			}

			if($Ipro > 11){
				$CPX1 = $PRODATA[$Ipro][2];
				$CPX2 = $PRODATA[$Ipro][2];
				// GO TO 301

				// 301 continue
				// !　計算処理	Ep1
				$Ep1 = 1000 * $CPX1 * $Tp1;
				$dataPage15['Ep1'] = $Ep1; 
				$dataPage15['CPX1'] = $CPX1; 
				// !Ep2
				$Ep2 = (1000 - $Mloss) * $CPX2 * $Tp2;
				$dataPage15['Ep2'] = $Ep2; 
				$dataPage15['CPX2'] = $CPX2; 
				$Es_oxid = $Mloss*(100/77)*0.9*$Tp2; // ;print *,"	Es_oxid =",	Es_oxid
				$dataPage15['Es_oxid'] = $Es_oxid; 
				// 302 continue
				// !Eeffect
				$Eeffect = $Ep2 - $Ep1;
				$dataPage15['Eeffect'] = $Eeffect; 
			}

			if($Ipro == 11){ // If (Ipro .eq. 11) then
				$Ep1 = 1076 * $Tp1;
				$dataPage15['Ep1'] = $Ep1; 
				$CPX2 = 0.0002014*(660 + $Tp2)/2.0 + 0.915;
				$Ep2 = (1000. - $Mloss)*(1106. + $CPX2*($Tp2 - 660.0));
				$dataPage15['Ep2'] = $Ep2; 
				$dataPage15['CPX2'] = $CPX2; 
				$Es_oxid = $Mloss*0.779*$Tp2*100/77.7;
				$dataPage15['Es_oxid'] = $Es_oxid; 
				// GO TO 302

				// 302 continue
				// !Eeffect
				$Eeffect = $Ep2 - $Ep1;
				$dataPage15['Eeffect'] = $Eeffect; 
			}	

			// print *, "Eeffect=",Eeffect
			// print *, "	Es_oxid=",	Es_oxid
			
			$dataPage15['Ipro'] = $Ipro;
			$dataPage15['Tp1'] = $Tp1;
			$dataPage15['Tp2'] = $Tp2;
			$dataPage15['Mloss'] = $Mloss;

			foreach($dataPage15 as $key => $val){
				$sUserDraftInput['data'][$key] = $val;
			}
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);					
			
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));
			exit;
		}
		
	} /* End Page15 */

	/**
	 * page16
	 * process user draf input for page16.html
	 *
	 * @return void
	 */
	public function page16(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		if($this->request->is('post')){			
			$dataPage16 = $this->request->data['energy_input'];
			$EnergyInput = $sUserDraftInput['data'];
			
			// !　Efeo	酸化鉄生成熱			4.814	KJ/kg
			// !　計算処理	Ereact
			$dataPage16['Ereact'] = 0;
			if (0 != $dataPage16['Wtfe']*0.77*$dataPage16['Efeo']) {
				$dataPage16['Ereact'] = $EnergyInput['Mloss']*100/$dataPage16['Wtfe']*0.77*$dataPage16['Efeo'];
			}
			
			foreach($dataPage16 as $key => $val){
				$sUserDraftInput['data'][$key] = $val;
			}
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
			
			$this->redirect(array('controller' => 'energy_input', 'action' => 'page14'));
		}
		
	} /* End Page16 */	

	/**
	 * page17 
	 * process user draf input for page17.html
	 *
	 * @return void
	 */
	public function page17(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		if($this->request->is('post')){			
			$dataPage17 = $this->request->data['page17'];
			$EnergyInput = $sUserDraftInput['data'];
			
			$EnergyInput['Mloss'] = (isset($EnergyInput['Mloss']))? $EnergyInput['Mloss'] :0;
			$dataPage17['Ereact'] = $EnergyInput['Mloss'] * $dataPage17['Eal'];

			foreach($dataPage17 as $key => $val){
				$sUserDraftInput['data'][$key] = $val;
			}
			$sUserDraftInput['data']['Mloss'] = $EnergyInput['Mloss'];
				
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);				
			
			$this->redirect(array('controller' => 'energy_input', 'action' => 'page14'));
		}
		
	} /* End Page17 */	

	/**
	 * page14 
	 * process user draf input for page14.html
	 * Q13: fortran-spec: 1:ＹＥＳ　0:ＮＯ - 1: 実行 2: スキップ
	 * @return void
	 */
	public function page14(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		$El_jig = array(1=>0, 2=>0, 3=>0);

		if($this->request->is('post')){			
			$dataPage14 = $this->request->data['energy_input'];
			
			foreach($dataPage14 as $key => $val){
				$sUserDraftInput['data'][$key] = $val;
			}
			$sUserDraftInput['data']['El_jig'] = $El_jig;
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);						
			
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));
			exit;
		}
		
	} /* End Page14 */	

	/**
	 * page18 
	 * process user draf input for page18.html
	 *
	 * @return void
	 */
	public function page18(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		if($this->request->is('post')){			
			$dataPage18 = $this->request->data['energy_input'];
			$EnergyInput = $sUserDraftInput['data'];
			
			$this->loadModel('MstData');
			$PRODATA = $this->MstData->getAllData('PRODATA');
			
			if(isset($EnergyInput['El_jig'])){
				$El_jig = $EnergyInput['El_jig'];	
			}else{
				$El_jig = array(1=>0, 2=>0, 3=>0);
			}				
			
			$CPX1 = 0;
			$CPX2 = 0;
			for($i=1 ; $i<=3 ; $i++){
				/*if($dataPage18['Mj'][$i] <= 0){
					for($j=$i ; $j<=3 ; $j++){
						$dataPage18['Mj'][$j] = 0;
						$dataPage18['Ijig'][$j] = 0;
						$dataPage18['Tj1'][$j] = 0;
						$dataPage18['Tj2'][$j] = 0;
					}
					break;
				}else{
					$CPX1 = $PRODATA[$dataPage18['Ijig'][$i]][2];
					$CPX2 = $PRODATA[$dataPage18['Ijig'][$i]][2];					
					$El_jig[$i] = $dataPage18['Mj'][$i]*($dataPage18['Tj2'][$i]*$CPX2-$dataPage18['Tj1'][$i]*$CPX1);					
				}*/
				if($dataPage18['Ijig'][$i] != ''){
					$CPX1 = $PRODATA[$dataPage18['Ijig'][$i]][2];
					$CPX2 = $PRODATA[$dataPage18['Ijig'][$i]][2];					
					$El_jig[$i] = $dataPage18['Mj'][$i]*($dataPage18['Tj2'][$i]*$CPX2-$dataPage18['Tj1'][$i]*$CPX1);					
				}else{
					$dataPage18['Mj'][$i] = 0;
					$dataPage18['Ijig'][$i] = 0;
					$dataPage18['Tj1'][$i] = 0;
					$dataPage18['Tj2'][$i] = 0;
				}
			}

			$dataPage18['CPX1'] = $CPX1;
			$dataPage18['CPX2'] = $CPX2;
			$dataPage18['El_jig'] = $El_jig;
			
			$dataPage18['El_jig_t'] = 0;
			for($i=1 ; $i<=3 ; $i++){
				// El_jig_T=El_jig_T+	El_jig(i)
				$dataPage18['El_jig_t'] = $dataPage18['El_jig_t'] +	$dataPage18['El_jig'][$i];
			}

			foreach($dataPage18 as $key => $val){
				$sUserDraftInput['data'][$key] = $val;
			}
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
			
			$this->redirect(array('controller' => 'energy_input', 'action' => 'page20'));
		}
		
	} /* End Page18 */	

	/**
	 * page19 
	 * process user draf input for page19.html
	 *
	 * @return void
	 */
	public function page19(){		
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$EnergyInput = $sUserDraftInput['data'];				
			}			

			$dataPage19 = $this->request->data['energy_input'];	
			$actPage = $this->request->data['act'];	
			switch ($actPage){
				case 'actp5':	$act = 5; break;
				case 'act1':	$act = 1; break;
				case 'act2':	$act = 2; break;
				case 'act3':	$act = 3; break;
				case 'act4':	$act = 4; break;
				case 'actp13':	$act = 13; break;				
			}	
			
			foreach($dataPage19 as $key => $val){
				$EnergyInput['page19'][$key][$act] = $val;
			}
			
			$sUserDraftInput['data'] = $EnergyInput;
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);	
		}else{
			$this->layout = 'energy_input_popup';

			$this->loadModel('MstData');
			$PRODATA = $this->MstData->getAllData('PRODATA');
			$this->set('PRODATA', $PRODATA);

			$act = 0;
			if(isset($this->request->pass[0])){
				switch ($this->request->pass[0]) {
					case 1:	$act = 1; break;
					case 2:	$act = 2; break;
					case 3:	$act = 3; break;
					case 4:	$act = 4; break;				
					case 5:	$act = 5; break;				
					case 13:	$act = 13; break;				
				}
			}
			$this->set('act', $act);
		}
	} /* End page19 */	

	/**
	 * page20 
	 * process user draf input for page20.html	 
	 * @return void
	 */
	public function page20(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		if($this->request->is('post')){			
			$dataPage20 = $this->request->data['energy_input'];
			
			foreach($dataPage20 as $key => $val){
				$sUserDraftInput['data'][$key] = $val;
			}
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);						
			
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);
			if($next_page == 'out'){				
				$this->Statistics->set_input($sUserDraftInput);
				$this->Statistics->energy_input();
				$sUserDraftInput = $this->Statistics->get_output();
				$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
			}			
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));
			exit;
			
		}
		
	} /* End page20 */	

	/**
	 * page21 
	 * process user draf input for page21.html	 
	 * @return void
	 */
	public function page21(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		if($this->request->is('post')){			
			$dataPage21 = $this->request->data['energy_input'];
			
			$El_wall_t = 0;
			$El_opening_t = 0;
			$El_cw_t = 0;
			$El_storage_t = 0;
			$El_blowout_t = 0;
			$El_parts_t = 0;
			$El_ot_t = $dataPage21['El_ot_t'];

			for($i=1 ; $i<=10 ; $i++){
				if($dataPage21['El_wall'][$i]==''){
					$dataPage21['El_wall'][$i] = 0;
				}
			}

			for($i=1 ; $i<=10 ; $i++){
				if($dataPage21['El_opening'][$i]==''){
					$dataPage21['El_opening'][$i] = 0;
				}				
			}

			for($i=1 ; $i<=10 ; $i++){
				if($dataPage21['El_cw'][$i]==''){					
					$dataPage21['El_cw'][$i] = 0;
				}
			}

			for($i=1 ; $i<=10 ; $i++){
				if($dataPage21['El_storage'][$i]==''){					
					$dataPage21['El_storage'][$i] = 0;
				}
			}

			for($i=1 ; $i<=10 ; $i++){
				if($dataPage21['El_blowout'][$i]==''){					
					$dataPage21['El_blowout'][$i] = 0;
				}
			}

			for($i=1 ; $i<=10 ; $i++){
				if($dataPage21['El_parts'][$i]==''){
					$dataPage21['El_parts'][$i] = 0;
				}
			}

			for($i=1 ; $i<=10 ; $i++){
				$El_wall_t 		= $El_wall_t + $dataPage21['El_wall'][$i];
				$El_opening_t 	= $El_opening_t + $dataPage21['El_opening'][$i];
				$El_cw_t		= $El_cw_t + $dataPage21['El_cw'][$i];
				$El_storage_t 	= $El_storage_t + $dataPage21['El_storage'][$i];
				$El_blowout_t 	= $El_blowout_t + $dataPage21['El_blowout'][$i];
				$El_parts_t 	= $El_parts_t + $dataPage21['El_parts'][$i];
			}
			
			foreach($dataPage21 as $key => $val){
				$sUserDraftInput['data'][$key] = $val;
			}
			
			$sUserDraftInput['data']['El_wall_t'] = $El_wall_t;
			$sUserDraftInput['data']['El_opening_t'] = $El_opening_t;
			$sUserDraftInput['data']['El_cw_t'] = $El_cw_t;
			$sUserDraftInput['data']['El_storage_t'] = $El_storage_t;
			$sUserDraftInput['data']['El_blowout_t'] = $El_blowout_t;
			$sUserDraftInput['data']['El_parts_t'] = $El_parts_t;
			$sUserDraftInput['data']['El_ot_t'] = $El_ot_t;
						
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);

			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);
			if($next_page == 'out'){				
				$this->Statistics->set_input($sUserDraftInput);
				$this->Statistics->energy_input();
				$sUserDraftInput = $this->Statistics->get_output();
				$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
			}			
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));
			exit;
		}
	} /* End page21 */

	/**
	 * page22 
	 * process user draf input for page22.html	 
	 * @return void
	 */
	public function page22(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$EnergyInput = $sUserDraftInput['data'];				
			}
			$act = 0;
			$dataPage22 = $this->request->data['energy_input'];	
			$actPage = $this->request->data['act'];	
			switch ($actPage) {
				case 'act11':	$act = 1; break;
				case 'act21':	$act = 2; break;
				case 'act31':	$act = 3; break;
				case 'act41':	$act = 4; break;
				case 'act51':	$act = 5; break;
				case 'act61':	$act = 6; break;
				case 'act71':	$act = 7; break;
				case 'act81':	$act = 8; break;
				case 'act91':	$act = 9; break;
				case 'act101':	$act = 10; break;					
			}

			if($dataPage22['Iside'] == 1){ // IF (Iside .eq. 1) then
				$dataPage22['HCO'] = 11.721;
			}else if($dataPage22['Iside'] == 2){
				$dataPage22['HCO'] = 9.209;
			}else{
				$dataPage22['HCO'] = 6.279;
			}
			
			// !	計算処理	Hco	Iside からHcoを計算
			// !	Qr
			$dataPage22['Qr'] = ( pow(($dataPage22['Tw']+273.15),4) - pow(($dataPage22['Ta']+273.15),4) )*20.412E-8*$dataPage22['FCG1'];
			$tmpQc = ($dataPage22['Tw']-$dataPage22['Ta']);
			$tmpQc = abs($tmpQc);
			$Qc = $dataPage22['HCO'] * pow($tmpQc, 1.25);
			
			$dataPage22['Qc'] = (float)$Qc;

			$Tp = (isset($EnergyInput['Tp']))? $EnergyInput['Tp']:0;

			$El_wall = (($dataPage22['Qr'] + $dataPage22['Qc']) * $dataPage22['Ssurface'] * $Tp * $dataPage22['Mwall'])/3600;
			
			$dataPage22['El_wall'] = (float)$El_wall;

			foreach($dataPage22 as $key => $val){
				$EnergyInput['page22'][$key][$act] = $val;
			}

			$sUserDraftInput['data'] = $EnergyInput;
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);	
			
			echo (float)$El_wall;

		}else{
			$this->layout = 'energy_input_popup';
			
			$act = 0;
			if(isset($this->request->pass[0])){
				switch ($this->request->pass[0]) {
					case 1:	$act = 1; break;
					case 2:	$act = 2; break;
					case 3:	$act = 3; break;
					case 4:	$act = 4; break;
					case 5:	$act = 5; break;
					case 6:	$act = 6; break;
					case 7:	$act = 7; break;
					case 8:	$act = 8; break;
					case 9:	$act = 9; break;
					case 10: $act = 10; break;					
				}							
			}
			$this->set('act', $act);
		}		
	} /* End page22 */

	/**
	 * page23 
	 * process user draf input for page23.html	 
	 * @return void
	 */
	public function page23(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$EnergyInput = $sUserDraftInput['data'];				
			}
			
			$dataPage23 = $this->request->data['energy_input'];	
			$actPage = $this->request->data['act'];	
			switch ($actPage) {
				case 'act12':	$act = 1; break;
				case 'act22':	$act = 2; break;
				case 'act32':	$act = 3; break;
				case 'act42':	$act = 4; break;
				case 'act52':	$act = 5; break;
				case 'act62':	$act = 6; break;
				case 'act72':	$act = 7; break;
				case 'act82':	$act = 8; break;
				case 'act92':	$act = 9; break;
				case 'act102':	$act = 10; break;					
			}
			
			// !　tp	被加熱物１トンを処理するのに要する時間 [s]			Tp
			$Iopen = $dataPage23['Iopen'];
			$D = $dataPage23['D'];
			$Lwall = $dataPage23['Lwall'];
			$Tp = (isset($EnergyInput['Tp']))? $EnergyInput['Tp']:0;
			$Sopening = $dataPage23['Sopening'];
			$Mopen = $dataPage23['Mopen'];
			$Tz = $dataPage23['Tz'];
			$Ta = $dataPage23['Ta'];
			$Elopening = 0;
			// CALL QL_OPEN(Iopen,D,Lwall,TP,Sopening,TZ,TA,Elopening)
			$this->Subroutine->QL_OPEN($Iopen, $D, $Lwall, $Tp, $Sopening, $Tz,$Ta, $Elopening);
			$dataPage23['Iopen'] = $Iopen;
			$dataPage23['D'] = $D;
			$dataPage23['Lwall'] = $Lwall;
			$EnergyInput['Tp'] = $Tp;
			$dataPage23['Sopening'] = $Sopening;
			$dataPage23['Mopen'] = $Mopen;
			$dataPage23['Tz'] = $Tz;
			$dataPage23['Ta'] = $Ta;			
			$dataPage23['Elopening'] = $Elopening;	

			// !	計算処理	El_opening(i)
			$dataPage23['El_opening'] = $Elopening * $Mopen/3600.0;

			foreach($dataPage23 as $key => $val){
				$EnergyInput['page23'][$key][$act] = $val;
			}

			$sUserDraftInput['data'] = $EnergyInput;
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);	

			echo $dataPage23['El_opening'];
		}else{
			$this->layout = 'energy_input_popup';	
			
			$act = 0;
			if(isset($this->request->pass[0])){
				switch ($this->request->pass[0]) {
					case 1:	$act = 1; break;
					case 2:	$act = 2; break;
					case 3:	$act = 3; break;
					case 4:	$act = 4; break;
					case 5:	$act = 5; break;
					case 6:	$act = 6; break;
					case 7:	$act = 7; break;
					case 8:	$act = 8; break;
					case 9:	$act = 9; break;
					case 10: $act = 10; break;					
				}							
			}
			$this->set('act', $act);
		}
	} /* End page23 */

	/**
	 * page24 
	 * process user draf input for page24.html	 
	 * @return void
	 */
	public function page24(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$EnergyInput = $sUserDraftInput['data'];				
			}			

			$dataPage24 = $this->request->data['energy_input'];	
			$actPage = $this->request->data['act'];	
			switch ($actPage) {
				case 'act13':	$act = 1; break;
				case 'act23':	$act = 2; break;
				case 'act33':	$act = 3; break;
				case 'act43':	$act = 4; break;
				case 'act53':	$act = 5; break;
				case 'act63':	$act = 6; break;
				case 'act73':	$act = 7; break;
				case 'act83':	$act = 8; break;
				case 'act93':	$act = 9; break;
				case 'act103':	$act = 10; break;					
			}
			
			// !計算処理	El_CW(i)
			$dataPage24['El_cw'] = 4.186*$dataPage24['Vcw']*($dataPage24['Twater_out'] - $dataPage24['Twater_in'])*$dataPage24['Mcw'];

			foreach($dataPage24 as $key => $val){
				$EnergyInput['page24'][$key][$act] = $val;
			}

			$sUserDraftInput['data'] = $EnergyInput;
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);

			echo $dataPage24['El_cw'];
		}else{
			$this->layout = 'energy_input_popup';
			
			$act = 0;
			if(isset($this->request->pass[0])){
				switch ($this->request->pass[0]) {
					case 1:	$act = 1; break;
					case 2:	$act = 2; break;
					case 3:	$act = 3; break;
					case 4:	$act = 4; break;
					case 5:	$act = 5; break;
					case 6:	$act = 6; break;
					case 7:	$act = 7; break;
					case 8:	$act = 8; break;
					case 9:	$act = 9; break;
					case 10: $act = 10; break;					
				}								
			}
			$this->set('act', $act);
		}
	} /* End page24 */

	/**
	 * page25
	 * process user draf input for page25.html	 
	 * @return void
	 */
	public function page25(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$EnergyInput = $sUserDraftInput['data'];				
			}			

			$dataPage25 = $this->request->data['energy_input'];	
			
			$actPage = $this->request->data['act'];	
			switch ($actPage) {
				case 'act14':	$act = 1; break;
				case 'act24':	$act = 2; break;
				case 'act34':	$act = 3; break;
				case 'act44':	$act = 4; break;
				case 'act54':	$act = 5; break;
				case 'act64':	$act = 6; break;
				case 'act74':	$act = 7; break;
				case 'act84':	$act = 8; break;
				case 'act94':	$act = 9; break;
				case 'act104':	$act = 10; break;					
			}
			
			// !　計算処理	Hwall
			$Iwall[1] = ($dataPage25['Iwall_m1']!='')? $dataPage25['Iwall_m1']:0;
			$Iwall[2] = ($dataPage25['Iwall_m2']!='')? $dataPage25['Iwall_m2']:0;
			$Iwall[3] = ($dataPage25['Iwall_m3']!='')? $dataPage25['Iwall_m3']:0;
			$Iwall[4] = ($dataPage25['Iwall_m4']!='')? $dataPage25['Iwall_m4']:0;

			// Call Lw4(Tz,TA,Lw1,Lw2,Lw3,Lw4,Iwall,Hwall)			
			$Tz = ($dataPage25['Tz']!='')? $dataPage25['Tz']: 0;
			$Ta = ($dataPage25['Ta']!='')? $dataPage25['Ta']: 0;
			$Lw1 = ($dataPage25['Lw1']!='')? $dataPage25['Lw1']: 0;
			$Lw2 = ($dataPage25['Lw2']!='')? $dataPage25['Lw2']: 0;
			$Lw3 = ($dataPage25['Lw3']!='')? $dataPage25['Lw3']: 0;
			$Lw4 = ($dataPage25['Lw4']!='')? $dataPage25['Lw4']: 0;
			$Hwall = 0;
			$this->Subroutine->CHIKUNETU($Tz, $Ta, $Lw1, $Lw2, $Lw3, $Lw4, $Iwall, $Hwall);
			$dataPage25['Tz'] = $Tz;
			$dataPage25['Ta'] = $Ta;
			$dataPage25['Lw1'] = $Lw1;
			$dataPage25['Lw2'] = $Lw2;
			$dataPage25['Lw3'] = $Lw3;
			$dataPage25['Lw4'] = $Lw4;
			$dataPage25['Hwall'] = $Hwall;
			$dataPage25['Iwall'] = $Iwall;
			// !　El_storage
			// El_storage(i)=Hwall/3*Mst*Sa/TPC
			
			$dataPage25['El_storage'] = 0;
			if (0 != $EnergyInput['TPC']) {
				$dataPage25['El_storage'] = (($dataPage25['Hwall']/3) * $dataPage25['Mst'] * $dataPage25['Sa'])/$EnergyInput['TPC'];
			}
			foreach($dataPage25 as $key => $val){
				$EnergyInput['page25'][$key][$act] = $val;
			}

			$sUserDraftInput['data'] = $EnergyInput;
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);	

			echo $dataPage25['El_storage'];
		}else{
			$this->layout = 'energy_input_popup';	
			
			$act = 0;
			if(isset($this->request->pass[0])){
				switch ($this->request->pass[0]) {
					case 1:	$act = 1; break;
					case 2:	$act = 2; break;
					case 3:	$act = 3; break;
					case 4:	$act = 4; break;
					case 5:	$act = 5; break;
					case 6:	$act = 6; break;
					case 7:	$act = 7; break;
					case 8:	$act = 8; break;
					case 9:	$act = 9; break;
					case 10: $act = 10; break;					
				}							
			}
			$this->set('act', $act);
		}
	} /* End page25 */

	/**
	 * page26
	 * process user draf input for page26.html	 
	 * @return void
	 */
	public function page26(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		$act = 0;
		
		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$EnergyInput = $sUserDraftInput['data'];				
			}			

			$dataPage26 = $this->request->data['energy_input'];	
			$actPage = $this->request->data['act'];	
			switch ($actPage) {
				case 'act1':	$act = 1; break;
				case 'act2':	$act = 2; break;
				case 'act3':	$act = 3; break;
				case 'act4':	$act = 4; break;				
			}			

			foreach($dataPage26 as $key => $val){
				$EnergyInput['page26'][$key][$act] = $val;
			}

			$sUserDraftInput['data'] = $EnergyInput;
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);	
		}else{
			$this->layout = 'energy_input_popup';
			
			$this->loadModel('MstData');
			$TAIKA = $this->MstData->getAllData('TAIKA');
			$this->set('TAIKA', $TAIKA);
			$act = 0;
			if(isset($this->request->pass[0])){
				switch ($this->request->pass[0]) {
					case 1:	$act = 1; break;
					case 2:	$act = 2; break;
					case 3:	$act = 3; break;
					case 4:	$act = 4; break;				
				}						
			}
			$this->set('act', $act);
		}
		$this->set('act', $act);
	} /* End page26 */

	/**
	 * page27
	 * process user draf input for page27.html	 
	 * @return void
	 */
	public function page27(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$EnergyInput = $sUserDraftInput['data'];				
			}			

			$dataPage27 = $this->request->data['energy_input'];	
			$actPage = $this->request->data['act'];	
			switch ($actPage) {
				case 'act15':	$act = 1; break;
				case 'act25':	$act = 2; break;
				case 'act35':	$act = 3; break;
				case 'act45':	$act = 4; break;
				case 'act55':	$act = 5; break;
				case 'act65':	$act = 6; break;
				case 'act75':	$act = 7; break;
				case 'act85':	$act = 8; break;
				case 'act95':	$act = 9; break;
				case 'act105':	$act = 10; break;					
			}
			
			// !　Aop	係数：サブルーチンで計算
			// Call HOUEN(Lw,De,Aop)
			$Lw = $dataPage27['Lw']; 
			$De = $dataPage27['De'];
			$Aop = 0; 
			$this->Subroutine->HOUEN($Lw, $De, $Aop);
			$dataPage27['Lw'] = $Lw; 
			$dataPage27['De'] = $De;
			$dataPage27['Aop'] = $Aop; 

			// !　Vgf
			// Vgf=4467*(273.15/(Tgf+273.15)*DP0)**0.5*Aop*Sbl
			$dataPage27['Vgf'] = 0;
			if(($dataPage27['Tgf'] + 273.15)!=0){
				$dataPage27['Vgf'] = 4467 * pow((273.15/($dataPage27['Tgf'] + 273.15))*$dataPage27['DP0'], 0.5) * $dataPage27['Aop'] * $dataPage27['Sbl'];
			}
			// !CPXｆ	Tgf及び燃焼ガス組成から比熱計算		
			for($i=1 ; $i<=20 ; $i++){
				$XX[$i] = 0;
			}

			$XX[2] = (isset($EnergyInput['PN2']))? $EnergyInput['PN2']: 0; //!N2
			$XX[4] = (isset($EnergyInput['PO2']))? $EnergyInput['PO2']: 0; //!O2
			$XX[6] = (isset($EnergyInput['PH2O']))? $EnergyInput['PH2O']: 0; //!H2O
			$XX[8] = (isset($EnergyInput['PCO2']))? $EnergyInput['PCO2']: 0; //!CO2
			// !XX(2):N2
			// !XX(4):O2
			// !XX(6):H2O
			// !XX(8):CO2
			// !XX(9):SO2
			// !XX(10):Air
			// print *,"PN2,PO2,PH2O,PCO2=", PN2,PO2,PH2O,PCO2

			// Call GASSH(XX,Tgf,CPXf)
			$Tgf = $dataPage27['Tgf'];
			$CPXf = 0;
			$this->Subroutine->GASSH($XX, $Tgf, $CPXf);
			$dataPage27['XX'] = $XX;
			$dataPage27['Tgf'] = $Tgf;
			$dataPage27['CPXf'] = $CPXf;

			// !　Ifile　不要
			// !　El_blowout(i)
			// El_blowout(i)=Vgf*CPXf*Tgf*Mbl
			$dataPage27['El_blowout'] = $dataPage27['Vgf'] * $dataPage27['CPXf'] *$dataPage27['Tgf'] * $dataPage27['Mbl'];

			foreach($dataPage27 as $key => $val){
				$EnergyInput['page27'][$key][$act] = $val;
			}

			$sUserDraftInput['data'] = $EnergyInput;
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);

			echo $dataPage27['El_blowout'];
		}else{
			$this->layout = 'energy_input_popup';
			
			$act = 0;
			if(isset($this->request->pass[0])){
				switch ($this->request->pass[0]) {
					case 1:	$act = 1; break;
					case 2:	$act = 2; break;
					case 3:	$act = 3; break;
					case 4:	$act = 4; break;
					case 5:	$act = 5; break;
					case 6:	$act = 6; break;
					case 7:	$act = 7; break;
					case 8:	$act = 8; break;
					case 9:	$act = 9; break;
					case 10: $act = 10; break;					
				}							
			}
			$this->set('act', $act);
		}
	} /* End page27 */

	/**
	 * page28
	 * process user draf input for page28.html	 
	 * @return void
	 */
	public function page28(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$EnergyInput = $sUserDraftInput['data'];				
			}			

			$dataPage28 = $this->request->data['energy_input'];	
			$actPage = $this->request->data['act'];	
			switch ($actPage) {
				case 'act16':	$act = 1; break;
				case 'act26':	$act = 2; break;
				case 'act36':	$act = 3; break;
				case 'act46':	$act = 4; break;
				case 'act56':	$act = 5; break;
				case 'act66':	$act = 6; break;
				case 'act76':	$act = 7; break;
				case 'act86':	$act = 8; break;
				case 'act96':	$act = 9; break;
				case 'act106':	$act = 10; break;					
			}
			// !　計算処理	El_parts(i)
			// El_parts(i)=0.8*Kparts/Lw*Sparts*(Tz-Ta)*tp*Np*Mpa
			$EnergyInput['Tp'] = (isset($EnergyInput['Tp']))?$EnergyInput['Tp'] : 0;

			$dataPage28['El_parts'] = 0;
			if($dataPage28['Lw'] !=0 ){
				$dataPage28['El_parts'] = 0.8*($dataPage28['Kparts']/$dataPage28['Lw'])*$dataPage28['Sparts']*($dataPage28['Tz'] - $dataPage28['Ta']) * $EnergyInput['Tp'] * $dataPage28['Np'] * $dataPage28['Mpa'];
			}

			foreach($dataPage28 as $key => $val){
				$EnergyInput['page28'][$key][$act] = $val;
			}

			$sUserDraftInput['data'] = $EnergyInput;
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);

			echo $dataPage28['El_parts'];
		}else{
			$this->layout = 'energy_input_popup';			
			
			$act = 0;
			if(isset($this->request->pass[0])){
				switch ($this->request->pass[0]) {
					case 1:	$act = 1; break;
					case 2:	$act = 2; break;
					case 3:	$act = 3; break;
					case 4:	$act = 4; break;
					case 5:	$act = 5; break;
					case 6:	$act = 6; break;
					case 7:	$act = 7; break;
					case 8:	$act = 8; break;
					case 9:	$act = 9; break;
					case 10: $act = 10; break;					
				}							
			}
			$this->set('act', $act);
		}
	} /* End page28 */


	/**
	 * page31
	 * process user draf input for page31.html	 
	 * @return void
	 */
	public function page31(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		$this->loadModel('MstData');
		$HADDEN_KORITSU = $this->MstData->getAllData('HADDEN_KORITSU');
		$this->set('HADDEN_KORITSU', $HADDEN_KORITSU);
		
		if($this->request->is('post')){			
			$dataPage31 = $this->request->data['energy_input'];
			
			$Etae_C = $dataPage31['Etae_C'];

			if($Etae_C == 1){
				$Etae = $dataPage31['Etae'];
			}else{
				$Etae = $HADDEN_KORITSU[$dataPage31['Etae_C']][1];
			}
			
			$sUserDraftInput['data']['Etae_C'] = $Etae_C;			
			$sUserDraftInput['data']['Etae'] = $Etae;			
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);						
			
			$this->redirect(array('controller' => 'energy_input', 'action' => 'page32'));			
		}
	} /* End page31 */


	/**
	 * page32
	 * process user draf input for page32.html	 
	 * @return void
	 */
	public function page32(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		if($this->request->is('post')){			
			$dataPage32 = $this->request->data['energy_input'];
			
			// Eh_el=Eh_el_accept
			$dataPage32['Eh_el'] = $dataPage32['Eh_el_accept'];

			// Eta_e_loss=Eta_e_loss/100.
			$dataPage32['Eta_e_loss'] = $dataPage32['Eta_e_loss']/100.0;

			// El_t=El_fre+El_coil+El_trans+El_terminal+El_con+El_wir+El_cl;
			$dataPage32['El_t'] = $dataPage32['El_fre'] + $dataPage32['El_coil'] + $dataPage32['El_trans'] + $dataPage32['El_terminal'] + $dataPage32['El_con'] + $dataPage32['El_wir'] + $dataPage32['El_cl'];

			$dataPage32['Eaux_blower_t'] = 0;
			$dataPage32['Eaux_comp_t'] = 0;
			$dataPage32['Eaux_pump_t'] = 0;

			for($i=1 ; $i<=10 ; $i++){
				if($dataPage32['Eaux_blower'][$i] == ''){
					$dataPage32['Eaux_blower'][$i] = 0;
				}
			}

			for($i=1 ; $i<=10 ; $i++){
				if($dataPage32['Eaux_compressor'][$i] == ''){
					$dataPage32['Eaux_compressor'][$i] = 0;
				}
			}

			for($i=1 ; $i<=10 ; $i++){
				if($dataPage32['Eaux_pump'][$i] == ''){
					$dataPage32['Eaux_pump'][$i] = 0;
				}
			}

			for($i=1 ; $i<=10 ; $i++){
				$dataPage32['Eaux_blower_t'] = $dataPage32['Eaux_blower_t'] + $dataPage32['Eaux_blower'][$i];
				$dataPage32['Eaux_comp_t'] = $dataPage32['Eaux_comp_t'] + $dataPage32['Eaux_compressor'][$i];
				$dataPage32['Eaux_pump_t'] = $dataPage32['Eaux_pump_t'] + $dataPage32['Eaux_pump'][$i];
			}

			foreach($dataPage32 as $key => $val){
				$sUserDraftInput['data'][$key] = $val;
			}
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);						
			
			$this->redirect(array('controller' => 'energy_input', 'action' => 'page41'));
		}
	} /* End page32 */

	/**
	 * page33
	 * process user draf input for page33.html	 
	 * @return void
	 */
	public function page33(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$EnergyInput = $sUserDraftInput['data'];				
			}			

			$dataPage33 = $this->request->data['energy_input'];	
			$actPage = $this->request->data['act'];	
			switch ($actPage) {
				case 'act11':	$act = 1; break;
				case 'act21':	$act = 2; break;
				case 'act31':	$act = 3; break;
				case 'act41':	$act = 4; break;
				case 'act51':	$act = 5; break;
				case 'act61':	$act = 6; break;
				case 'act71':	$act = 7; break;
				case 'act81':	$act = 8; break;
				case 'act91':	$act = 9; break;
				case 'act101':	$act = 10; break;					
			}
			// ! 7	計算処理	Eaux_blower(i)	iは最大10個					
			$dataPage33['Qb'] = 0;
			if($dataPage33['Etasb'] !=0){
				$dataPage33['Qb'] = (($dataPage33['Ph'] * $dataPage33['Rf'])/60) * ((1 + $dataPage33['Amb']/100)/($dataPage33['Etasb']/100));
			}

			$EnergyInput['Tp'] = (isset($EnergyInput['Tp']))?$EnergyInput['Tp'] : 0;

			$dataPage33['Eaux_blower'] = ($dataPage33['Qb'] * ($dataPage33['Abl']/100.0)) * $EnergyInput['Tp'] * $dataPage33['Mbl'];

			foreach($dataPage33 as $key => $val){
				$EnergyInput['page33'][$key][$act] = $val;
			}

			$sUserDraftInput['data'] = $EnergyInput;
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);

			echo $dataPage33['Eaux_blower'];
		}else{
			$this->layout = 'energy_input_popup';			
			
			$act = 0;
			if(isset($this->request->pass[0])){
				switch ($this->request->pass[0]) {
					case 1:	$act = 1; break;
					case 2:	$act = 2; break;
					case 3:	$act = 3; break;
					case 4:	$act = 4; break;
					case 5:	$act = 5; break;
					case 6:	$act = 6; break;
					case 7:	$act = 7; break;
					case 8:	$act = 8; break;
					case 9:	$act = 9; break;
					case 10: $act = 10; break;					
				}							
			}
			$this->set('act', $act);
		}
	} /* End page33 */

	/**
	 * page34
	 * process user draf input for page34.html	 
	 * @return void
	 */
	public function page34(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$EnergyInput = $sUserDraftInput['data'];				
			}			

			$dataPage34 = $this->request->data['energy_input'];	
			$actPage = $this->request->data['act'];	
			switch ($actPage) {
				case 'act12':	$act = 1; break;
				case 'act22':	$act = 2; break;
				case 'act32':	$act = 3; break;
				case 'act42':	$act = 4; break;
				case 'act52':	$act = 5; break;
				case 'act62':	$act = 6; break;
				case 'act72':	$act = 7; break;
				case 'act82':	$act = 8; break;
				case 'act92':	$act = 9; break;
				case 'act102':	$act = 10; break;					
			}
			// !計算処理	Eaux_compressor(i)	iは最大10個													
			
			if($dataPage34['Q45'] == 1) $dataPage34['Amc'] = 1.1; // if(q45.eq.1) Amc=1.1					
			if($dataPage34['Q45'] == 2) $dataPage34['Amc'] = 1.15; // if(q45.eq.2) Amc=1.15
			if($dataPage34['Q45'] == 3) $dataPage34['Amc'] = 1.1; // if(q45.eq.3) Amc=1.1					
			if($dataPage34['Q45'] == 4) $dataPage34['Amc'] = 1.2; // if(q45.eq.4) Amc=1.2
			
			// KK=(k-1)/k	
			$dataPage34['KK'] = 0;
			if($dataPage34['K'] !=0){
				$dataPage34['KK'] = ($dataPage34['K'] - 1)/$dataPage34['K'];			
			}

			// Lth=Ps*Rf/0.06*((Pd/Ps)**KK-1)/kk;
			$dataPage34['Lth'] = 0;
			if($dataPage34['Ps']!=0 && $dataPage34['KK']!=0){
				$dataPage34['Lth'] = ($dataPage34['Ps']*$dataPage34['Rf']/0.06) * ((pow($dataPage34['Pd']/$dataPage34['Ps'], $dataPage34['KK']) - 1)/$dataPage34['KK']);
			}
			// Qc=Lth*Amc/((Etac/100.)*(Etat/100.))	;
			$dataPage34['Qc'] = 0;
			if($dataPage34['Etac']!=0 && $dataPage34['Etat']!=0){
				$dataPage34['Qc'] = $dataPage34['Lth']*$dataPage34['Amc']/(($dataPage34['Etac']/100.0)*($dataPage34['Etat']/100.0));
			}
			// Eaux_compressor(i)=Qc*Aco/100*Tp*Mco;
			$EnergyInput['Tp'] = (isset($EnergyInput['Tp']))?$EnergyInput['Tp'] : 0;

			$dataPage34['Eaux_compressor'] = ($dataPage34['Qc'] * $dataPage34['Aco']/100) * $EnergyInput['Tp'] * $dataPage34['Mco'];
			
			foreach($dataPage34 as $key => $val){
				$EnergyInput['page34'][$key][$act] = $val;
			}

			$sUserDraftInput['data'] = $EnergyInput;
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);	

			echo $dataPage34['Eaux_compressor'];
		}else{
			$this->layout = 'energy_input_popup';			
			
			$act = 0;
			if(isset($this->request->pass[0])){
				switch ($this->request->pass[0]) {
					case 1:	$act = 1; break;
					case 2:	$act = 2; break;
					case 3:	$act = 3; break;
					case 4:	$act = 4; break;
					case 5:	$act = 5; break;
					case 6:	$act = 6; break;
					case 7:	$act = 7; break;
					case 8:	$act = 8; break;
					case 9:	$act = 9; break;
					case 10: $act = 10; break;					
				}							
			}
			$this->set('act', $act);
		}
	} /* End page34 */	

	/**
	 * page35
	 * process user draf input for page35.html	 
	 * @return void
	 */
	public function page35(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$EnergyInput = $sUserDraftInput['data'];				
			}			

			$dataPage35 = $this->request->data['energy_input'];	
			$actPage = $this->request->data['act'];	
			switch ($actPage) {
				case 'act13':	$act = 1; break;
				case 'act23':	$act = 2; break;
				case 'act33':	$act = 3; break;
				case 'act43':	$act = 4; break;
				case 'act53':	$act = 5; break;
				case 'act63':	$act = 6; break;
				case 'act73':	$act = 7; break;
				case 'act83':	$act = 8; break;
				case 'act93':	$act = 9; break;
				case 'act103':	$act = 10; break;					
			}

			$dataPage35['Amp'] = $dataPage35['Amp']/100;
			$dataPage35['Etasp'] = $dataPage35['Etasp']/100.0;
			
			// ! 　　10	計算処理	Eaux_pump(i)	iは最大10個					
			$dataPage35['Hd'] = 0;
			if($dataPage35['Rouf']!=0){
				$dataPage35['Hd'] = $dataPage35['Z'] + ($dataPage35['Ph']/9.8)/$dataPage35['Rouf'] + pow($dataPage35['U'],2)/19.6;
			}

			$dataPage35['Qp'] = 0;
			if($dataPage35['Etasp']!=0)	{
				$dataPage35['Qp'] = ($dataPage35['Rouf'] * $dataPage35['Rf'] * $dataPage35['Hd']/6.12) * ((1 + $dataPage35['Amp'])/$dataPage35['Etasp']);
			}

			$EnergyInput['Tp'] = (isset($EnergyInput['Tp']))?$EnergyInput['Tp'] : 0;
			$dataPage35['Eaux_pump'] = (($dataPage35['Qp'] * $dataPage35['Apu'])/100) * $EnergyInput['Tp'] * $dataPage35['Mpu'];
			
			foreach($dataPage35 as $key => $val){
				$EnergyInput['page35'][$key][$act] = $val;
			}

			$sUserDraftInput['data'] = $EnergyInput;
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);	

			echo $dataPage35['Eaux_pump'];
		}else{
			$this->layout = 'energy_input_popup';			
			
			$act = 0;
			if(isset($this->request->pass[0])){
				switch ($this->request->pass[0]) {
					case 1:	$act = 1; break;
					case 2:	$act = 2; break;
					case 3:	$act = 3; break;
					case 4:	$act = 4; break;
					case 5:	$act = 5; break;
					case 6:	$act = 6; break;
					case 7:	$act = 7; break;
					case 8:	$act = 8; break;
					case 9:	$act = 9; break;
					case 10: $act = 10; break;					
				}						
			}
			$this->set('act', $act);
		}
	} /* End page35 */


	/**
	 * page37
	 * process user draf input for page37.html	 
	 * @return void
	 */
	public function page37(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$EnergyInput = $sUserDraftInput['data'];				
			}			

			$dataPage37 = $this->request->data['energy_input'];	
			
			$dataPage37['Etam'] = $dataPage37['Etam']/100;
			
			$dataPage37['Tw'] = $dataPage37['Tw']/100;

			// !	計算処理
			// TR1=(WL+Wj)*Fr
			$dataPage37['TR1'] = ($dataPage37['WL'] + $dataPage37['WJ'])*$dataPage37['fr'];

			// TR2=(WL+WJ+WR)*ms*Rb;print *, "TR2=",Tr2
			$dataPage37['TR2'] = ($dataPage37['WL'] + $dataPage37['WJ'] + $dataPage37['WR'])*$dataPage37['ms']*$dataPage37['Rb'];
			
			// Rr=V/(3.1415*Dr) ;print *, "Rr=",Rr
			$dataPage37['Rr'] = 0;
			if($dataPage37['Dr']!=0){
				$dataPage37['Rr'] = $dataPage37['V']/(3.1415 * $dataPage37['Dr']) ;
			}
			// Ta=1+5E-4*NKAI
			$dataPage37['Ta'] = 1+5E-4 * $dataPage37['NKAI'];
			// Pa=9.8*(TR1+TR2)*2.0*3.141516*Rr/60.*(1.0/Etam)/1000.  ;print *, "Pa=",Pa

			$dataPage37['Pa'] = 0;
			if($dataPage37['Etam']!=0){
				$dataPage37['Pa'] = ((9.8*($dataPage37['TR1'] + $dataPage37['TR2'])*2.0*3.141516*$dataPage37['Rr']/60) * (1.0/$dataPage37['Etam']))/1000;
			}
			// Pc=Pa*Tw*Ta	;print *, "Pc=",Pc												
			$dataPage37['Pc'] = $dataPage37['Pa'] * $dataPage37['Tw'] * $dataPage37['Ta']	;

			// !Eaux_power	
			// Eaux_power(j)=Tp*Pc*HoseiR ;print *, "Eaux_power(i)=",Eaux_power(J)
			$EnergyInput['Tp'] = (isset($EnergyInput['Tp']))?$EnergyInput['Tp'] : 0;
			$dataPage37['Eaux_power'] = $EnergyInput['Tp'] * $dataPage37['Pc'] * $dataPage37['HoseiR'] ;

			foreach($dataPage37 as $key => $val){
				$EnergyInput['page37'][$key] = $val;
			}

			$sUserDraftInput['data'] = $EnergyInput;
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);	

			echo $dataPage37['Eaux_power'];
		}else{
			$this->layout = 'energy_input_popup';
		}
	} /* End page37 */	

	/**
	 * page38
	 * process user draf input for page38.html	 
	 * @return void
	 */
	public function page38(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$EnergyInput = $sUserDraftInput['data'];				
			}			

			$dataPage38 = $this->request->data['energy_input'];	
			// EnergyInputEtam=Etam/100.;
			$dataPage38['Etam'] = $dataPage38['Etam']/100.0;

			// Tw=Tw/100.;
			$dataPage38['Tw'] = $dataPage38['Tw']/100.0;

			// !　計算処理 
			// TR1=(WL+WJ+Wcar)*Fr ;
			$dataPage38['TR1'] = ($dataPage38['WL'] + $dataPage38['WJ'] + $dataPage38['Wcar']) * $dataPage38['fr'] ;

			// TR2=(WL+WJ+Wcar)*ms*Rb ;
			$dataPage38['TR2'] = ($dataPage38['WL'] + $dataPage38['WJ'] + $dataPage38['Wcar'])*$dataPage38['ms']*$dataPage38['Rb'];

			// Rr=V/(3.1415*Dr) ;
			$dataPage38['Rr'] = 0;
			if($dataPage38['Dr']!=0){
				$dataPage38['Rr'] = $dataPage38['V']/(3.1415 * $dataPage38['Dr']);
			}
			// Ta=1+5E-4*NKAI ;
			$dataPage38['Ta'] = 1+5E-4 * $dataPage38['NKAI'];

			// Pa=9.8*(TR1+TR2)*2.0*3.141516*Rr/60.*(1.0/Etam)/1000. ;
			$dataPage38['Pa'] = 0;
			if($dataPage38['Etam']!=0){
				$dataPage38['Pa'] = ((9.8*($dataPage38['TR1'] + $dataPage38['TR2'])*2.0*3.141516*$dataPage38['Rr']/60.0)*(1.0/$dataPage38['Etam']))/1000 ;
			}
			// Pc=Pa*Tw*Ta;
			$dataPage38['Pc'] = $dataPage38['Pa'] * $dataPage38['Tw'] * $dataPage38['Ta'];

			// !Pa=(TR1+TR2)*Rr/980.*(1.0/Etam)*Tw*Ta
			// !Ｐａ=(　ＴＲ１+ＴＲ２)*　Ｒｒ /980* (1/Etam) * Tw **Ta
			// !　Eaux_power
			// Eaux_power = Tp * Pc * Hoseih;
			$EnergyInput['Tp'] = (isset($EnergyInput['Tp']))?$EnergyInput['Tp'] : 0;
			$dataPage38['Eaux_power'] = $EnergyInput['Tp'] * $dataPage38['Pc'] * $dataPage38['Hoseih'];
			
			foreach($dataPage38 as $key => $val){
				$EnergyInput['page38'][$key] = $val;
			}

			$sUserDraftInput['data'] = $EnergyInput;
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);	

			echo $dataPage38['Eaux_power'];
		}else{
			$this->layout = 'energy_input_popup';			
		}
	} /* End page38 */	

	/**
	 * page39
	 * process user draf input for page39.html	 
	 * @return void
	 */
	public function page39(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$EnergyInput = $sUserDraftInput['data'];				
			}			

			$dataPage39 = $this->request->data['energy_input'];	
			
			// Etam=Etam/100.
			$dataPage39['Etam'] = $dataPage39['Etam']/100.0;

			// Tw=Tw/100.
			$dataPage39['Tw'] = $dataPage39['Tw']/100.0;

			// !	計算処理
			// Wu=WL*(Mw*Ld) ;print *, "Wu=",Wu
			$dataPage39['Wu'] = $dataPage39['WL'] * ($dataPage39['Mw'] * $dataPage39['Ld']);

			// Wuj=Wj*(Mw*Ld) ;print *, "Wuj=",Wuj
			$dataPage39['Wuj'] = $dataPage39['Wj'] * ($dataPage39['Mw'] * $dataPage39['Ld']);

			// Wb=Wm*Mw*(Ld*2.0+3.141516*Dr) ;print *, "Wb=",Wb
			$dataPage39['Wb'] = $dataPage39['Wm'] * $dataPage39['Mw'] * ($dataPage39['Ld']*2.0 + 3.141516*$dataPage39['Dr']);

			// TR1=(Wu+WuJ+Wb+Wc )*md*Dr/2.0 ;print *, "TR1=",TR1
			$dataPage39['TR1'] = ($dataPage39['Wu'] + $dataPage39['Wuj'] + $dataPage39['Wb'] + $dataPage39['Wc'] ) * $dataPage39['md'] * $dataPage39['Dr']/2.0;

			// TR2=(Wu+WuJ+Wb+Wc +WR*2.0 )*ms*Rb ;print *, "TR2=",TR2
			$dataPage39['TR2'] = ($dataPage39['Wu'] + $dataPage39['Wuj'] + $dataPage39['Wb'] + $dataPage39['Wc'] + $dataPage39['WR']*2.0) * $dataPage39['ms'] * $dataPage39['Rb'];

			// TR3=0
			$dataPage39['TR3'] = 0;

			// Ta=1+5E-4*NKAI
			$dataPage39['Ta'] = 1+5E-4 * $dataPage39['NKAI'];

			// Pa=9.8*(TR1+TR2+TR3)/(Dr/2.0)*V/60.*(1.0/Etam)/1000.  ;print *, "Pa=",Pa
			$dataPage39['Pa'] = 0;
			if($dataPage39['Dr']!=0 && $dataPage39['Etam']){
				$dataPage39['Pa'] = ((((9.8 * ($dataPage39['TR1'] + $dataPage39['TR2'] + $dataPage39['TR3']))/($dataPage39['Dr']/2.0))*$dataPage39['V']/60.0)*(1.0/$dataPage39['Etam']))/1000;
			}
			// Pc=Pa*Tw*Ta	 ;print *, "Pc=",Pc
			$dataPage39['Pc'] = $dataPage39['Pa'] * $dataPage39['Tw'] * $dataPage39['Ta'];

			// Eaux_power(j)=Tp*Pc*Hoseim;print *, "Eaux_power(i)=",Eaux_power(J)
			$EnergyInput['Tp'] = (isset($EnergyInput['Tp']))?$EnergyInput['Tp'] : 0;
			$dataPage39['Eaux_power'] = $EnergyInput['Tp'] * $dataPage39['Pc'] * $dataPage39['Hoseim'];

			foreach($dataPage39 as $key => $val){
				$EnergyInput['page39'][$key] = $val;
			}

			$sUserDraftInput['data'] = $EnergyInput;
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);	

			echo $dataPage39['Eaux_power'];
		}else{
			$this->layout = 'energy_input_popup';			
		}
	} /* End page39 */	

	/**
	 * page40
	 * process user draf input for page40.html	 
	 * @return void
	 */
	public function page40(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$EnergyInput = $sUserDraftInput['data'];				
			}			

			$dataPage40 = $this->request->data['energy_input'];	
			
			// Dr1=2.0*Rr1
			$dataPage40['Dr1'] = 2.0 * $dataPage40['Rr1'];

			// Dr2=2.0*Rr2
			$dataPage40['Dr2'] = 2.0 * $dataPage40['Rr2'];

			// Etam=Etam/100.
			$dataPage40['Etam'] = $dataPage40['Etam']/100.0;

			// TW=TW/100
			$dataPage40['Tw'] = $dataPage40['Tw']/100.0;

			// AA=AAA*3.141516/180.
			$dataPage40['AA'] = $dataPage40['AAA']*3.141516/180.0;

			// Vu=H/(t1-1);	print *, "Vu=",Vu
			$dataPage40['Vu'] = 0;
			if(($dataPage40['t1']-1)!=0){
				$dataPage40['Vu'] = $dataPage40['h'] /($dataPage40['t1']-1);
			}
			// Fa=(WL+2.0*Wcu+2.0*Wcl)*Vu/( 1000* ta*2) ;print *, "Fa=",Fa
			if($dataPage40['ta']!=0){
				$dataPage40['Fa'] =($dataPage40['WL'] + 2.0*$dataPage40['Wcu'] + 2.0*$dataPage40['Wcl'])*$dataPage40['Vu']/( 1000 * $dataPage40['ta'] * 2);
			}
			// Fg=(9.8/1000)*Lr*sin(AA) *((Wcu+Wcl) +(WL+Wcu+Wcl))/2.;print *, "Fg=",Fg
			$dataPage40['Fg'] = (9.8/1000)*$dataPage40['Lr']*sin($dataPage40['AA']) *(($dataPage40['Wcu'] + $dataPage40['Wcl']) + ($dataPage40['WL'] + $dataPage40['Wcu'] + $dataPage40['Wcl']))/2;

			// Ff=(9.8/1000)*(ms*Rb2 +fr *cos(AA))*((WL+2*Wcu+2*Wcl)/(2*Rr2));print *, "Ff=",Ff
			$dataPage40['Ff'] = (9.8/1000)*($dataPage40['ms'] * $dataPage40['Rb2'] + $dataPage40['fr']*cos($dataPage40['AA']))*(($dataPage40['WL'] + 2*$dataPage40['Wcu'] + 2*$dataPage40['Wcl'])/(2*$dataPage40['Rr2']));

			// !Vu =LH/(t1-1) ;print *, "Vu=",Vu			

			// Pu =(Fa +Fg +Ff) * Vu/Etam	;print *, "Pu=",Pu
			$dataPage40['Pu'] = 0;
			if($dataPage40['Etam']!=0){
				$dataPage40['Pu'] = ($dataPage40['Fa'] + $dataPage40['Fg'] + $dataPage40['Ff']) * $dataPage40['Vu']/$dataPage40['Etam'];
			}
			// Vd=	H/(t3-1)  ;print *, "Vd=",Vd
			$dataPage40['Vd'] =	0;
			if(($dataPage40['t3']-1)!=0){
				$dataPage40['Vd'] =	$dataPage40['h']/($dataPage40['t3']-1);
			}
			// Fa =(2.0*Wcu+2.0*Wcl +WL) *Vd / ( 1000* ta*2)	 ;print *, "Fa=",Fa
			$dataPage40['Fa'] = 0;
			if($dataPage40['ta']!=0){
				$dataPage40['Fa'] = (2.0*$dataPage40['Wcu'] + 2.0*$dataPage40['Wcl'] + $dataPage40['WL']) * $dataPage40['Vd'] / (1000 * $dataPage40['ta'] * 2);
			}
			// Fg=(9.8/1000)*Lr*sin(AA) *((Wcu+Wcl) +(WL+Wcu+Wcl))/2.;print *, "Fg=",Fg
			$dataPage40['Fg'] = (9.8/1000)*$dataPage40['Lr']*sin($dataPage40['AA']) * (($dataPage40['Wcu'] + $dataPage40['Wcl']) + ($dataPage40['WL'] + $dataPage40['Wcu'] + $dataPage40['Wcl']))/2;
			
			// Ff=(9.8/1000)*(ms*Rb2 +fr *cos(AA))*((WL+2*Wcu+2*Wcl)/(2*Rr2));print *, "Ff=",Ff
			$dataPage40['Ff'] = 0;
			if($dataPage40['Rr2']!=0){
				$dataPage40['Ff'] = (9.8/1000)*($dataPage40['ms']*$dataPage40['Rb2'] + $dataPage40['fr']*cos($dataPage40['AA']))*(($dataPage40['WL'] + 2*$dataPage40['Wcu'] + 2*$dataPage40['Wcl'])/(2 * $dataPage40['Rr2']));
			}
			// Pd=	(Fa+Ff-Fg) * Vd/Etam  ;print *, "Pd=",Pd
			$dataPage40['Pd'] =	0;
			if($dataPage40['Etam']!=0){
				$dataPage40['Pd'] =	($dataPage40['Fa'] + $dataPage40['Ff'] - $dataPage40['Fg']) * $dataPage40['Vd']/$dataPage40['Etam'];
			}
			// Vf=	L/ (t2-1);print *, "Vf=",Vf
			$dataPage40['Vf'] =	0;
			if(($dataPage40['t2'] - 1)!=0){
				$dataPage40['Vf'] =	$dataPage40['L'] /($dataPage40['t2'] - 1);
			}
			// Fa=	(WL+Wcu) *Vf/(1000*ta) ;print *, "Fa=",Fa
			$dataPage40['Fa'] =	0;
			if($dataPage40['ta']!=0){
				$dataPage40['Fa'] =	($dataPage40['WL'] + $dataPage40['Wcu']) * $dataPage40['Vf']/(1000 * $dataPage40['ta']);
			}
			// Ff=(9.8/1000.*(ms*Rb1+fr) * (WL+Wcu))/Rr1 ;print *, "Ff=",Ff
			$dataPage40['Ff'] = 0;
			if($dataPage40['Rr1']!=0){
				$dataPage40['Ff'] = ((9.8/1000.0)*($dataPage40['ms']*$dataPage40['Rb1'] + $dataPage40['fr']) * ($dataPage40['WL'] + $dataPage40['Wcu']))/$dataPage40['Rr1'];
			}
			// Pf =(Fa + Ff) * Vf	/Etam ;print *, "Pf=",Pf
			$dataPage40['Pf'] = 0;
			if($dataPage40['Etam']!=0){
				$dataPage40['Pf'] = ($dataPage40['Fa'] + $dataPage40['Ff']) * $dataPage40['Vf']	/$dataPage40['Etam'];
			}
			// Vb =L / (t4-1) ;print *, "Vb=",Vb
			$dataPage40['Vb'] = 0;
			if(($dataPage40['t4'] - 1)!=0){
				$dataPage40['Vb'] = $dataPage40['L'] / ($dataPage40['t4'] - 1);
			}
			// Fab = Wcu * Vb /(1000*ta) ;print *, "Fab=",Fab
			$dataPage40['Fab'] = 0;
			if($dataPage40['ta']!=0){
				$dataPage40['Fab'] = $dataPage40['Wcu'] * $dataPage40['Vb'] /(1000*$dataPage40['ta']) ;
			}
			// Ffb=(9.8/1000)*(ms*Rb1+fr)*(Wcu)/Rr1 ;print *, "Ffb=",Ffb
			$dataPage40['Ffb'] = 0;
			if($dataPage40['Rr1']!=0){
				$dataPage40['Ffb'] = (9.8/1000)*($dataPage40['ms']*$dataPage40['Rb1'] + $dataPage40['fr'])*($dataPage40['Wcu'])/$dataPage40['Rr1'];
			}
			// Pb =(Fab +Ffb ) * Vb/Etam		;print *, "Pb=",Pb
			$dataPage40['Pb'] = 0;
			if($dataPage40['Etam']!=0){
				$dataPage40['Pb'] = ($dataPage40['Fab'] + $dataPage40['Ffb']) * $dataPage40['Vb']/$dataPage40['Etam'];
			}
			// Pc =( (Pu *t1) -(Pd *t3) +(Pf *t2) +(Pb * t4)) / (t1+t2+t3+t4)	;print *, "Pc=",Pc
			$dataPage40['Pc'] = 0;
			if(($dataPage40['t1'] + $dataPage40['t2'] + $dataPage40['t3'] + $dataPage40['t4'])!=0){
				$dataPage40['Pc'] = ( ($dataPage40['Pu']*$dataPage40['t1']) - ($dataPage40['Pd']*$dataPage40['t3']) + ($dataPage40['Pf']*$dataPage40['t2']) + ($dataPage40['Pb'] * $dataPage40['t4'])) / ($dataPage40['t1'] + $dataPage40['t2'] + $dataPage40['t3'] + $dataPage40['t4']);
			}
			// Pi =PC * (t1+t2+t3+t4+Ts) / (t1+t2+t3+t4 +ti+ts )		;print *, "Pi=",Pi
			$dataPage40['Pi'] = 0;
			if(($dataPage40['t1'] + $dataPage40['t2'] + $dataPage40['t3'] + $dataPage40['t4'] + $dataPage40['ti'] + $dataPage40['ts'])!=0){
				$dataPage40['Pi'] = $dataPage40['Pc'] * ($dataPage40['t1'] + $dataPage40['t2'] + $dataPage40['t3'] + $dataPage40['t4'] + $dataPage40['ts']) / ($dataPage40['t1'] + $dataPage40['t2'] + $dataPage40['t3'] + $dataPage40['t4'] + $dataPage40['ti'] + $dataPage40['ts']);
			}
			// !Eaux_power
			// Eaux_power(j)=Tp*Pi ;print *, "Eaux_power(i)=",Eaux_power(J)
			$EnergyInput['Tp'] = (isset($EnergyInput['Tp']))?$EnergyInput['Tp'] : 0;
			$dataPage40['Eaux_power'] = $EnergyInput['Tp']*$dataPage40['Pi'];

			foreach($dataPage40 as $key => $val){
				$EnergyInput['page40'][$key] = $val;
			}

			$sUserDraftInput['data'] = $EnergyInput;
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);	

			echo $dataPage40['Eaux_power'];
		}else{
			$this->layout = 'energy_input_popup';			
		}
	} /* End page40 */

	/**
	 * page41
	 * process user draf input for page41.html	 
	 * @return void
	 */
	public function page41(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		if($this->request->is('post')){	
			
			$dataPage41 = $this->request->data['energy_input'];
			
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
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
			
			$this->Statistics->set_input($sUserDraftInput);
			$this->Statistics->energy_input();
			$sUserDraftInput = $this->Statistics->get_output();
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
			
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);

			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));	
		}
	} /* End page41 */

	/**
	 * page out
	 * process user draf input for out.html	 
	 * @return void
	 */
	public function out(){
		$this->layout = 'energy_input_out';
		
		if($this->request->is('post')){	
			$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');		
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);
			
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));	
		}
	} /* End out */

	/**
	 * page out_02
	 * process user draf input for out_02.html	 
	 * @return void
	 */
	public function out_02(){
		$this->layout = 'energy_input_out';
		
		if($this->request->is('post')){	
			$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');		
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);
			
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));	
		}	
	} /* End out */

	/**
	 * page out_03
	 * process user draf input for out_03.html	 
	 * @return void
	 */
	public function out_03(){
		$this->layout = 'energy_input_out';
		
		if($this->request->is('post')){	
			$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');		
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);
			
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));	
		}
	} /* End out_03 */
	
	/**
	 * page out_04
	 * process user draf input for out_04.html	 
	 * @return void
	 */
	public function out_04(){
		$this->layout = 'energy_input_out';
		
		if($this->request->is('post')){	
			$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');		
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);
			
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));	
		}
	} /* End out_04 */

	/**
	 * page out_05
	 * process user draf input for out_05.html	 
	 * @return void
	 */
	public function out_05(){
		$this->layout = 'energy_input_out';
		
		if($this->request->is('post')){	
			$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');		
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);
			
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));	
		}
	} /* End out_05 */

	/**
	 * page out_06
	 * process user draf input for out_06.html	 
	 * @return void
	 */
	public function out_06(){
		$this->layout = 'energy_input_out';
		
		if($this->request->is('post')){	
			$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');					
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);
			
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));	
		}
	} /* End out_06 */

	/**
	 * page out_07
	 * process user draf input for out_07.html	 
	 * @return void
	 */
	public function out_07(){
		$this->layout = 'energy_input_out';

		if($this->request->is('post')){
			$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');			
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);						
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));
		}
	} /* End out_07 */

	/**
	 * page out_08
	 * process user draf input for out_08.html	 
	 * @return void
	 */
	public function out_08(){	
		$this->layout = 'energy_input_out';
		
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');		
		$sankeyPages = $this->Flow->getAllPageSankey($sUserDraftInput['data']);		
		$isLastPageSankey = false;
		if($sankeyPages){
			$lastPageSankey = $sankeyPages[count($sankeyPages)-1];
			if($lastPageSankey==$this->action){
				$isLastPageSankey = true;				
			}			
		}
		$this->set('isLastPageSankey', $isLastPageSankey);

		if($this->request->is('post')){
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);						
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));
		}
	} /* End out_08 */
	
	/**
	 * page out_09
	 * process user draf input for out_09.html	 
	 * @return void
	 */
	public function out_09(){		
		$this->layout = 'energy_input_out';
		
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		$sankeyPages = $this->Flow->getAllPageSankey($sUserDraftInput['data']);		
		$isLastPageSankey = false;
		if($sankeyPages){
			$lastPageSankey = $sankeyPages[count($sankeyPages)-1];
			if($lastPageSankey==$this->action){
				$isLastPageSankey = true;				
			}			
		}
		$this->set('isLastPageSankey', $isLastPageSankey);

		if($this->request->is('post')){
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);						
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));
		}
	} /* End out_09 */

	/**
	 * page out_10
	 * process user draf input for out_10.html	 
	 * @return void
	 */
	public function out_10(){
		$this->layout = 'energy_input_out';
		
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');		
		$sankeyPages = $this->Flow->getAllPageSankey($sUserDraftInput['data']);		
		$isLastPageSankey = false;
		if($sankeyPages){
			$lastPageSankey = $sankeyPages[count($sankeyPages)-1];
			if($lastPageSankey==$this->action){
				$isLastPageSankey = true;				
			}			
		}
		$this->set('isLastPageSankey', $isLastPageSankey);

		if($this->request->is('post')){
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);						
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));
		}
	} /* End out_10 */

	/**
	 * page out_11
	 * process user draf input for out_11.html	 
	 * @return void
	 */
	public function out_11(){
		$this->layout = 'energy_input_out';
		
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		$sankeyPages = $this->Flow->getAllPageSankey($sUserDraftInput['data']);		
		$isLastPageSankey = false;
		if($sankeyPages){
			$lastPageSankey = $sankeyPages[count($sankeyPages)-1];
			if($lastPageSankey==$this->action){
				$isLastPageSankey = true;				
			}			
		}
		$this->set('isLastPageSankey', $isLastPageSankey);

		if($this->request->is('post')){
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);						
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));
		}
	} /* End out_11 */

	/**
	 * page out_12
	 * process user draf input for out_12.html	 
	 * @return void
	 */
	public function out_12(){
		$this->layout = 'energy_input_out';
		
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		$sankeyPages = $this->Flow->getAllPageSankey($sUserDraftInput['data']);		
		$isLastPageSankey = false;
		if($sankeyPages){
			$lastPageSankey = $sankeyPages[count($sankeyPages)-1];
			if($lastPageSankey==$this->action){
				$isLastPageSankey = true;				
			}			
		}
		$this->set('isLastPageSankey', $isLastPageSankey);

		if($this->request->is('post')){
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);						
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));
		}
	} /* End out_12 */

	/**
	 * page out_13
	 * process user draf input for out_13.html	 
	 * @return void
	 */
	public function out_13(){
		$this->layout = 'energy_input_out';
		
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');		
		$sankeyPages = $this->Flow->getAllPageSankey($sUserDraftInput['data']);		
		$isLastPageSankey = false;
		if($sankeyPages){
			$lastPageSankey = $sankeyPages[count($sankeyPages)-1];
			if($lastPageSankey==$this->action){
				$isLastPageSankey = true;				
			}			
		}
		$this->set('isLastPageSankey', $isLastPageSankey);

		if($this->request->is('post')){
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);						
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));
		}
	} /* End out_13 */

	/**
	 * page out_14
	 * process user draf input for out_14.html	 
	 * @return void
	 */
	public function out_14(){
		$this->layout = 'energy_input_out';
		
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');		
		$sankeyPages = $this->Flow->getAllPageSankey($sUserDraftInput['data']);		
		$isLastPageSankey = false;
		if($sankeyPages){
			$lastPageSankey = $sankeyPages[count($sankeyPages)-1];
			if($lastPageSankey==$this->action){
				$isLastPageSankey = true;				
			}			
		}
		$this->set('isLastPageSankey', $isLastPageSankey);

		if($this->request->is('post')){
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);						
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));
		}
	} /* End out_14 */

	/**
	 * page out_15
	 * process user draf input for out_15.html	 
	 * @return void
	 */
	public function out_15(){
		$this->layout = 'energy_input_out';
		
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		$sankeyPages = $this->Flow->getAllPageSankey($sUserDraftInput['data']);		
		$isLastPageSankey = false;
		if($sankeyPages){
			$lastPageSankey = $sankeyPages[count($sankeyPages)-1];
			if($lastPageSankey==$this->action){
				$isLastPageSankey = true;				
			}			
		}
		$this->set('isLastPageSankey', $isLastPageSankey);

		if($this->request->is('post')){
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);						
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));
		}
	} /* End out_15 */

	/**
	 * page out_16
	 * process user draf input for out_16.html	 
	 * @return void
	 */
	public function out_16(){
		$this->layout = 'energy_input_out';
		
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		$sankeyPages = $this->Flow->getAllPageSankey($sUserDraftInput['data']);		
		$isLastPageSankey = false;
		if($sankeyPages){
			$lastPageSankey = $sankeyPages[count($sankeyPages)-1];
			if($lastPageSankey==$this->action){
				$isLastPageSankey = true;				
			}			
		}
		$this->set('isLastPageSankey', $isLastPageSankey);

		if($this->request->is('post')){
			$last_page = $this->action;
			$next_page = $this->Flow->getNextPage($last_page, $sUserDraftInput['data']);						
			$this->redirect(array('controller' => 'energy_input', 'action' => $next_page));
		}
	} /* End out_16 */

	public function pdf($pageOut = null){
		$this->autoRender = false;
		
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		$EnergyInput = $sUserDraftInput['data'];
		
		$this->Math->numberFormatToShow($EnergyInput, 1, '.', ' ');
		$username = $this->Auth->user('username');
		$this->OutPdf->genPdfEnergy('all', $EnergyInput, $username);
	}
	
} /* End Class*/
