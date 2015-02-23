<?php
/**
 * @author Chu Van Quy
 * All pages
 */
class InnovationInputController extends AppController{
	
	public $uses = array('MstData', 'UserResult', 'UserDraftInput');
	
	public $layout = 'innovation_input';

	public $energy_data = array();
	
	/**
	 * Usage some components
	 */
	public $components = array('Subroutine', 'InnovationFlow', 'Math', 'OutPdf', 'Statistics');

	/**
	 * Set locale for pages
	 */
	public function beforeFilter(){		
		if($this->action == 'index'){
			$previous = $this->InnovationFlow->popPage();
			$this->redirect('/menu02/index');
			exit;
		}

		$locale  = ($this->Session->read('Config.language'))? $this->Session->read('Config.language'):'jpn';
		$this->set('locale', $locale);

		//SESSION is cleared or not decleare.
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		if(!isset($sUserDraftInput['data'])){ 
			$this->redirect(array('controller' => 'menu02', 'action' => 'index'));
			exit;
		}

		//skip any process if It's temp.page
		if ($this->action == 'previous' ) {
			return true;
		}

		//check current page is weather in flow or not
		if($this->request->is('get')) {
			$menu02Next = 0;
			if(isset($this->params['pass'][0])){
				$menu02Next = $this->params['pass'][0];	
				$sUserDraftInput['data']['menu02Next'] = $menu02Next;
				$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);			
			}
			
			$current_page = $this->action;
			$popup = array('page_b03','page_b04','page_b05',
						   'page_b06','page_b07','page_b12','page_b13','page_b14','page_b15','page_b19',
						   'pdfB01', 'pdfB02', 'Cal_Eefect2', 'Cal_Mhyp2');
			
			if(!in_array($current_page, $popup)){	
				
				if($this->InnovationFlow->checkPageInFlow($current_page)){  
					$this->InnovationFlow->clearFromPage($current_page);

				}else{ 
					$last_page = $this->InnovationFlow->getLastPage();
					$fork_data = $sUserDraftInput['data'];	
					$chk = $this->InnovationFlow->checkPageFlow($last_page, $fork_data, $current_page);

					if(!$chk){
						$this->redirect(array('controller' => 'innovation_input', 'action' => $last_page));							
					}
				}
				
			}
		}
		//for save-draft tracking
		if ($this->request->is('post')) {
			//tracking page
			if ($this->action != 'previous') {				
				$pages = array('page_b03','page_b04','page_b05',
						   'page_b06','page_b07','page_b12','page_b13','page_b14','page_b15','page_b19',
						   'pdfB01', 'pdfB02', 'Cal_Eefect2', 'Cal_Mhyp2');
				
				if(!in_array($this->action, $pages)){
					$this->InnovationFlow->pushPage($this->action);					
				}
			}

			$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
			$sUserDraftInput['last_page'] = $this->action;
			$sUserDraftInput['pages'] = $this->InnovationFlow->getPageFlow();					
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
		}
	}

	/**
	* click Back button.
	*/
	public function previous() {
		//back previous-page
		$previous = $this->InnovationFlow->popPage();
		if($previous == 'index'){
			$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
			$sUserDraftInput['data']['menu02Next'] = 0;
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
			$this->InnovationFlow->clearFlowPage();
		}
		$this->redirect('/innovation_input/'.$previous);
		exit;
	}
	
	/**
	* set title for all view
	* @return avoid
	*/
	public function beforeRender() {
		$title_for_layout = __('エネルギー効率評価システム | 一般社団法人 日本工業炉協会');
		$this->set('title_for_layout', $title_for_layout);
		//output default value.
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		$pageOuts = array('out_b01', 'out_b02');
		if(!in_array($this->action, $pageOuts)){
			$this->Math->numberFormatArray($sUserDraftInput['data'], 10, '.', '');
			$this->set('InnovationInput', $sUserDraftInput['data']);
		} else {
			$InnovationInput = $sUserDraftInput['data'];
			$this->Math->numberFormatToShow($InnovationInput, 1, '.', ' ');
			$this->set('InnovationInput', $InnovationInput);
		}	
		
		$this->set('previousPage', 'previous');	

		$this->set('actionDraft', $this->action);
	}
	
	
	/**
	 * page_b01
	 * process user draf input for /front/page_b01.html
	 * @return void
	 */
	public function page_b01(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		if($sUserDraftInput){					
			if(isset($sUserDraftInput['data'])){
				$InnovationInput = $sUserDraftInput['data'];
				$this->set('InnovationInput', $InnovationInput);
			}
		}
		else{
			$this->redirect(array('controller' => 'menu02', 'action' => 'index'));
		}
		

		if($this->request->is('post')){
			$dataPageB01 = $this->request->data['innovation_input'];	
			$InnovationInput['Es_atm'] = isset($InnovationInput['Es_atm']) ? $InnovationInput['Es_atm'] : 0;
			foreach($dataPageB01 as $key => $val){
				$InnovationInput['page_b01'][$key] = $val;
			}
			$sUserDraftInput['data'] = $InnovationInput;
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
			if ($dataPageB01['radioPgB01'] == 1) {
				$dataPageB01['Total_in'] = $InnovationInput['Eh_fuel']	+
										$InnovationInput['Eh_waste']	+
										$InnovationInput['Es_fuel']		+
										$InnovationInput['Es_air']		+
										$InnovationInput['Es_atmize']	+
										$InnovationInput['Ereact']		+
										$InnovationInput['Es_infilt']	+
										$InnovationInput['Erecovery'];

				$dataPageB01['Total_out'] = $InnovationInput['Eeffect']		+
											$InnovationInput['El_jig_t']	+
											$InnovationInput['Es_oxid']		+
											$InnovationInput['Es_atm']		+
											$InnovationInput['El_wall_t']	+
											$InnovationInput['El_opening_t']+
											$InnovationInput['El_parts_t']	+
											$InnovationInput['El_cw_t']		+
											$InnovationInput['El_storage_t']+
											$InnovationInput['Eexhaust_hc'];
				$dataPageB01['El_other']=$dataPageB01['Total_in']-$dataPageB01['Total_out'];
				// !　Avalable　heat　ratioのETA1を計算。EF1はAvalable　heat。
				$dataPageB01['EF1']=$InnovationInput['Eh_fuel']		+
									$InnovationInput['Erecovery']	-
									$InnovationInput['Eexhaust_hc'];
				if($InnovationInput['Eh_fuel'] != 0){
					$dataPageB01['ETA1']= $dataPageB01['EF1']/$InnovationInput['Eh_fuel'];
				}
				// !　現状の排熱回収率計算
				$dataPageB01['ETA_R1'] = 0;
				if($InnovationInput['Eexhaust_hc'] != 0){
					$dataPageB01['ETA_R1'] = ($InnovationInput['Erecovery']/$InnovationInput['Eexhaust_hc'])*100;
				}
				// !　排熱回収がない場合のAvailable　heat　ratio(ETA0)を計算　　
				$dataPageB01['ETA0'] = 0;
				if($InnovationInput['Eh_fuel'] != 0){
					$dataPageB01['ETA0'] =	($InnovationInput['Eh_fuel']	-
											$InnovationInput['Eexhaust_hc'])/$InnovationInput['Eh_fuel'];
				}
				
				// Calculate ETA1 page_b07
				$datapg07 = array();
				$datapg07['A0_hyp'] = $InnovationInput['A0M'];
				$datapg07['G0D'] 	= $InnovationInput['G0DM'];
				$datapg07['G0'] 	= $InnovationInput['G0M'];
				$datapg07['FCO2'] 	= $InnovationInput['FCO2M'];
				$datapg07['FH2O'] 	= $InnovationInput['FH2OM'];
				$datapg07['FN2'] 	= $InnovationInput['FN2M'];
				$datapg07['FgO2d'] 	= $InnovationInput['Fg_O2D']/100;

				// Call Airratio(FgO2d,Fa_O2,Fa_H2O,G0D,A0M,M)
				$FgO2d	= $datapg07['FgO2d'];
				$Fa_O2 	= $InnovationInput['Fa_O2']; 
				$Fa_H2O = $InnovationInput['Fa_H2O'];
				$G0D 	= $datapg07['G0D'];
				$A0M	= $datapg07['A0_hyp'];
				$M 		= $InnovationInput['M'];

				$this->Subroutine->AIRRATIO($FgO2d, $Fa_O2, $Fa_H2O, $G0D, $A0M, $M);
				$datapg07['FgO2d'] 	= $FgO2d;
				$datapg07['Fa_O2']	= $Fa_O2; 
				$datapg07['Fa_H2O'] = $Fa_H2O;
				$datapg07['G0D'] 	= $G0D;
				$datapg07['Mhyp100'] = $M;
				
				$datapg07['G0_hyp'] = $InnovationInput['G0M'];
				$datapg07['Gg'] 	= ($datapg07['G0_hyp'] + ($datapg07['Mhyp100'] - 1.0)*$datapg07['A0_hyp']);
				$datapg07['Vg'] 	= ($datapg07['Gg'] *($InnovationInput['Eh_fuel'] + $InnovationInput['Eh_waste']))/1000;

				// !ガス組成計算		空気比と混合計算用テンポファイルから組成計算
				$datapg07['PN2'] = 0;
				$datapg07['PO2'] = 0;
				$datapg07['PH2O'] = 0;
				$datapg07['PCO2'] = 0;
				if (0 != $datapg07['Gg']) {
					$datapg07['PN2'] = ($InnovationInput['FN2M'] + ($datapg07['Mhyp100'] - 1.0)*
										$datapg07['A0_hyp']*$InnovationInput['Fa_N2'])/$datapg07['Gg'];
					$datapg07['PO2'] = (($datapg07['Mhyp100']-1.0)*$datapg07['A0_hyp']*
										$datapg07['Fa_O2'])/$datapg07['Gg'];
					$datapg07['PH2O'] = ($InnovationInput['FH2OM']+($datapg07['Mhyp100']-1.0)*
										$datapg07['A0_hyp']*$datapg07['Fa_H2O'])/$datapg07['Gg'];
					$datapg07['PCO2'] = $InnovationInput['FCO2M']/$datapg07['Gg'];
				}
				for($i=1 ; $i<=20 ; $i++){
				$XX[$i] = 0.;
				}
				$XX[2] = $datapg07['PN2']; // !N2
				$XX[4] = $datapg07['PO2']; // !O2
				$XX[6] = $datapg07['PH2O']; // !H2O
				$XX[8] = $datapg07['PCO2']; // !CO2

				// Call GASSH(XX,Twg1,cpx3) 
				$Twg1 = $InnovationInput['Twg1'];
				$CPX3 = 0.;
				$this->Subroutine->GASSH($XX, $Twg1, $CPX3);
				$datapg07['Twg1'] = $Twg1;
				$datapg07['CPX3'] = $CPX3;

				// Hexhaust1=CPX3*Twg1
				$datapg07['Hexhaust100'] = $datapg07['CPX3']*$datapg07['Twg1'];
				
				$dataPageB01['ETA100'] = 0;
				if (0 != $InnovationInput['Hl1']) {
					$dataPageB01['ETA100'] = ($InnovationInput['Hl1']*1000-(1 - $dataPageB01['ETA_R1'])	*
							$datapg07['Hexhaust100']*($InnovationInput['G01']+($datapg07['Mhyp100']-1)*
							$InnovationInput['A01']))/($InnovationInput['Hl1']*1000);
				}
				
				// 損失合計
				$dataPageB01['Total_lossB02'] = 0;
				$dataPageB01['Total_lossB02'] = $InnovationInput['El_wall_t'] 	+ $InnovationInput['El_opening_t'] +
												$InnovationInput['El_cw_t']   	+ $InnovationInput['El_storage_t'] +
												$InnovationInput['El_blowout_t']+ $InnovationInput['El_parts_t'] +
												$InnovationInput['El_ot_t']; 

				foreach($dataPageB01 as $key => $val){
					$sUserDraftInput['data'][$key] = $val;
				}
				$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);

				$this->redirect(array('controller' => 'innovation_input', 'action' => 'page_b02'));
			}
			else {
				$this->redirect(array('controller' => 'end', 'action' => 'index'));
			}
			$InnovationInput = $sUserDraftInput['data'];
			$this->set('InnovationInput', $InnovationInput);
		}
		
	} 


	/**
	 * page_b02
	 * process user draf input for /front/page_b02.html
	 * @return void
	 */
	public function page_b02(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		if($sUserDraftInput){		
			if(isset($sUserDraftInput['data'])){
				$InnovationInput = $sUserDraftInput['data'];
				$this->Math->numberFormatArray($InnovationInput, 1, null, '');
				$this->set('InnovationInput', $InnovationInput);
			}	
		}
		else{
			$this->redirect(array('controller' => 'menu02', 'action' => 'index'));
		}

		if ($this->request->is('post')) {			
			$this->Statistics->set_input($sUserDraftInput);
			$this->Statistics->innovation_input();
			$sUserDraftInput = $this->Statistics->get_output();

			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);

			$this->redirect(array('controller' => 'innovation_input', 'action' => 'out_b01'));
		}
	} 


	/**
	 * page_b03
	 * process user draf input for /front/page_b03.html
	 * @return void
	 */
	public function page_b03(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){	
			$this->autoRender = false;					
			$InnovationInput = $sUserDraftInput['data'];
			$dataPageB03 = $this->request->data['innovation_input'];
			// !計算処理
			$dataPageB03['Erecovery2'] = $dataPageB03['ETA_R2'] * $InnovationInput['Eexhaust_hc'];
			$dataPageB03['Es_air3'] = $dataPageB03['Erecovery2'] + $InnovationInput['Es_air'];
			$dataPageB03['Ta3'] = 0;
			if($InnovationInput['Es_air2'] != 0){
				$dataPageB03['Ta3'] = 	$InnovationInput['Ta2'] * 
										$dataPageB03['Es_air3']/$InnovationInput['Es_air2'];
			}
				$dataPageB03['ETA2'] = 	$InnovationInput['ETA0'] + (1-$InnovationInput['ETA0']) * 
										$dataPageB03['ETA_R2'];
			// !　対策後の燃料使用量を計算。
			// !Eh_fuel2	　　
			
			$dataPageB03['Eh_fuel2'] = 0;
			$dataPageB03['Save_energy_ratio'] = 100.0;
			if (0 != $dataPageB03['ETA2']) {
				$dataPageB03['Eh_fuel2'] = $InnovationInput['EF1']/$dataPageB03['ETA2'];
				// !Save_energy_ratio	　　
				$dataPageB03['Save_energy_ratio'] = (1-$InnovationInput['ETA1']/$dataPageB03['ETA2']) * 100.0;
			}
			foreach($dataPageB03 as $key => $val){
				$InnovationInput['page_b03'][$key] = $val;
			}

			$sUserDraftInput['data'] = $InnovationInput;

			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);	

			$this->Math->numberFormatArray($InnovationInput, 1, null, '');
			$out = array(
				// 'ETA1' => $InnovationInput['ETA1'] . ' %',
				'ETA2' => $InnovationInput['page_b03']['ETA2'],
				'Save_energy_ratio' => $InnovationInput['page_b03']['Save_energy_ratio']
			);
			echo json_encode($out);
		}
		else{
			$this->layout = 'innovation_input_popup';	

			$InnovationInput = $sUserDraftInput['data'];
			$this->set('InnovationInput', $InnovationInput);					
		}
	}

	/**
	 * page_b04
	 * process user draf input for /front/page_b04.html
	 * @return void
	 */
	public function page_b04(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		if($this->request->is('post')){
			$this->autoRender = false;			
			if(isset($sUserDraftInput['data'])){
				$InnovationInput = $sUserDraftInput['data'];				
			}						
			$dataPageB04 = $this->request->data['innovation_input'];
			// !計算処理
			$dataPageB04['DEL']=($dataPageB04['El_wall2']	-	$InnovationInput['El_wall1'])	+
								($dataPageB04['El_opening2']-	$InnovationInput['El_opening1'])+
								($dataPageB04['El_cw2']-$InnovationInput['El_cw1'])				+
								($dataPageB04['El_storage2']-$InnovationInput['El_storage1']);
			$dataPageB04['EF2'] = $InnovationInput['EF1'] + $dataPageB04['DEL'];
			$dataPageB04['Eh_fuel2'] = 0;
			if (0 != $InnovationInput['ETA1']) {
				$dataPageB04['Eh_fuel2'] = $dataPageB04['EF2']/$InnovationInput['ETA1'];
			}
			
			$dataPageB04['Save_energy_ratio'] = 100.0;
			if (0 != $InnovationInput['Eh_fuel']) {
				$dataPageB04['Save_energy_ratio'] = (1-$dataPageB04['Eh_fuel2']/$InnovationInput['Eh_fuel']) * 100.0;
			}
			foreach($dataPageB04 as $key => $val){
				$InnovationInput['page_b04'][$key] = $val;
			}

			$sUserDraftInput['data'] = $InnovationInput;

			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);

			$this->Math->numberFormatArray($InnovationInput, 1, null, '');
			$out = array(
				// 'Eh_fuel' => $InnovationInput['Eh_fuel']. ' kJ/t',
				'Eh_fuel2' => $InnovationInput['page_b04']['Eh_fuel2'],
				'Save_energy_ratio' => $InnovationInput['page_b04']['Save_energy_ratio']
			);
			echo json_encode($out);	
		}
		else{
			$this->layout = 'innovation_input_popup';	
			$InnovationInput = $sUserDraftInput['data'];
			$InnovationInput['El_wall1'] = $InnovationInput['El_wall_t'];
			$InnovationInput['El_opening1'] = $InnovationInput['El_opening_t'];
			$InnovationInput['El_cw1'] = $InnovationInput['El_cw_t'];
			$InnovationInput['El_storage1'] = $InnovationInput['El_storage_t'];

			$sUserDraftInput['data'] = $InnovationInput;
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);	
			$this->set('InnovationInput', $InnovationInput);
		}
	}

	/**
	 * page_b05
	 * process user draf input for /front/page_b05.html
	 * @return void
	 */
	public function page_b05(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		if($this->request->is('post')){	
			$this->autoRender = false;			
			if(isset($sUserDraftInput['data'])){
				$InnovationInput = $sUserDraftInput['data'];				
			}							
			$dataPageB05 = $this->request->data['innovation_input'];

			$this->loadModel('MstData');
			$PRODATA = $this->MstData->getAllData('PRODATA');

			$El_jig1 = isset($InnovationInput['El_jig_t']) ? $InnovationInput['El_jig_t']: 0;
			$Ijig = (isset($InnovationInput['Ijig'][5])) ? $InnovationInput['Ijig'][5] : 1;
			$dataPageB05['Ijig'] = $Ijig;

			$CPX1 = $PRODATA[$dataPageB05['Ijig']][2];
			$CPX2 = $PRODATA[$dataPageB05['Ijig']][2];	

			$keys = array('Mj2', 'Tj22', 'Tj12');
			foreach ($keys as $k) {
				if(!isset($dataPageB05[$k])){
					$dataPageB05[$k] = 0;
				}
			}	
			$El_jig1 = $dataPageB05['Mj2']*($dataPageB05['Tj22']*$CPX2-$dataPageB05['Tj12']*$CPX1);		

			$dataPageB05['CPX1'] = $CPX1;
			$dataPageB05['CPX2'] = $CPX2;
			$dataPageB05['El_jig1'] = $El_jig1;
			
			$dataPageB05['El_jig_t'] = 0.0;

			// El_jig_T=El_jig_T+	El_jig(i)
			$dataPageB05['El_jig_t'] = $dataPageB05['El_jig_t'] + $dataPageB05['El_jig1'];
			$dataPageB05['El_jig2'] = $dataPageB05['El_jig_t'];
			$dataPageB05['DEL'] = $dataPageB05['El_jig2'] - $dataPageB05['El_jig1'];
			$dataPageB05['EF2'] = $InnovationInput['EF1'] + $dataPageB05['DEL'];
			
			$InnovationInput['Eh_fuel2'] = 0;
			$dataPageB05['Save_energy_ratio'] = 100.0;
			if (0 != $InnovationInput['ETA1']) {
				$InnovationInput['Eh_fuel2'] = $dataPageB05['EF2']/$InnovationInput['ETA1'];
			}
			if (0 != $InnovationInput['EF1']) {
				$dataPageB05['Save_energy_ratio'] = (1-$dataPageB05['EF2']/$InnovationInput['EF1'])*100.0;
			}

			foreach($dataPageB05 as $key => $val){
				$InnovationInput['page_b05'][$key] = $val;
			}

			$sUserDraftInput['data'] = $InnovationInput;

			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);

			$this->Math->numberFormatArray($InnovationInput, 1, null, '');
			$out = array(
				// 'EF1' => $InnovationInput['EF1']. ' kJ/t',
				'EF2' => $InnovationInput['page_b05']['EF2'],
				'Save_energy_ratio' => $InnovationInput['page_b05']['Save_energy_ratio']
			);
			echo json_encode($out);	
		}
		else{
			$this->layout = 'innovation_input_popup';
	
			$InnovationInput = $sUserDraftInput['data'];

			$InnovationInput['Mj1'] = $InnovationInput['Mj'];
			$InnovationInput['Tj11'] = $InnovationInput['Tj1'];
			$InnovationInput['Tj21'] = $InnovationInput['Tj2'];

			$sUserDraftInput['data'] = $InnovationInput;

			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
			$this->set('InnovationInput', $InnovationInput);				
		}		
		
	} 

	/**
	 * page_b06
	 * process user draf input for /front/page_b06.html
	 * @return void
	 */
	public function page_b06(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$InnovationInput = $sUserDraftInput['data'];				
			}							

			$dataPageB06 = $this->request->data['innovation_input'];
			
			$this->loadModel('MstData');
			$PRODATA = $this->MstData->getAllData('PRODATA');

			// !		Tp1１表示	Tp1１=Tp1
			// !		Tp2１表示	Tp2１=Tp2
			$Ipro = (isset($InnovationInput['Ipro']))? $InnovationInput['Ipro']: 0;
			$dataPageB06['Ipro'] = $Ipro;

			$CPX1 = $PRODATA[$dataPageB06['Ipro']][2];
			$CPX2 = $PRODATA[$dataPageB06['Ipro']][2];

			$dataPageB06['CPX1'] = $CPX1;
			$dataPageB06['CPX2'] = $CPX2;

			$dataPageB06['Ep12'] = 1000*$dataPageB06['CPX1']*$dataPageB06['Tp12'];
			// !Ep22
			$dataPageB06['Ep22'] = (1000-$dataPageB06['Mloss2'])*$dataPageB06['CPX2']*$dataPageB06['Tp22'];
			// !　Eeffect2
			$dataPageB06['Eeffect2'] = $dataPageB06['Ep22']-$dataPageB06['Ep12'];
			// !　Eeffect2表示	改善後のEeffect2
			$dataPageB06['DEL'] = $dataPageB06['Eeffect2'] - $InnovationInput['Eeffect1'];
			$dataPageB06['EF2'] = $InnovationInput['EF1'] + $dataPageB06['DEL'];
			
			$dataPageB06['Eh_fuel2'] = 0;
			$dataPageB06['Save_energy_ratio'] = 100.0;
			if (0 != $InnovationInput['ETA1']) {
				$dataPageB06['Eh_fuel2'] = $dataPageB06['EF2']/$InnovationInput['ETA1'];
			}
			if (0 != $InnovationInput['Eh_fuel']) {
				$dataPageB06['Save_energy_ratio'] = (1-$dataPageB06['Eh_fuel2']/$InnovationInput['Eh_fuel'])*100.0;
			}
			
			foreach($dataPageB06 as $key => $val){
				$InnovationInput['page_b06'][$key] = $val;
			}

			$sUserDraftInput['data'] = $InnovationInput;

			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);

			$this->Math->numberFormatArray($InnovationInput, 1, null, '');
			$out = array(
				// 'Eh_fuel' => $InnovationInput['Eh_fuel']. ' kJ/t',
				'Eh_fuel2' => $InnovationInput['page_b06']['Eh_fuel2'],
				'Save_energy_ratio' => $InnovationInput['page_b06']['Save_energy_ratio']
			);
			echo json_encode($out);		
		}
		else{
			$this->layout = 'innovation_input_popup';
		
			$InnovationInput = $sUserDraftInput['data'];

			// !		Eeffect1表示	Eeffect1　=　Eeffect
			$InnovationInput['Eeffect1'] = (isset($InnovationInput['Eeffect'])) ? 
											$InnovationInput['Eeffect'] : 0;
			$sUserDraftInput['data'] = $InnovationInput;

			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
			
			$this->set('InnovationInput', $InnovationInput);
		}
		
	} 

	/**
	 * page_b07
	 * process user draf input for /front/page_b07.html
	 * @return void
	 */
	public function page_b07(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$InnovationInput = $sUserDraftInput['data'];				
			}							

			$dataPageB07 = $this->request->data['innovation_input'];

			$InnovationInput['G0_hyp'] = $InnovationInput['G0M'];
			$InnovationInput['Gg'] = ($InnovationInput['G0_hyp'] + ($InnovationInput['Mhyp1'] - 1.0)*$InnovationInput['A0_hyp']);
			$InnovationInput['Vg'] = ($InnovationInput['Gg'] *($InnovationInput['Eh_fuel'] + $InnovationInput['Eh_waste']))/1000;

			// !ガス組成計算		空気比と混合計算用テンポファイルから組成計算
			$InnovationInput['PN2'] = 0;
			$InnovationInput['PO2'] = 0;
			$InnovationInput['PH2O'] = 0;
			$InnovationInput['PCO2'] = 0;
			if (0 != $InnovationInput['Gg']) {
				$InnovationInput['PN2'] = ($InnovationInput['FN2M'] + ($InnovationInput['Mhyp1'] - 1.0)*
									$InnovationInput['A0_hyp']*$InnovationInput['Fa_N2'])/$InnovationInput['Gg'];
				$InnovationInput['PO2'] = (($InnovationInput['Mhyp1']-1.0)*$InnovationInput['A0_hyp']*
									$InnovationInput['Fa_O2'])/$InnovationInput['Gg'];
				$InnovationInput['PH2O'] = ($InnovationInput['FH2OM']+($InnovationInput['Mhyp1']-1.0)*
									$InnovationInput['A0_hyp']*$InnovationInput['Fa_H2O'])/$InnovationInput['Gg'];
				$InnovationInput['PCO2'] = $InnovationInput['FCO2M']/$InnovationInput['Gg'];
			}
			for($i=1 ; $i<=20 ; $i++){
			$XX[$i] = 0.;
			}
			$XX[2] = $InnovationInput['PN2']; // !N2
			$XX[4] = $InnovationInput['PO2']; // !O2
			$XX[6] = $InnovationInput['PH2O']; // !H2O
			$XX[8] = $InnovationInput['PCO2']; // !CO2

			// Call GASSH(XX,Twg1,cpx3) 
			$Twg1 = $InnovationInput['Twg1'];
			$CPX3 = 0.;
			$this->Subroutine->GASSH($XX, $Twg1, $CPX3);
			$InnovationInput['Twg1'] = $Twg1;
			$InnovationInput['CPX3'] = $CPX3;

			// Hexhaust1=CPX3*Twg1
			$InnovationInput['Hexhaust1'] = $InnovationInput['CPX3']*$InnovationInput['Twg1'];
			
			$dataPageB07['ETA1'] = 0;
			if (0 != $InnovationInput['Hl1']) {
				$dataPageB07['ETA1'] = ($InnovationInput['Hl1']*1000-(1 - $InnovationInput['ETA_R1'])	*
						$InnovationInput['Hexhaust1']*($InnovationInput['G01']+($InnovationInput['Mhyp1']-1)*
						$InnovationInput['A01']))/($InnovationInput['Hl1']*1000);
			}

			$A0M 	= 0.;
			$G0DM 	= 0.;
			$G0M 	= 0.;
			$FCO2M 	= 0.;
			$FH2OM 	= 0.;
			$FN2M 	= 0.;
			$FSO2M 	= 0.;
			
			$InnovationInput['A0_hyp'] 	= $A0M;
			$InnovationInput['G0D'] 	= $G0DM;
			$InnovationInput['G0'] 		= $G0M;
			$InnovationInput['FCO2'] 	= $FCO2M;
			$InnovationInput['FH2O'] 	= $FH2OM;
			$InnovationInput['FN2'] 	= $FN2M;
			$dataPageB07['FgO2d'] = $dataPageB07['Fg_O2d2']/100;

			// Call Airratio(FgO2d,Fa_O2,Fa_H2O,G0D1,A01,M)
			$FgO2d	= $dataPageB07['FgO2d'];
			$Fa_O2 	= $InnovationInput['Fa_O2']; 
			$Fa_H2O = $InnovationInput['Fa_H2O'];
			$A01	= $InnovationInput['A01'];
			$G0D1	= $InnovationInput['G0D1'];
			$M 		= 0.;
			
			$this->Subroutine->AIRRATIO($FgO2d, $Fa_O2, $Fa_H2O, $G0D1, $A01, $M);
			$dataPageB07['FgO2d'] 		= $FgO2d;
			$InnovationInput['Fa_O2']	= $Fa_O2; 
			$InnovationInput['Fa_H2O'] 	= $Fa_H2O;
			$InnovationInput['G0D1'] 	= $G0D1;
			$InnovationInput['A01'] 	= $A01;

			$InnovationInput['Mhyp2'] = $M;
			// print *, " M2=", M

			$InnovationInput['G0_hyp'] = $InnovationInput['G0M'];
			$InnovationInput['Gg'] = ($InnovationInput['G0_hyp'] + ($InnovationInput['Mhyp2'] - 1.0)*$InnovationInput['A0_hyp']);
			$InnovationInput['Vg'] = ($InnovationInput['Gg'] *($InnovationInput['Eh_fuel'] + $InnovationInput['Eh_waste']))/1000;

			// !ガス組成計算		空気比と混合計算用テンポファイルから組成計算
			$InnovationInput['PN2'] = 0;
			$InnovationInput['PO2'] = 0;
			$InnovationInput['PH2O'] = 0;
			$InnovationInput['PCO2'] = 0;
			if (0 != $InnovationInput['Gg']) {
				$InnovationInput['PN2'] = ($InnovationInput['FN2M'] + ($InnovationInput['Mhyp2'] - 1.0)	*	
								$InnovationInput['A0_hyp']*$InnovationInput['Fa_N2'])/$InnovationInput['Gg'];
				$InnovationInput['PO2'] = (($InnovationInput['Mhyp2']-1.0)*$InnovationInput['A0_hyp']	*
								$InnovationInput['Fa_O2'])/$InnovationInput['Gg'];
				$InnovationInput['PH2O'] = ($InnovationInput['FH2OM']+($InnovationInput['Mhyp2']-1.0)	*
								$InnovationInput['A0_hyp']*$InnovationInput['Fa_H2O'])/$InnovationInput['Gg'];
				$InnovationInput['PCO2'] = $InnovationInput['FCO2M']/$InnovationInput['Gg'];
			}
			
			for($i=1 ; $i<=20 ; $i++){
			$XX[$i] = 0.;
			}
			$XX[2] = $InnovationInput['PN2']; // !N2
			$XX[4] = $InnovationInput['PO2']; // !O2
			$XX[6] = $InnovationInput['PH2O']; // !H2O
			$XX[8] = $InnovationInput['PCO2']; // !CO2

			// Call GASSH(XX,Twg1,cpx3) 
			$Twg1 = $InnovationInput['Twg1'];
			$CPX3 = 0.;
			$this->Subroutine->GASSH($XX, $Twg1, $CPX3);
			$InnovationInput['Twg1'] = $Twg1;
			$InnovationInput['CPX3'] = $CPX3;

			// Hexhaust2=CPX3*Twg1
			$InnovationInput['Hexhaust2'] = $InnovationInput['CPX3']*$InnovationInput['Twg1'];
			
			$dataPageB07['ETA2'] = 0;
			if (0 != $InnovationInput['Hl1']) {
				$dataPageB07['ETA2'] = ($InnovationInput['Hl1']*1000-(1 - $InnovationInput['ETA_R1'])*
						$InnovationInput['Hexhaust1']*($InnovationInput['G01']+($InnovationInput['Mhyp2']-1)*
						$InnovationInput['A01']))/($InnovationInput['Hl1']*1000);
			}
			
			$InnovationInput['Eh_fuel'] = 0;
			if (0 != $InnovationInput['ETA1']) {
				$InnovationInput['Eh_fuel'] = $InnovationInput['EF1']/$InnovationInput['ETA1'];
			}
			
			$dataPageB07['Eh_fuel2'] = 0;
			$dataPageB07['Save_energy_ratio'] = 100.0;
			if (0 != $dataPageB07['ETA2']) {
				$dataPageB07['Eh_fuel2'] = $InnovationInput['EF1']/$dataPageB07['ETA2'];
				$dataPageB07['Save_energy_ratio'] = (1-$InnovationInput['ETA1']/$dataPageB07['ETA2'])*100.0;
			}
			
			foreach($dataPageB07 as $key => $val){
				$InnovationInput['page_b07'][$key] = $val;
			}
			
			$sUserDraftInput['data'] = $InnovationInput;
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);

			$this->Math->numberFormatArray($InnovationInput, 1, null, '');
			$out = array(
				// 'ETA1' => $InnovationInput['page_b07']['ETA1'],
				'ETA2' => $InnovationInput['page_b07']['ETA2'],
				'Save_energy_ratio' => $InnovationInput['page_b07']['Save_energy_ratio']
			);
			echo json_encode($out);	
		}
		else{
			$this->layout = 'innovation_input_popup';		

			$InnovationInput = $sUserDraftInput['data'];

			$InnovationInput['A0_hyp'] 	= $InnovationInput['A0M'];
			$InnovationInput['G0D'] 	= $InnovationInput['G0DM'];
			$InnovationInput['G0'] 		= $InnovationInput['G0M'];
			$InnovationInput['FCO2'] 	= $InnovationInput['FCO2M'];
			$InnovationInput['FH2O'] 	= $InnovationInput['FH2OM'];
			$InnovationInput['FN2'] 	= $InnovationInput['FN2M'];
			$dataPageB07['FgO2d'] = $InnovationInput['Fg_O2D']/100;

			// Call Airratio(FgO2d,Fa_O2,Fa_H2O,G0D,A0M,M)
			$FgO2d	= $dataPageB07['FgO2d'];
			$Fa_O2 	= $InnovationInput['Fa_O2']; 
			$Fa_H2O = $InnovationInput['Fa_H2O'];
			$G0D 	= $InnovationInput['G0D'];
			$A0M	= $InnovationInput['A0_hyp'];
			$M 		= $InnovationInput['M'];

			$this->Subroutine->AIRRATIO($FgO2d, $Fa_O2, $Fa_H2O, $G0D, $A0M, $M);
			$dataPageB07['FgO2d'] 		= $FgO2d;
			$InnovationInput['Fa_O2']	= $Fa_O2; 
			$InnovationInput['Fa_H2O'] 	= $Fa_H2O;
			$InnovationInput['G0D'] 	= $G0D;

			$InnovationInput['Mhyp1'] = $M;
			// print *, " M1=", M1

			$sUserDraftInput['data'] = $InnovationInput;

			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);	

			$this->set('InnovationInput', $InnovationInput);
		}
	} 

	/**
	 * page_b10
	 * process user draf input for /front/page_b10.ctp
	 * @return void
	 */
	public function page_b10(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		
		if($sUserDraftInput){
			if(isset($sUserDraftInput['data'])){
				$InnovationInput = $sUserDraftInput['data'];
				$this->set('InnovationInput', $InnovationInput);
			}
		}
		else{
			$this->redirect(array('controller' => 'menu02', 'action' => 'index'));
		}
		
		if($this->request->is('post')){
			$dataPageB10 = $this->request->data['innovation_input'];
			foreach($dataPageB10 as $key => $val){
				$InnovationInput['page_b10'][$key] = $val;
			}
			$sUserDraftInput['data'] = $InnovationInput;
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);			
			if ($dataPageB10['radioPgB10'] == 1) {
				// 損失合計
				$dataPageB10['Total_lossB11'] = 0;
				$dataPageB10['Total_lossB11'] = $InnovationInput['El_wall_t'] 	+ $InnovationInput['El_opening_t'] +
												$InnovationInput['El_cw_t']   	+ $InnovationInput['El_storage_t'] +
												$InnovationInput['El_blowout_t']+ $InnovationInput['El_parts_t'] +
												$InnovationInput['El_ot_t']; 
				// end損失合計

				// 電気損失合計
				$dataPageB10['Total100'] = 0;
				$dataPageB10['Total100'] = 	$InnovationInput['El_fre'] 		+ 
											$InnovationInput['El_coil'] 	+ 
											$InnovationInput['El_trans']	+ 
											$InnovationInput['El_terminal'] + 
											$InnovationInput['El_con'] 		+ 
											$InnovationInput['El_wir'] 		+ 
											$InnovationInput['El_cl'];
				// end電気損失合計

				foreach($dataPageB10 as $key => $val){
					$sUserDraftInput['data'][$key] = $val;
				}
				$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
				$this->redirect(array('controller' => 'innovation_input', 'action' => 'page_b11'));
			} 
			else {
				$this->redirect(array('controller' => 'end', 'action' => 'index'));
			}

		}
	}

	/**
	 * page_b11
	 * process user draf input for /front/page_b11.ctp
	 * @return void
	 */
	public function page_b11(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		if($sUserDraftInput){	
			if(isset($sUserDraftInput['data'])){
				$InnovationInput = $sUserDraftInput['data'];
				$this->set('InnovationInput', $InnovationInput);
			}		
		}
		else{
			$this->redirect(array('controller' => 'menu02', 'action' => 'index'));
		}
		
		if ($this->request->is('post')) {
			$this->Statistics->set_input($sUserDraftInput);
			$this->Statistics->innovation_input();
			$sUserDraftInput = $this->Statistics->get_output();

			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);

			$this->redirect(array('controller' => 'innovation_input', 'action' => 'out_b02'));
			exit;
		}
	} 

	/**
	 * page_b12
	 * process user draf input for /front/page_b12.ctp
	 * @return void
	 */
	public function page_b12(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$InnovationInput = $sUserDraftInput['data'];				
			}							

			$dataPageB12 = $this->request->data['innovation_input'];
			
			// !計算処理
			$dataPageB12['DEL']=($dataPageB12['El_wall2']-$InnovationInput['El_wall1'])			+
								($dataPageB12['El_opening2']-$InnovationInput['El_opening1'])	+
								($dataPageB12['El_cw2']-$InnovationInput['El_cw1'])				+
								($dataPageB12['El_storage2']-$InnovationInput['El_storage1']);
			$dataPageB12['EF2'] = $InnovationInput['EF1'] + $dataPageB12['DEL'];
			$dataPageB12['Eh_el_accept2'] = $dataPageB12['EF2'];
			
			$dataPageB12['Save_energy_ratio'] = 100.0;
			if (0 != $InnovationInput['EF1']) {
				$dataPageB12['Save_energy_ratio'] = (1-$dataPageB12['EF2']/$InnovationInput['EF1']) * 100.0;
			}

			foreach($dataPageB12 as $key => $val){
				$InnovationInput['page_b12'][$key] = $val;
			}
			
			$sUserDraftInput['data'] = $InnovationInput;

			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);

			$this->Math->numberFormatArray($InnovationInput, 1, null, '');
			$out = array(
				// 'EF1' => $InnovationInput['EF1'] . ' kJ/t',
				'EF2' => $InnovationInput['page_b12']['EF2'],
				'Save_energy_ratio' => $InnovationInput['page_b12']['Save_energy_ratio']
			);
			echo json_encode($out);	
		}
		else{
			$this->layout = 'innovation_input_popup';	

			$InnovationInput = $sUserDraftInput['data'];

			$InnovationInput['El_wall1'] = $InnovationInput['El_wall_t'];
			$InnovationInput['El_opening1'] = $InnovationInput['El_opening_t'];
			$InnovationInput['El_cw1'] = $InnovationInput['El_cw_t'];
			$InnovationInput['El_storage1'] = $InnovationInput['El_storage_t'];

			$sUserDraftInput['data'] = $InnovationInput;

			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);	

			$this->set('InnovationInput', $InnovationInput);
		}
	} 

	/**
	 * page_b13
	 * process user draf input for /front/page_b13.ctp
	 * @return void
	 */
	public function page_b13(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$InnovationInput = $sUserDraftInput['data'];				
			}							

			$dataPageB13 = $this->request->data['innovation_input'];
			
			$this->loadModel('MstData');
			$PRODATA = $this->MstData->getAllData('PRODATA');

			$El_jig1 = isset($InnovationInput['El_jig_t']) ? $InnovationInput['El_jig_t'] : 0;

			$Ijig = isset($InnovationInput['Ijig'][13]) ? $InnovationInput['Ijig'][13] : 1;
			$dataPageB13['Ijig'] = $Ijig;

			$CPX1 = isset($PRODATA[$dataPageB13['Ijig']][2]) ? $PRODATA[$dataPageB13['Ijig']][2] : 0;
			$CPX2 = isset($PRODATA[$dataPageB13['Ijig']][2]) ? $PRODATA[$dataPageB13['Ijig']][2] : 0;					
			
			$keys = array('Mj2', 'Tj22', 'Tj12');
			foreach ($keys as $k) {
				if(!isset($dataPageB13[$k])){
					$dataPageB13[$k] = 0;
				}
			}
			$El_jig1 = $dataPageB13['Mj2']*($dataPageB13['Tj22']*$CPX2-$dataPageB13['Tj12']*$CPX1);		

			$dataPageB13['CPX1'] = $CPX1;
			$dataPageB13['CPX2'] = $CPX2;
			$dataPageB13['El_jig1'] = $El_jig1;
			
			$dataPageB13['El_jig_t'] = 0.0;

			// El_jig_T=El_jig_T+	El_jig(i)
			$dataPageB13['El_jig_t'] = $dataPageB13['El_jig_t'] + $dataPageB13['El_jig1'];
			$dataPageB13['El_jig2'] = $dataPageB13['El_jig_t'];
			$dataPageB13['DEL'] = $dataPageB13['El_jig2'] - $dataPageB13['El_jig1'];
			$dataPageB13['EF2'] = $InnovationInput['EF1'] + $dataPageB13['DEL'];
			$dataPageB13['Eh_el_accept2'] = $dataPageB13['EF2'];
			
			$dataPageB13['Save_energy_ratio'] = 100.0;
			if (0 != $InnovationInput['EF1']) {
				$dataPageB13['Save_energy_ratio'] = (1-$dataPageB13['EF2']/$InnovationInput['EF1'])*100.0;
			}

			foreach($dataPageB13 as $key => $val){
				$InnovationInput['page_b13'][$key] = $val;
			}

			$sUserDraftInput['data'] = $InnovationInput;
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);	
			
			$this->Math->numberFormatArray($InnovationInput, 1, null, '');
			$out = array(
				// 'EF1' => $InnovationInput['EF1'] . ' kJ/t',
				'EF2' => $InnovationInput['page_b13']['EF2'],
				'Save_energy_ratio' => $InnovationInput['page_b13']['Save_energy_ratio']
			);
			echo json_encode($out);	
		}
		else{
			$this->layout = 'innovation_input_popup';
	
			$InnovationInput = $sUserDraftInput['data'];

			$InnovationInput['Mj1'] = isset($InnovationInput['Mj'])? $InnovationInput['Mj']: 0;
			$InnovationInput['Tj11'] = isset($InnovationInput['Tj1'])? $InnovationInput['Tj1']: 0;
			$InnovationInput['Tj21'] = isset($InnovationInput['Tj2'])? $InnovationInput['Tj2']: 0;

			$sUserDraftInput['data'] = $InnovationInput;

			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
			$this->set('InnovationInput', $InnovationInput);		
		}		
	}

	/**
	 * page_b14
	 * process user draf input for /front/page_b14.ctp
	 * @return void
	 */
	public function page_b14(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$InnovationInput = $sUserDraftInput['data'];				
			}							

			$dataPageB14 = $this->request->data['innovation_input'];
			
			$this->loadModel('MstData');
			$PRODATA = $this->MstData->getAllData('PRODATA');

			// !		Tp1１表示	Tp1１=Tp1
			// !		Tp2１表示	Tp2１=Tp2
			$Ipro = (isset($InnovationInput['Ipro'])) ? $InnovationInput['Ipro'] : 0;
			$dataPageB14['Ipro'] = $Ipro;

			$CPX1 = isset($PRODATA[$dataPageB14['Ipro']][2]) ? $PRODATA[$dataPageB14['Ipro']][2] : 0;
			$CPX2 = isset($PRODATA[$dataPageB14['Ipro']][2]) ? $PRODATA[$dataPageB14['Ipro']][2] : 0;

			$dataPageB14['CPX1'] = $CPX1;
			$dataPageB14['CPX2'] = $CPX2;

			$dataPageB14['Ep12'] = 1000*$dataPageB14['CPX1']*$dataPageB14['Tp12'];
			// !Ep22
			$dataPageB14['Ep22'] = (1000-$dataPageB14['Mloss2'])*$dataPageB14['CPX2']*$dataPageB14['Tp22'];
			// !　Eeffect2
			$dataPageB14['Eeffect2'] = $dataPageB14['Ep22']-$dataPageB14['Ep12'];
			// !　Eeffect2表示	改善後のEeffect2
			$dataPageB14['DEL'] = $dataPageB14['Eeffect2'] - $InnovationInput['Eeffect1'];
			$dataPageB14['EF2'] = $InnovationInput['EF1'] + $dataPageB14['DEL'];
			$dataPageB14['Eh_el_accept2'] = $dataPageB14['EF2'];
			
			$dataPageB14['Save_energy_ratio'] = 100.0;
			if (0 != $InnovationInput['EF1']) {
				$dataPageB14['Save_energy_ratio'] = (1-$dataPageB14['EF2']/$InnovationInput['EF1']) * 100.0;
			}
			foreach($dataPageB14 as $key => $val){
				$InnovationInput['page_b14'][$key] = $val;
			}

			$sUserDraftInput['data'] = $InnovationInput;
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);

			$this->Math->numberFormatArray($InnovationInput, 1, null, '');
			$out = array(
				// 'EF1' => $InnovationInput['EF1'] . ' kJ/t',
				'EF2' => $InnovationInput['page_b14']['EF2'],
				'Save_energy_ratio' => $InnovationInput['page_b14']['Save_energy_ratio']
			);
			echo json_encode($out);		
		}
		else{
			$this->layout = 'innovation_input_popup';
	
			$InnovationInput = $sUserDraftInput['data'];

			// !		Eeffect1表示	Eeffect1　=　Eeffect
			$InnovationInput['Eeffect1'] = (isset($InnovationInput['Eeffect'])) ? 
											$InnovationInput['Eeffect'] : 0;
			$sUserDraftInput['data'] = $InnovationInput;

			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);
			$keys = array('Tp1', 'Tp2', 'Mloss');
			foreach ($keys as $k) {
				if (!isset($InnovationInput[$k])) {
					$InnovationInput[$k] = 0;
				}
			}
			$this->set('InnovationInput', $InnovationInput);
		}
	}

/**
	 * page_b15
	 * process user draf input for /front/page_b15.ctp
	 * @return void
	 */
	public function page_b15(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$InnovationInput = $sUserDraftInput['data'];				
			}							

			$dataPageB15 = $this->request->data['innovation_input'];
			
			$dataPageB15['total1'] = 	$InnovationInput['El_fre'] 		+ 
										$InnovationInput['El_coil'] 	+ 
										$InnovationInput['El_trans']	+ 
										$InnovationInput['El_terminal'] + 
										$InnovationInput['El_con'] 		+ 
										$InnovationInput['El_wir'] 		+ 
										$InnovationInput['El_cl'];
			$dataPageB15['total2'] = 	$dataPageB15['El_fre2'] 	+ 
										$dataPageB15['El_coil2'] 	+ 
										$dataPageB15['El_trans2'] 	+ 
										$dataPageB15['El_terminal2']+ 
										$dataPageB15['El_con2'] 	+ 
										$dataPageB15['El_wir2'] 	+
										$dataPageB15['El_cl2'];
			$dataPageB15['DEL'] = $dataPageB15['total2'] - $dataPageB15['total1'];
			$dataPageB15['EF2'] = $InnovationInput['EF1'] + $dataPageB15['DEL'];
			$dataPageB15['Eh_el_accept2'] = $dataPageB15['EF2'];

			$dataPageB15['Save_energy_ratio'] = 100.0;
			if (0 != $InnovationInput['EF1']) {
				$dataPageB15['Save_energy_ratio'] = (1-$dataPageB15['EF2']/$InnovationInput['EF1'])*100.0;
			}

			foreach($dataPageB15 as $key => $val){
				$InnovationInput['page_b15'][$key] = $val;
			}
			
			$sUserDraftInput['data'] = $InnovationInput;
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);

			$this->Math->numberFormatArray($InnovationInput, 1, null, '');
			$out = array(
				// 'EF1' => $InnovationInput['EF1'] . ' kJ/t',
				'EF2' => $InnovationInput['page_b15']['EF2'],
				'Save_energy_ratio' => $InnovationInput['page_b15']['Save_energy_ratio']
			);
			echo json_encode($out);	
		}
		else{
			$this->layout = 'innovation_input_popup';	
			$InnovationInput = $sUserDraftInput['data'];
			$this->set('InnovationInput', $InnovationInput);
		}
	} 

	/**
	 * page_b19 
	 * process user draf input for page_b19.html
	 *
	 * @return void
	 */
	public function page_b19(){		
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($this->request->is('post')){	
			$this->autoRender = false;			

			if(isset($sUserDraftInput['data'])){
				$InnovationInput = $sUserDraftInput['data'];				
			}			

			$dataPage_b19 = $this->request->data['innovation_input'];	
			$actPage = $this->request->data['act'];	
			switch ($actPage){
				case 'actp5':	$act = 5; break;
				case 'actp13':	$act = 13; break;				
			}	
			
			foreach($dataPage_b19 as $key => $val){
				$InnovationInput['page_b19'][$key][$act] = $val;
			}
			
			$sUserDraftInput['data'] = $InnovationInput;
			$this->Math->numberFormatArray($sUserDraftInput['data'], 10, '.', '');
			
			$this->Session->write('Session_User_Draft_Input', $sUserDraftInput);	
		}else{
			$this->layout = 'innovation_input_popup';

			if(!$sUserDraftInput){	
				$this->redirect(array('controller' => 'menu02', 'action' => 'index'));
			}		

			$this->loadModel('MstData');
			$PRODATA = $this->MstData->getAllData('PRODATA');
			$this->set('PRODATA', $PRODATA);

			$act = 0;
			if(isset($this->request->pass[0])){
				switch ($this->request->pass[0]) {			
					case 5:		$act = 5; break;				
					case 13:	$act = 13; break;				
				}
			}
			$InnovationInput = $sUserDraftInput['data'];				
			$this->set('act', $act);
			$this->set('InnovationInput', $InnovationInput);							
		}
	} /* End page_b19 */	
	/**
	 * out_b01
	 * process user draf input for /front/out_b01.ctp
	 * @return void
	 */
	public function out_b01(){

		$this->layout = 'innovation_input_out';

	}

	/**
	 * out_b02
	 * process user draf input for /front/out_b02.ctp
	 * @return void
	 */
	public function out_b02(){

		$this->layout = 'innovation_input_out';
	}

	public function pdfB01(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($sUserDraftInput){			
			if(isset($sUserDraftInput['data'])){
				$InnovationInput = $sUserDraftInput['data'];
				$this->Math->numberFormatToShow($InnovationInput, 1, '.', ' ');
			}
		}else{
			$this->redirect(array('controller' => 'menu02', 'action' => 'index'));
		}	
		$username = $this->Auth->user('username');	
		$this->OutPdf->genPdfInno1($InnovationInput, $username);
	}

	public function pdfB02(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');

		if($sUserDraftInput){			
			if(isset($sUserDraftInput['data'])){
				$InnovationInput = $sUserDraftInput['data'];
				$this->Math->numberFormatToShow($InnovationInput, 1, '.', ' ');
			}
		}else{
			$this->redirect(array('controller' => 'menu02', 'action' => 'index'));
		}		
		$username = $this->Auth->user('username');	
		$this->OutPdf->genPdfInno2($InnovationInput, $username);
	}

	public function Cal_Eefect2() {
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		$InnovationInput = $sUserDraftInput['data'];

		$valMloss2 = $this->request->query['valMloss2'];
		$valTp12 = $this->request->query['valTp12'];
		$valTp22 = $this->request->query['valTp22'];
		
		$this->loadModel('MstData');
		$PRODATA = $this->MstData->getAllData('PRODATA');

		// !		Tp1１表示	Tp1１=Tp1
		// !		Tp2１表示	Tp2１=Tp2
		$Ipro = (isset($InnovationInput['Ipro']))? $InnovationInput['Ipro']: 0;

		$CPX1 = $PRODATA[$Ipro][2];
		$CPX2 = $PRODATA[$Ipro][2];

		$Ep12 = 1000 * $CPX1 * $valTp12;
		// !Ep22
		$Ep22 = (1000-$valMloss2)*$CPX2*$valTp22;
		// !　Eeffect2
		$Eeffect2 = $Ep22 - $Ep12;
		echo $Eeffect2;
		exit;
	}

	public function Cal_Mhyp2(){
		$sUserDraftInput = $this->Session->read('Session_User_Draft_Input');
		$InnovationInput = $sUserDraftInput['data'];

		$valFg_O2d2 = $this->request->query['valFg_O2d2'];

		$valFg_O2d 	= $valFg_O2d2/100;

		// Call Airratio(FgO2d,Fa_O2,Fa_H2O,G0D1,A01,M)
		$FgO2d	= $valFg_O2d;
		$Fa_O2 	= $InnovationInput['Fa_O2']; 
		$Fa_H2O = $InnovationInput['Fa_H2O'];
		$A01	= $InnovationInput['A01'];
		$G0D1	= $InnovationInput['G0D1'];
		$M 		= 0.;
		
		$this->Subroutine->AIRRATIO($FgO2d, $Fa_O2, $Fa_H2O, $G0D1, $A01, $M);
		$Mhyp2 = $M;
		echo $Mhyp2;
		exit;
	}

}/* End Class*/
