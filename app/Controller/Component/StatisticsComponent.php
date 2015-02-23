<?php
class StatisticsComponent extends Component{
	public $data = array();
	public $input = array();
	
	/**
	* refine 
	*/
	function set_input($input) {
		$this->input = $input;
		$this->data = $input['data'];
	}
	
	function get_output() {
		return $this->input;
	}
	
	public function innovation_input(){
		if(isset($this->data['IND1']) && $this->data['IND1'] == 2){
			$this->out_b01();
		}
		elseif(isset($this->data['IND1']) && $this->data['IND1'] == 1){
			$this->out_b02();
		}
		else{
			$this->out_b01();
			$this->out_b02();
		}
		$this->input['data'] = $this->data;
	}

	function out_b01(){
		// Input portion
		$this->data['out_b01']['Total_in'] = 0;
		$input_keys = array('Eh_fuel',
							'Eh_waste',
							'Es_fuel',
							'Es_air',
							'Es_atmize',
							'Ereact',
							'Es_infilt');
		foreach ($input_keys as $k) {
			if(!isset($this->data[$k])){
				$this->data[$k] = 0;
			}
			$this->data['out_b01']['Total_in'] += $this->data[$k];
		}

		//Output portion
		$output_keys = array('Eeffect',
							 'El_jig_t',
							 'Es_oxid',
							 'Eexhaust',
							 'Es_atm',
							 'El_wall_t',
							 'El_opening_t',
							 'El_parts_t',
							 'El_cw_t',
							 'El_blowout_t',
							 'El_storage_t');
		$this->data['out_b01']['Total_out']  = 0;
		foreach ($output_keys as $k) {
			if(!isset($this->data[$k])){
				$this->data[$k] = 0;
			}
			$this->data['out_b01']['Total_out'] += 	$this->data[$k];
		}
		$this->data['out_b01']['El_other']	=	$this->data['out_b01']['Total_in'] - $this->data['out_b01']['Total_out'];
		$this->data['El_other']				=	$this->data['out_b01']['El_other'];
		$this->data['out_b01']['Total_out']	=	$this->data['out_b01']['Total_in'];

		//Calculate input - ratio
		if($this->data['out_b01']['Total_in']!=0){
			foreach ($input_keys as $k) {
				$this->data['out_b01'][$k.'_ratio'] = ($this->data[$k] / $this->data['out_b01']['Total_in'])*100;
			}
		} else {
			foreach ($input_keys as $k) {
				$this->data['out_b01'][$k.'_ratio'] = 0;
			}
		}
		$this->data['out_b01']['Total_in_ratio'] = 100.0;

		//Calculate output - ratio
		if ($this->data['out_b01']['Total_out'] != 0) {
			foreach ($output_keys as $k) {
				$this->data['out_b01'][$k . '_ratio']	= 	($this->data[$k]	/ $this->data['out_b01']['Total_out'])*100;
				$this->data['out_b01']['El_other_ratio']= 	($this->data['out_b01']['El_other'] / 
													   		 $this->data['out_b01']['Total_out'])*100;
			}
		} else {
			foreach ($output_keys as $k) {
				$this->data['out_b01'][$k . '_ratio']	= 	0;
				$this->data['out_b01']['El_other_ratio']=	0;
			}
		}
		$this->data['out_b01']['Total_out_ratio'] 	= 100.0;

		//display out_b01
		$this->data['out_b01']['ROSYU'] 	= 	__('');
		$this->data['out_b01']['regene'] 	= 	__('');
		if(isset($this->data['Q11']) && $this->data['Q11'] == 1){
			$this->data['out_b01']['ROSYU'] = __('連続金属加熱炉');
		}
		elseif(isset($this->data['Q11']) && $this->data['Q11'] == 2){
			$this->data['out_b01']['ROSYU']= __('アルミ溶解炉');
		}
		elseif(isset($this->data['Q11']) && $this->data['Q11'] == 3){
			$this->data['out_b01']['ROSYU']= __('雰囲気炉');
		}
		if(isset($this->data['Q5']) && $this->data['Q5'] == 1){
			$this->data['out_b01']['regene'] = __('YES');
			$this->data['out_b01']['Texaust'] = isset($this->data['Te']) ? $this->data['Te'] :0;
		}
		else{
			$this->data['out_b01']['regene'] = __('NO');
			$this->data['out_b01']['Texaust'] = isset($this->data['Twg1']) ? $this->data['Twg1'] :0;
		}

		$this->data['page_b02']['ETA1_b03'] = 	isset($this->data['ETA_R1']) ? $this->data['ETA_R1'] : 0;
		$this->data['page_b02']['ETA2_b03'] = 	isset($this->data['page_b03']['ETA2']) ? $this->data['page_b03']['ETA2'] : 0;
		$this->data['page_b02']['Save_energy_ratio_b03'] = isset($this->data['page_b03']['Save_energy_ratio']) ? 
														   $this->data['page_b03']['Save_energy_ratio'] : 0;

		$this->data['page_b02']['Eh_fuel_b04'] = 	isset($this->data['Total_lossB02']) ? $this->data['Total_lossB02'] : 0;
		$this->data['page_b02']['Eh_fuel2_b04'] = 	isset($this->data['page_b04']['Eh_fuel2']) ? $this->data['page_b04']['Eh_fuel2'] : 0;
		$this->data['page_b02']['Save_energy_ratio_b04'] = isset($this->data['page_b04']['Save_energy_ratio']) ?
														   $this->data['page_b04']['Save_energy_ratio'] : 0;

		$this->data['page_b02']['EF1_b05'] =	isset($this->data['El_jig_t']) ? $this->data['El_jig_t'] : 0;
		$this->data['page_b02']['EF2_b05'] = 	isset($this->data['page_b05']['EF2']) ? $this->data['page_b05']['EF2'] : 0;
		$this->data['page_b02']['Save_energy_ratio_b05'] = isset($this->data['page_b05']['Save_energy_ratio']) ?
														   $this->data['page_b05']['Save_energy_ratio'] : 0;

		$this->data['page_b02']['Eh_fuel_b06'] = 	isset($this->data['Eeffect']) ? $this->data['Eeffect'] : 0;
		$this->data['page_b02']['Eh_fuel2_b06'] = 	isset($this->data['page_b06']['Eh_fuel2']) ? $this->data['page_b06']['Eh_fuel2'] : 0;
		$this->data['page_b02']['Save_energy_ratio_b06'] =	isset($this->data['page_b06']['Save_energy_ratio']) ?
															$this->data['page_b06']['Save_energy_ratio'] : 0;

		$this->data['page_b02']['ETA1_b07'] = 	isset($this->data['Mhyp']) ? $this->data['Mhyp'] : 0;
		$this->data['page_b02']['ETA2_b07'] = 	isset($this->data['page_b07']['ETA2']) ? $this->data['page_b07']['ETA2'] : 0;
		$this->data['page_b02']['Save_energy_ratio_b07'] = isset($this->data['page_b07']['Save_energy_ratio']) ?
														   $this->data['page_b07']['Save_energy_ratio'] : 0;

		$this->data['out_b01']['ETA1_b03'] = $this->data['page_b02']['ETA1_b03'];
		$this->data['out_b01']['ETA2_b03'] = $this->data['page_b02']['ETA2_b03'];
		$this->data['out_b01']['Save_energy_ratio_b03'] = isset($this->data['page_b02']['Save_energy_ratio_b03']) ? 
														  $this->data['page_b02']['Save_energy_ratio_b03'] : 0;
		$this->data['out_b01']['Eh_fuel_b04'] = $this->data['page_b02']['Eh_fuel_b04'];
		$this->data['out_b01']['Eh_fuel2_b04'] = $this->data['page_b02']['Eh_fuel2_b04'];
		$this->data['out_b01']['Save_energy_ratio_b04'] = isset($this->data['page_b02']['Save_energy_ratio_b04']) ? 
														  $this->data['page_b02']['Save_energy_ratio_b04'] : 0 ;
		$this->data['out_b01']['EF1_b05'] = $this->data['page_b02']['EF1_b05'];
		$this->data['out_b01']['EF2_b05'] = $this->data['page_b02']['EF2_b05'];
		$this->data['out_b01']['Save_energy_ratio_b05'] = isset($this->data['page_b02']['Save_energy_ratio_b05']) ?
														  $this->data['page_b02']['Save_energy_ratio_b05'] : 0;
		$this->data['out_b01']['Eh_fuel_b06'] = $this->data['page_b02']['Eh_fuel_b06'];
		$this->data['out_b01']['Eh_fuel2_b06'] = $this->data['page_b02']['Eh_fuel2_b06'];
		$this->data['out_b01']['Save_energy_ratio_b06'] = isset($this->data['page_b02']['Save_energy_ratio_b06']) ?
														  $this->data['page_b02']['Save_energy_ratio_b06'] : 0;
		$this->data['out_b01']['ETA1_b07'] = $this->data['page_b02']['ETA1_b07'];
		$this->data['out_b01']['ETA2_b07'] = $this->data['page_b02']['ETA2_b07'];
		$this->data['out_b01']['Save_energy_ratio_b07'] = isset($this->data['page_b02']['Save_energy_ratio_b07']) ?
														  $this->data['page_b02']['Save_energy_ratio_b07'] : 0;
	}

	function out_b02(){
		//Input portion
		$input_keys = array('Eh_el_accept',
							'Ereact');
		$this->data['out_b02']['Total_in'] = 0;
		foreach ($input_keys as $k) {
			if(!isset($this->data[$k])){
				$this->data[$k]	=	0;
			}
			$this->data['out_b02']['Total_in']	+=	$this->data[$k];
		}

		//Output portion
		if(!isset($this->data['El_jig'][1])){
			$this->data['El_jig'][1] = 0;
		}
		$this->data['out_b02']['Total_out'] = 0;
		$output_keys = array('Eeffect',
							 'Es_oxid',
							 'Es_atm',
							 'El_wall_t',
							 'El_opening_t',
							 'El_parts_t',
							 'El_cw_t',
							 'El_blowout_t',
							 'El_storage_t',
							 'Eaux_power_t',
							 'El_fre',
							 'El_coil',
							 'El_trans',
							 'El_terminal',
							 'El_con',
							 'El_wir',
							 'El_cl');
		foreach ($output_keys as $k) {
			if(!isset($this->data[$k])){
				$this->data[$k]	=	0;
			}
			$this->data['out_b02']['Total_out']	=	$this->data[$k]	+	$this->data['El_jig'][1];
		}
		$this->data['out_b02']['El_other']	=	$this->data['out_b02']['Total_in']	-	
												$this->data['out_b02']['Total_out'];
		$this->data['El_other']				=	$this->data['out_b02']['El_other'];
		$this->data['out_b02']['Total_out']	=	$this->data['out_b02']['Total_in'];

		//Calculate input - ratio
		if($this->data['out_b02']['Total_in']!=0){
			foreach ($input_keys as $k) {
				$this->data['out_b02'][$k.'_ratio'] = ($this->data[$k] / $this->data['out_b02']['Total_in'])*100;
			}
		} else {
			foreach ($input_keys as $k) {
				$this->data['out_b02'][$k.'_ratio'] = 0;
			}
		}
		$this->data['out_b02']['Total_in_ratio'] = 100.0;

		//Calculate output - ratio
		if ($this->data['out_b02']['Total_out'] != 0) {
			foreach ($output_keys as $k) {
				$this->data['out_b02'][$k . '_ratio']	= 	($this->data[$k]	/ $this->data['out_b02']['Total_out'])*100;
				$this->data['out_b02']['El_other_ratio']= 	($this->data['out_b02']['El_other'] / 
													   		 $this->data['out_b02']['Total_out'])*100;
				$this->data['out_b02']['El_jig_ratio']	=	($this->data['El_jig'][1] / 
													   		 $this->data['out_b02']['Total_out'])*100;
			}
		} else {
			foreach ($output_keys as $k) {
				$this->data['out_b02'][$k . '_ratio']	= 	0;
				$this->data['out_b02']['El_other_ratio']=	0;
				$this->data['out_b02']['El_jig_ratio']	=	0;
			}
		}
		$this->data['out_b02']['Total_out_ratio'] 	= 100.0;

		//display out_b02
		$this->data['page_b11']['EF1_b12'] 	= isset($this->data['Total_lossB11']) ? $this->data['Total_lossB11'] : 0;
		$this->data['page_b11']['EF2_b12'] = isset($this->data['page_b12']['EF2']) ? $this->data['page_b12']['EF2'] : 0;
		$this->data['page_b11']['Save_energy_ratio_b12'] =  isset($this->data['page_b12']['Save_energy_ratio']) ?
															$this->data['page_b12']['Save_energy_ratio'] : 0;

		$this->data['page_b11']['EF1_b13'] 	= isset($this->data['El_jig_t']) ? $this->data['El_jig_t'] : 0;
		$this->data['page_b11']['EF2_b13'] = isset($this->data['page_b13']['EF2']) ? $this->data['page_b13']['EF2'] : 0;
		$this->data['page_b11']['Save_energy_ratio_b13'] = isset($this->data['page_b13']['Save_energy_ratio']) ?
														   $this->data['page_b13']['Save_energy_ratio'] : 0;

		$this->data['page_b11']['EF1_b14'] 	= isset($this->data['Eeffect']) ? $this->data['Eeffect'] : 0;
		$this->data['page_b11']['EF2_b14'] = isset($this->data['page_b14']['EF2']) ? $this->data['page_b14']['EF2'] : 0;
		$this->data['page_b11']['Save_energy_ratio_b14'] = isset($this->data['page_b14']['Save_energy_ratio']) ?
														   $this->data['page_b14']['Save_energy_ratio'] : 0;

		$this->data['page_b11']['EF1_b15'] 	= isset($this->data['Total100']) ? $this->data['Total100'] : 0;
		$this->data['page_b11']['EF2_b15'] = isset($this->data['page_b15']['EF2']) ? $this->data['page_b15']['EF2'] : 0;
		$this->data['page_b11']['Save_energy_ratio_b15'] = isset($this->data['page_b15']['Save_energy_ratio']) ?
														   $this->data['page_b15']['Save_energy_ratio'] : 0;

		$this->data['out_b02']['EF1_b12'] 	= $this->data['page_b11']['EF1_b12'];
		$this->data['out_b02']['EF2_b12'] 	= $this->data['page_b11']['EF2_b12'];
		$this->data['out_b02']['Save_energy_ratio_b12'] = 
											  $this->data['page_b11']['Save_energy_ratio_b12'];

		$this->data['out_b02']['EF1_b13'] 	= $this->data['page_b11']['EF1_b13'];
		$this->data['out_b02']['EF2_b13'] 	= $this->data['page_b11']['EF2_b13'];
		$this->data['out_b02']['Save_energy_ratio_b13'] = 
											  $this->data['page_b11']['Save_energy_ratio_b13'];

		$this->data['out_b02']['EF1_b14'] 	= $this->data['page_b11']['EF1_b14'];
		$this->data['out_b02']['EF2_b14'] 	= $this->data['page_b11']['EF2_b14'];
		$this->data['out_b02']['Save_energy_ratio_b14'] = 
											  $this->data['page_b11']['Save_energy_ratio_b14'];

		$this->data['out_b02']['EF1_b15'] 	= $this->data['page_b11']['EF1_b15'];
		$this->data['out_b02']['EF2_b15'] 	= $this->data['page_b11']['EF2_b15'];
		$this->data['out_b02']['Save_energy_ratio_b15'] = 
											  $this->data['page_b11']['Save_energy_ratio_b15'];
	}

	public function energy_input(){
		$this->common();
		$this->out();
		$this->out_02();
		$this->out_03();
		$this->out_04();
		$this->out_05();
		$this->out_06();
		$this->out_07();
		$this->out_08();
		$this->out_09();
		$this->out_10();
		$this->out_11();
		$this->out_12();
		$this->out_13();
		$this->out_14();
		$this->out_15();
		$this->out_16();
		$this->input['data'] = $this->data;
	}
		   
    function common() {    	
		$arrVar = array('El_t', 
    					'El_fre', 
    					'El_coil', 
    					'El_trans', 
    					'El_terminal', 
    					'El_con', 
    					'El_wir', 
    					'El_cl');
		foreach($arrVar as $varItem){
			if(!isset($this->data[$varItem])){
				$this->data[$varItem] = 0;
			}		
		}
		
		$keys = array('Eaux_blower_t',
						'Eaux_comp_t',
						'Eaux_pump_t',
						'Eaux_ot_t',
						'Eaux_power_t',
						'Eh_el',
						'Eu_oxy',
						'Eu_atm',
						'El_t'
						);
		
		$this->data['Ee_total'] = 0;
		foreach($keys as $k){			
			if(!isset($this->data[$k])){
				$this->data[$k] = 0;
			}
			$this->data['Ee_total'] = $this->data['Ee_total'] + $this->data[$k];
		}

		$this->data['Etae'] = (isset($this->data['Etae'])) ? $this->data['Etae'] : 0;

		$this->data['Efe_el'] = 0;
		if($this->data['Etae'] != 0){
			$this->data['Efe_el'] = $this->data['Ee_total']/($this->data['Etae']/100.0);
		}
		
		// !El_eg
		$this->data['El_eg'] = $this->data['Efe_el'] - $this->data['Ee_total'];
		
		
		$this->data['Es_atm'] = (isset($this->data['Es_atm']))? $this->data['Es_atm'] : 0;
    }
    
    function out() {
    	$this->data['Furnace_Type'] = '';
    	if(isset($this->data['Q11']) && $this->data['Q11'] == 1) {
    		$this->data['Furnace_Type'] = __('連続式金属加熱炉');
    	}
    	
		if(isset($this->data['Q11']) && $this->data['Q11'] == 2) {
			$this->data['Furnace_Type'] = __('アルミ溶解炉');
		}
		
		if(isset($this->data['Q11']) && $this->data['Q11'] == 3) {
			$this->data['Furnace_Type'] = __('雰囲気炉');
		}
		
		if(isset($this->data['Q5']) && $this->data['Q5'] == 1) { //if(q5.eq.1) then
			$this->data['Es_air'] = (isset($this->data['Es_air']))? $this->data['Es_air']: 0;
			$this->data['Erecovery_reg'] = (isset($this->data['Erecovery_reg']))? $this->data['Erecovery_reg']: 0;			
			$this->data['Es_air2'] = $this->data['Es_air'] + $this->data['Erecovery_reg']; // Es_air2=Es_air+Erecovery_reg;

			$this->data['Ta1'] = (isset($this->data['Ta1']))? $this->data['Ta1']: 0;
			$this->data['Ta2'] = 0;
			if($this->data['Es_air']!=0){
				$this->data['Ta2'] = ($this->data['Ta1']/$this->data['Es_air']) * $this->data['Es_air2']; // Ta2=Ta1/Es_air*Es_air2
			}
		}

		$this->data['Regene'] = '';
		if(isset($this->data['Q5']) && $this->data['Q5'] == 1) {
			$this->data['Regene'] = __('YES');
		}
		
		if(isset($this->data['Q5']) && $this->data['Q5'] != 1) {
			$this->data['Regene'] = __('NO');
		}

		$this->data['TPE_name'] = (isset($this->data['TPE_name'])) ? $this->data['TPE_name'] : '';
		$this->data['Fuel_name'] = (isset($this->data['Fuel_name'])) ? $this->data['Fuel_name'] : '';

		$arrVar = array('Type', 
						'TPH', 
						'Tp1', 
						'Tp2', 
						'Mloss', 
						'Hl', 
						'Vf', 
						'Vme', 
						'Ta2', 
						'Twg1',
						'Te',
						'Fg_O2D');		
		foreach($arrVar as $varItem){
			if(!isset($this->data[$varItem])){
				$this->data[$varItem] = 0;
			}		
		}
    }
    
    function out_02() {
    	// INPUT portion
    	$this->data['Eu_atm_gen'] = 0;				
		$input_keys = array('Eh_fuel', 
						'Eh_waste', 
						'Eu_atm', 
						'Efe_el', 
						'Es_fuel', 
						'Es_air', 
						'Es_atmize', 
						'Ereact', 
						'Es_infilt');

		$this->data['out_02']['Total_in'] = 0;
		foreach($input_keys as $k){
			if(!isset($this->data[$k])){
				$this->data[$k] = 0;
			}
			$this->data['out_02']['Total_in'] += $this->data[$k];
		}
		
		// $this->data['out_02']['El_other'] = $this->data['out_02']['Total_in'] - 2710000;
		$this->data['El_other'] = (isset($this->data['El_other']))?$this->data['El_other'] : 0;
		$this->data['out_02']['El_other'] = $this->data['El_other'];
		
		// OUTPUT portion
		$output_keys = array('Eeffect' , 
						'El_jig_t' , 
						'Es_oxid' , 
						'Eexhaust' , 
						'Es_atm' , 
						'El_wall_t' , 
						'El_opening_t' , 
						'El_parts_t' , 
						'El_cw_t' , 
						'El_blowout_t' , 
						'El_storage_t' , 	
						'El_ot_t',
						'Eaux_blower_t' , 
						'Eaux_comp_t' , 
						'Eaux_pump_t' , 
						'Eaux_power_t' , 
						'Eaux_ot_t' , 
						'El_t' , 
						'Eu_oxy' , 
						'Eu_atm_gen' , 
						'Eu_atm' , 
						'El_eg',
						'El_el_site');

		// $this->data['out_02']['Total_out'] =  $this->data['out_02']['El_other'];
		$this->data['out_02']['Total_out'] =  0;
		foreach($output_keys as $k){
			if(!isset($this->data[$k])){
				$this->data[$k] = 0;
			}
			$this->data['out_02']['Total_out'] += $this->data[$k];
		}

		$this->data['El_other'] = $this->data['out_02']['Total_in'] - $this->data['out_02']['Total_out'];

		$this->data['out_02']['El_other'] = $this->data['El_other'];

		$this->data['out_02']['Total_out'] = $this->data['out_02']['Total_in'];
		
		$this->data['El_other'] = $this->data['out_02']['El_other'];
		//canculate INPUT - ratio
		
		if($this->data['out_02']['Total_in']!=0){		
			foreach ($input_keys as $k) {				
				$this->data['out_02'][$k.'_ratio'] = ($this->data[$k] / $this->data['out_02']['Total_in'])*100;
			}		
		}else{
			foreach ($input_keys as $k) {
				$this->data['out_02'][$k.'_ratio'] = 0;
			}	
		}
		$this->data['out_02']['Total_in_ratio'] = 100.0;

		//Canculate OUTPUT - ratio
		if($this->data['out_02']['Total_out']!=0){
			foreach ($output_keys as $k) {
				if($k == 'Eu_atm'){
					$this->data['out_02'][$k . '_out_ratio']	= 	($this->data[$k]	/ $this->data['out_02']['Total_out'])*100;
				}else{
					$this->data['out_02'][$k . '_ratio']	= 	($this->data[$k]	/ $this->data['out_02']['Total_out'])*100;
				}
			}
			$this->data['out_02']['El_other_ratio'] 	= 	($this->data['out_02']['El_other']	/
													  		$this->data['out_02']['Total_out'])*100;			
		}else{
			foreach ($output_keys as $k) {
				if($k == 'Eu_atm'){
					$this->data['out_02'][$k . '_out_ratio']	= 	0;
				}else{
					$this->data['out_02'][$k . '_ratio']	= 	0;
				}
			}
			$this->data['out_02']['El_other_ratio'] 	= 	0;
		}

		$this->data['out_02']['Total_out_ratio'] = 100.0;
    }
    
    
    function out_03() {    	
    	// INPUT portion
		$this->data['Efe_el'] = (isset($this->data['Efe_el'])) ? $this->data['Efe_el']:0;

		$this->data['out_03']['Total_in'] = $this->data['Efe_el'];
		
		// OUTPUT portion
		$output_keys = array('Eh_el'	,
						'El_fre'		,
						'El_coil'		,
						'El_trans'		,
						'El_terminal'	,
						'El_con'		,
						'El_wir'		,
						'El_cl'			,
						'Eaux_blower_t'	,
						'Eaux_comp_t'	,
						'Eaux_pump_t'	,
						'Eaux_power_t'	,
						'Eaux_ot_t'		,
						'Eu_oxy'		,
						'Eu_atm_gen'	,
						'El_el_site'	,
						'El_eg');
		$this->data['out_03']['Total_out']	= 0;
		foreach($output_keys as $k){
			if(!isset($this->data[$k])){	
				$this->data[$k] = 0;
			}
			$this->data['out_03']['Total_out']	+= $this->data[$k];
		}
		
		//canculate INPUT - ratio
		$this->data['out_03']['Total_in_ratio'] 	= 100.0;
		$this->data['out_03']['Efe_el_ratio'] 		= $this->data['out_03']['Total_in_ratio'];
		
		
		//Canculate OUTPUT - ratio
		if($this->data['out_03']['Total_out']!=0){	
			foreach ($output_keys as $k) {
				$this->data['out_03'][$k . '_ratio']	= 	($this->data[$k]	/ $this->data['out_03']['Total_out'])*100;
			}
		}else{
			foreach ($output_keys as $k) {
				$this->data['out_03'][$k . '_ratio']	= 	0;
			}
		}
		$this->data['out_03']['Total_out_ratio'] 	= 100.0;
    }
    
    function out_04() {
    	//INPUT portion.
    	$input_keys = array('Eh_el_accept', 
    						'Ereact');

    	$this->data['out_04']['Total_in'] = 0;
		foreach($input_keys as $k){
			if(!isset($this->data[$k])){
				$this->data[$k] = 0;
			}
			$this->data['out_04']['Total_in'] += $this->data[$k] ;
		}
		
		$this->data['out_04']['Total_out'] = $this->data['out_04']['Total_in'];

		//OUTPUT portion.
		$this->data['El_jig'][1] = (isset($this->data['El_jig'][1]))?$this->data['El_jig'][1]:0;
		$tmpSum = $this->data['El_jig'][1];
		$output_keys = array('Eeffect',												
				'Es_oxid',														
				'Es_atm',														
				'El_wall_t',													
				'El_opening_t',													
				'El_parts_t',														
				'El_cw_t',														
				'El_storage_t',													
				'El_ot_t',														
				'El_fre',														
				'El_coil',														
				'El_trans',													
				'El_terminal',													
				'El_con',															
				'El_wir',															
				'El_cl');																	
		foreach($output_keys as $k){
			if(!isset($this->data[$k])){
				$this->data[$k] = 0;
			}
			$tmpSum += $this->data[$k];
		}
		
		$this->data['out_04']['El_other'] = $this->data['out_04']['Total_in'] - $tmpSum;
		$this->data['out_04']['Total_out'] = $this->data['out_04']['Total_in'];

		$this->data['El_other'] = $this->data['out_04']['El_other'];
		
		//canculate INPUT - ratio
		if($this->data['out_04']['Total_in']!=0){
			foreach ($input_keys as $k) {
				$this->data['out_04'][$k.'_ratio'] = ($this->data[$k] / $this->data['out_04']['Total_in'])*100;
			}
		}else{
			foreach ($input_keys as $k) {
				$this->data['out_04'][$k.'_ratio'] = 0;
			}
		}
		$this->data['out_04']['Total_in_ratio']		=	100.0;
				
		//Canculate OUTPUT - ratio
		if($this->data['out_04']['Total_out']!=0){										
			foreach ($output_keys as $k) {
				$this->data['out_04'][$k . '_ratio']	= 	($this->data[$k] / $this->data['out_04']['Total_out'])*100;
			}			
			$this->data['out_04']['El_jig_ratio']			=	($this->data['El_jig'][1]		/
																$this->data['out_04']['Total_out'])*100;			
			$this->data['out_04']['El_other_ratio']			=	($this->data['out_04']['El_other']	/
																$this->data['out_04']['Total_out'])*100;
		}else{
			foreach ($output_keys as $k) {
				$this->data['out_04'][$k . '_ratio']	= 	0;
			}	
			$this->data['out_04']['El_jig_ratio']			=	0;
			$this->data['out_04']['El_other_ratio']			=	0;
		}
		$this->data['out_04']['Total_out_ratio']		=	100.0;    	
    }
    
    
    function out_05() {
    	//INPUT portion.
    	$this->data['out_05']['Total_in'] = 0;
    	$input_keys = array('Eh_fuel', 	
		'Eh_waste', 	
		'Es_fuel', 	 
		'Es_air', 		
		'Es_atmize', 	 
		'Ereact', 		
		'Es_infilt');
		foreach($input_keys as $k){
			if(!isset($this->data[$k])){
				$this->data[$k] = 0;
			}
			$this->data['out_05']['Total_in'] += $this->data[$k];
		}

		//OUTPUT portion.
		$tmpSum = 0;
		$output_keys = array('Eeffect', 			
				'El_jig_t', 			
				'Es_oxid',
				'Eexhaust',	 						
				'Es_atm', 				 
				'El_wall_t', 			
				'El_opening_t', 		
				'El_parts_t', 			
				'El_cw_t', 			 
				'El_blowout_t', 
				'El_storage_t', 
				'El_ot_t');
		foreach($output_keys as $k){
			if(!isset($this->data[$k])){
				$this->data[$k] = 0;
			}
			$tmpSum += $this->data[$k];
		}

		$this->data['out_05']['El_other'] = 	$this->data['out_05']['Total_in']	- $tmpSum;

		$this->data['El_other'] = $this->data['out_05']['El_other'];

		$this->data['out_05']['Total_out'] = $this->data['out_05']['Total_in'];

		//canculate INPUT - ratio
		if($this->data['out_05']['Total_in']!=0){
			foreach ($input_keys as $k) {
				$this->data['out_05'][$k.'_ratio'] = ($this->data[$k] / $this->data['out_05']['Total_in'])*100;
			}
		}else{
			foreach ($input_keys as $k) {
				$this->data['out_05'][$k.'_ratio'] = 0;
			}
		}
		$this->data['out_05']['Total_in_ratio']	=	100.0;		

		//Canculate OUTPUT - ratio
		if($this->data['out_05']['Total_out']!=0){
			foreach ($output_keys as $k) {
				$this->data['out_05'][$k.'_ratio'] = ($this->data[$k] / $this->data['out_05']['Total_out'])*100;
			}
			$this->data['out_05']['El_other_ratio']		=	($this->data['out_05']['El_other']/
																$this->data['out_05']['Total_out'])*100;
		}else{
			foreach ($output_keys as $k) {
				$this->data['out_05'][$k.'_ratio'] = 0;
			}
			$this->data['out_05']['El_other_ratio']	= 0;
		}
    	$this->data['out_05']['Total_out_ratio']	=	100.0;
    }
    
    
    function out_06() {
    	//INPUT portion.
    	$this->data['out_06']['Total_in'] = 0;
    	$input_keys = array('Eh_fuel', 		
			'Eh_el_accept', 	
			'Eh_waste', 		
			'Es_fuel', 		
			'Es_air', 			
			'Erecovery', 		
			'Es_atmize', 		
			'Ereact', 			
			'Es_infilt');
    	foreach($input_keys as $k){
			if(!isset($this->data[$k])){
				$this->data[$k] = 0;
			}
			$this->data['out_06']['Total_in'] += $this->data[$k] ;
		}

		//OUTPUT portion.
		$tmpSum = 0;
		$output_keys = array('Eeffect', 			
			'El_jig_t', 			
			'Es_oxid', 			
			'Eexhaust_hc', 		
			'Es_atm', 				
			'El_wall_t', 			
			'El_opening_t', 		
			'El_parts_t', 			
			'El_cw_t', 			
			'El_blowout_t', 		
			'El_storage_t', 		
			'El_ot_t',				
			'El_fre', 				
			'El_coil', 			
			'El_trans', 			
			'El_terminal', 		
			'El_con', 				
			'El_wir', 				
			'El_cl');												
		foreach($output_keys as $k){
			if(!isset($this->data[$k])){
				$this->data[$k] = 0;
			}
			$tmpSum += $this->data[$k];
		}

		$this->data['out_06']['El_other'] = 	$this->data['out_06']['Total_in'] - $tmpSum;											

		$this->data['El_other'] = $this->data['out_06']['El_other'];

		$this->data['out_06']['Total_out'] = $this->data['out_06']['Total_in'];
				
		//canculate INPUT - ratio
		if($this->data['out_06']['Total_in']!=0){
			foreach ($input_keys as $k) {
				$this->data['out_06'][$k.'_ratio'] = ($this->data[$k] / $this->data['out_06']['Total_in'])*100;
			}
		}else{
			foreach ($input_keys as $k) {
				$this->data['out_06'][$k.'_ratio'] = 0;
			}
		}
		$this->data['out_06']['Total_in_ratio']	=	100.0;

		//Canculate OUTPUT - ratio
		if($this->data['out_06']['Total_out']!=0){
			foreach ($output_keys as $k) {
				$this->data['out_06'][$k . '_ratio'] = ($this->data[$k]	/ $this->data['out_06']['Total_out'])*100;
			}
			$this->data['out_06']['El_other_ratio']		=	($this->data['out_06']['El_other']	/
																$this->data['out_06']['Total_out'])*100;
		}else{
			foreach ($output_keys as $k) {
				$this->data['out_06'][$k . '_ratio']	= 	0;
			}
			$this->data['out_06']['El_other_ratio']		=	0;			
		}
    	$this->data['out_06']['Total_out_ratio']	=	100.0;
    }
    
    
    function out_07() {
    	//INPUT portion.
    	$this->data['out_07']['Total_in'] = 0;
    	$input_keys = array('Eh_fuel', 
			'Eh_waste', 
			'Es_fuel', 
			'Es_air', 
			'Erecovery', 
			'Es_atmize', 
			'Ereact', 
			'Es_infilt');
    	foreach($input_keys as $k){
			if(!isset($this->data[$k])){
				$this->data[$k] = 0;
			}
			$this->data['out_07']['Total_in'] += $this->data[$k];
		}

		//OUTPUT portion.
		$tmpSum = 0;
		$output_keys = array('Eeffect', 			
			'El_jig_t', 			
			'Es_oxid', 			
			'Eexhaust_hc', 		
			'Es_atm', 				
			'El_wall_t', 			
			'El_opening_t', 		
			'El_parts_t', 			
			'El_cw_t', 			
			'El_blowout_t', 		
			'El_storage_t',		
			'El_ot_t');
										
		foreach($output_keys as $k){
			if(!isset($this->data[$k])){
				$this->data[$k] = 0;
			}
			$tmpSum += $this->data[$k];
		}

		$this->data['out_07']['El_other'] = $this->data['out_07']['Total_in']	- $tmpSum;
		$this->data['El_other'] = $this->data['out_07']['El_other'];

		$this->data['out_07']['Total_out'] = $this->data['out_07']['Total_in'];

		//canculate INPUT - ratio
		if($this->data['out_07']['Total_in']){
			foreach ($input_keys as $k) {
				$this->data['out_07'][$k.'_ratio'] = ($this->data[$k] / $this->data['out_07']['Total_in'])*100;
			}
		}else{
			foreach ($input_keys as $k) {
				$this->data['out_07'][$k.'_ratio'] = 0;
			}
		}
		$this->data['out_07']['Total_in_ratio']	=	100.0;
		
		//Canculate OUTPUT - ratio
		if($this->data['out_07']['Total_out']!=0){
			foreach ($output_keys as $k) {
				$this->data['out_07'][$k . '_ratio']	= 	($this->data[$k] / $this->data['out_07']['Total_out'])*100;
			}

			$this->data['out_07']['El_other_ratio']		=	($this->data['out_07']['El_other']	/
																$this->data['out_07']['Total_out'])*100;
		}else{
			foreach ($output_keys as $k) {
				$this->data['out_07'][$k . '_ratio']	= 	0;
			}
			$this->data['out_07']['El_other_ratio']		=	0;			
		}
    	$this->data['out_07']['Total_out_ratio']	=	100.0;
    }
    
    
    function out_08() {
    	if(isset($this->data['Q11']) && $this->data['Q11']==1){
			if(isset($this->data['Ibd1']) && $this->data['Ibd1']==1){ 
				$totalin11_sum_keys = array('Efe_el','Eh_fuel','Es_fuel','Es_air', 'Ereact');
				
				$this->data['out_08']['totalin11'] = 0;
				foreach ($totalin11_sum_keys as $k) {
					if(!isset($this->data[$k])){
						$this->data[$k] = 0;
					}
					$this->data['out_08']['totalin11'] += $this->data[$k];
				}
				
				// ! 補機等電力計算
				$Eaux_keys = array('Eaux_blower_t', 'Eaux_comp_t', 'Eaux_pump_t', 'Eaux_power_t', 'Eaux_ot_t');
				$this->data['out_08']['Eaux'] = 0;
				foreach ($Eaux_keys as $k) {
					if(!isset($this->data[$k])){
						$this->data[$k] = 0;
					}
					$this->data['out_08']['Eaux'] += $this->data[$k];
				}
				
				$totalout11_keys = array('Eeffect', 'Es_oxid', 'El_wall_t', 'El_cw_t', 'El_opening_t', 'Eexhaust', 'El_other', 'El_eg');
				$this->data['out_08']['totalout11'] = 0;
				foreach ($totalout11_keys as $k) {
					if(!isset($this->data[$k])){
						$this->data[$k] = 0;
					}
					$this->data['out_08']['totalout11'] += $this->data[$k];
				}

				$this->data['out_08']['totalout11'] =  $this->data['out_08']['totalout11'] + $this->data['out_08']['Eaux'];

				$this->data['DE'] = $this->data['out_08']['totalin11'] - $this->data['out_08']['totalout11'];

				$this->data['El_other'] = $this->data['El_other'] - $this->data['DE'];

				$this->data['out_08']['totalout11'] = $this->data['out_08']['totalin11'];

				$totalin11_keys = array('Efe_el', 
										'Eh_fuel', 
										'Es_fuel',
										'Es_air', 
										'Ereact', 
										'Eeffect', 
										'Es_oxid', 
										'El_wall_t', 
										'El_cw_t', 
										'El_opening_t',
										'Eexhaust', 
										'El_other', 
										'El_eg');
				if($this->data['out_08']['totalin11']!=0){
					foreach ($totalin11_keys as $k) {
						$this->data['out_08']['P' . $k]	= 	($this->data[$k] / $this->data['out_08']['totalin11'])*100;
					}

					$this->data['out_08']['PEaux']	= ($this->data['out_08']['Eaux'] / $this->data['out_08']['totalin11'])*100;

				}else{
					foreach ($totalin11_keys as $k) {
						$this->data['out_08']['P' . $k]	= 0;
					}

					$this->data['out_08']['PEaux'] = 0;
				}
			} // End: Ibd1 == 1
		}
    }
    
    
    function out_09() {
    	if(isset($this->data['Q11']) && $this->data['Q11']==1){
			if(isset($this->data['Ibd2']) && $this->data['Ibd2']==1){
				$totalin11_sum_keys = array('Eh_fuel','Es_fuel','Es_air','Ereact');
				$this->data['out_09']['totalin11'] = 0;
				foreach ($totalin11_sum_keys as $k) {
					if(!isset($this->data[$k])){
						$this->data[$k] = 0;
					}
					$this->data['out_09']['totalin11'] += $this->data[$k];
				}

				$totalout11_keys = array('Eeffect','Es_oxid','El_wall_t','El_cw_t','El_opening_t','Eexhaust','El_other');
				$this->data['out_09']['totalout11'] = 0;
				foreach ($totalout11_keys as $k) {
					if(!isset($this->data[$k])){
						$this->data[$k] = 0;
					}
					$this->data['out_09']['totalout11'] += $this->data[$k];
				}

				$this->data['DE'] = $this->data['out_09']['totalin11'] - $this->data['out_09']['totalout11'];

				$this->data['El_other'] = $this->data['El_other'] - $this->data['DE'];

				$this->data['out_09']['totalout11'] = $this->data['out_09']['totalin11'];

				$totalin11_keys = array('Eh_fuel', 'Es_fuel', 'Es_air', 'Ereact', 'Eeffect', 'Es_oxid', 'El_wall_t', 'El_cw_t', 'El_opening_t', 'Eexhaust', 'El_other');				
				if($this->data['out_09']['totalin11']!=0){
					foreach ($totalin11_keys as $k) {
						$this->data['out_09']['P' . $k]	= ($this->data[$k] / $this->data['out_09']['totalin11'])*100;
					}					
				}else{
					foreach ($totalin11_keys as $k) {
						$this->data['out_09']['P' . $k]	= 0;
					}	
				}
			} // End: Ibd2 == 1
		}
    	
    }
    
    function out_10() {
    	if(isset($this->data['Q11']) && $this->data['Q11']==1){
			if(isset($this->data['Ibd3']) && $this->data['Ibd3']==1){

				$totalin11_sum_keys = array('Eh_fuel','Es_fuel','Es_air','Ereact','Erecovery');
				$this->data['out_10']['totalin11'] = 0;
				foreach ($totalin11_sum_keys as $k) {
					if(!isset($this->data[$k])){
						$this->data[$k] = 0;
					}
					$this->data['out_10']['totalin11'] += $this->data[$k];
				}
				
				$totalout11_keys = array('Eeffect','Es_oxid','El_wall_t','El_cw_t','El_opening_t','Eexhaust_hc','El_other');
				$this->data['out_10']['totalout11'] =  0;
				foreach ($totalout11_keys as $k) {
					if(!isset($this->data[$k])){
						$this->data[$k] = 0;
					}
					$this->data['out_10']['totalout11'] += $this->data[$k];
				}

				$this->data['DE'] = $this->data['out_10']['totalin11'] - $this->data['out_10']['totalout11'];
				$this->data['El_other'] = $this->data['El_other'] - $this->data['DE'];

				$this->data['out_10']['totalout11'] = $this->data['out_10']['totalin11'];

				$totalin11_keys = array('Eh_fuel','Es_fuel','Es_air','Ereact','Erecovery','Eeffect','Es_oxid','El_wall_t','El_cw_t','El_opening_t','Eexhaust_hc','El_other');
				if($this->data['out_10']['totalin11']!=0){
					foreach ($totalin11_keys as $k) {
						$this->data['out_10']['P' . $k]	= 	($this->data[$k] / $this->data['out_10']['totalin11'])*100;
					}						
				}else{
					foreach ($totalin11_keys as $k) {
						$this->data['out_10']['P' . $k]	= 0;
					}
				}
			} // End: Ibd3 == 1
		}    	
    }
    
    function out_11() {
    	if(isset($this->data['Q11']) && $this->data['Q11']==2){
			if(isset($this->data['Ibd1']) && $this->data['Ibd1']==1){ 

				$totalin11_sum_keys = array('Efe_el','Eh_fuel','Es_fuel','Es_air','Ereact');
				$this->data['out_11']['totalin11'] = 0;
				foreach ($totalin11_sum_keys as $k) {
					if(!isset($this->data[$k])){
						$this->data[$k] = 0;
					}
					$this->data['out_11']['totalin11'] += $this->data[$k];
				}
				
				// ! 補機等電力計算
				$Eaux_keys = array('Eaux_blower_t','Eaux_comp_t','Eaux_pump_t','Eaux_power_t','Eaux_ot_t');
				$this->data['out_11']['Eaux'] = 0;
				foreach ($Eaux_keys as $k) {
					if(!isset($this->data[$k])){
						$this->data[$k] = 0;
					}
					$this->data['out_11']['Eaux'] += $this->data[$k];
				}

				$totalout11_keys = array('Eeffect','Es_oxid','El_storage_t','El_wall_t','El_cw_t','Eexhaust','El_other', 'El_eg');
				$this->data['out_11']['totalout11'] = 0;
				foreach ($totalout11_keys as $k) {
					if(!isset($this->data[$k])){
						$this->data[$k] = 0;
					}
					$this->data['out_11']['totalout11'] += $this->data[$k];
				}

				$this->data['out_11']['totalout11'] = $this->data['out_11']['totalout11'] + $this->data['out_11']['Eaux'];

				$this->data['DE'] = $this->data['out_11']['totalin11'] - $this->data['out_11']['totalout11'];
				$this->data['El_other'] = $this->data['El_other'] - $this->data['DE'];

				$this->data['out_11']['totalout11'] = $this->data['out_11']['totalin11'];

				$totalin11_keys = array('Efe_el','Eh_fuel','Es_fuel','Es_air','Ereact', 'Eeffect','Es_oxid','El_storage_t','El_wall_t','El_cw_t','Eexhaust','El_other', 'El_eg');
				if($this->data['out_11']['totalin11']!=0){
					foreach ($totalin11_keys as $k) {
						$this->data['out_11']['P' . $k]	= 	($this->data[$k] / $this->data['out_11']['totalin11'])*100;
					}
					
					$this->data['out_11']['PEaux'] 	= ($this->data['out_11']['Eaux'] / $this->data['out_11']['totalin11'])*100;
				}else{
					foreach ($totalin11_keys as $k) {
						$this->data['out_11']['P' . $k]	= 0;
					}
					
					$this->data['out_11']['PEaux'] 	= 0;
				}
			} // End: Ibd1 == 1
		}
    	
    }
    
    
    function out_12() {
    	if(isset($this->data['Q11']) && $this->data['Q11']==2){
			if(isset($this->data['Ibd2']) && $this->data['Ibd2']==1){

				$totalin11_sum_keys = array('Eh_fuel','Es_fuel','Es_air','Ereact');
				$this->data['out_12']['totalin11'] = 0;
				foreach ($totalin11_sum_keys as $k) {
					if(!isset($this->data[$k])){
						$this->data[$k] = 0;
					}
					$this->data['out_12']['totalin11'] += $this->data[$k];
				}

				$totalout11_keys = array('Eeffect','Es_oxid','El_wall_t','El_cw_t','El_storage_t','Eexhaust','El_other');
				$this->data['out_12']['totalout11'] = 0;
				foreach ($totalout11_keys as $k) {
					if(!isset($this->data[$k])){
						$this->data[$k] = 0;
					}
					$this->data['out_12']['totalout11'] += $this->data[$k];
				}
			
				$this->data['DE'] = $this->data['out_12']['totalin11'] - $this->data['out_12']['totalout11'];
				$this->data['El_other'] = $this->data['El_other'] - $this->data['DE'];

				$this->data['out_12']['totalout11'] = $this->data['out_12']['totalin11'];

				$totalin11_keys = array('Eh_fuel','Es_fuel','Es_air','Ereact','Eeffect','Es_oxid','El_wall_t','El_cw_t','El_storage_t','Eexhaust','El_other');
				if($this->data['out_12']['totalin11']!=0){
					foreach ($totalin11_keys as $k) {
						$this->data['out_12']['P' . $k]	= 	($this->data[$k] / $this->data['out_12']['totalin11'])*100;
					}					
				}else{
					foreach ($totalin11_keys as $k) {
						$this->data['out_12']['P' . $k]	= 0;
					}	
				}
			} // End: Ibd2 == 1
		}
    }
    
    function out_13() {
    	if(isset($this->data['Q11']) && $this->data['Q11']==2){
			if(isset($this->data['Ibd3']) && $this->data['Ibd3']==1){

				$totalin11_sum_keys = array('Eh_fuel','Es_fuel','Es_air','Ereact','Erecovery');
				$this->data['out_13']['totalin11'] = 0;
				foreach ($totalin11_sum_keys as $k) {
					if(!isset($this->data[$k])){
						$this->data[$k] = 0;
					}
					$this->data['out_13']['totalin11'] += $this->data[$k];
				}
			

				$totalout11_keys = array('Eeffect','Es_oxid','El_wall_t','El_cw_t','El_storage_t','Eexhaust_hc','El_other');
				$this->data['out_13']['totalout11'] = 0;
				foreach ($totalout11_keys as $k) {
					if(!isset($this->data[$k])){
						$this->data[$k] = 0;
					}
					$this->data['out_13']['totalout11'] += $this->data[$k];
				}

				$this->data['DE'] = $this->data['out_13']['totalin11'] - $this->data['out_13']['totalout11'];
				$this->data['El_other'] = $this->data['El_other'] - $this->data['DE'];

				$this->data['out_13']['totalout11'] = $this->data['out_13']['totalin11'];

				$totalin11_keys = array('Eh_fuel','Es_fuel','Es_air','Ereact','Erecovery','Eeffect','Es_oxid','El_wall_t','El_cw_t','El_storage_t','Eexhaust_hc','El_other');
				if($this->data['out_13']['totalin11']!=0){
					foreach ($totalin11_keys as $k) {
						$this->data['out_13']['P' . $k]	= 	($this->data[$k] / $this->data['out_13']['totalin11'])*100;
					}	
				}else{
					foreach ($totalin11_keys as $k) {
						$this->data['out_13']['P' . $k]	= 0;
					}
				}
			} // End: Ibd3 == 1
		}
    }
    
    
    function out_14() {
    	if(isset($this->data['Q11']) && $this->data['Q11']==3){
			if(isset($this->data['Ibd1']) && $this->data['Ibd1']==1){ 

				$totalin11_sum_keys = array('Efe_el','Eh_fuel','Es_fuel','Es_air','Eu_atm_cal');
				$this->data['out_14']['totalin11'] = 0;
				foreach ($totalin11_sum_keys as $k) {
					if(!isset($this->data[$k])){
						$this->data[$k] = 0;
					}
					$this->data['out_14']['totalin11'] += $this->data[$k];
				}
				
				// ! 補機等電力計算
				$Eaux_keys = array('Eaux_blower_t','Eaux_comp_t','Eaux_pump_t','Eaux_power_t','Eaux_ot_t');
				$this->data['out_14']['Eaux'] = 0;
				foreach ($totalin11_sum_keys as $k) {
					if(!isset($this->data[$k])){
						$this->data[$k] = 0;
					}
					$this->data['out_14']['Eaux'] += $this->data[$k];
				}

				$totalout11_keys = array('Eeffect','El_jig_t','El_wall_t','El_cw_t','El_parts_t','El_opening_t','Eexhaust','El_other','Es_atm','El_eg','Eu_atm_cal','Eu_atm_gen');
				$this->data['out_14']['totalout11'] = 0;
				foreach ($totalout11_keys as $k) {
					if(!isset($this->data[$k])){
						$this->data[$k] = 0;
					}
					$this->data['out_14']['totalout11'] += $this->data[$k];
				}

				$this->data['out_14']['totalout11'] = 	$this->data['out_14']['totalout11'] + $this->data['out_14']['Eaux'] ;

				$this->data['DE'] = $this->data['out_14']['totalin11'] - $this->data['out_14']['totalout11'];
				$this->data['El_other'] = $this->data['El_other'] - $this->data['DE'];

				$this->data['out_14']['totalout11'] = $this->data['out_14']['totalin11'];

				$totalin11_keys = array('Efe_el','Eh_fuel','Es_fuel','Es_air','Eu_atm_cal', 'Eeffect','El_jig_t','El_wall_t','El_cw_t','El_parts_t','El_opening_t','Eexhaust','El_other','Es_atm','El_eg','Eu_atm_cal','Eu_atm_gen');
				if($this->data['out_14']['totalin11']!=0){
					foreach ($totalin11_keys as $k) {
						$this->data['out_14']['P' . $k]	= 	($this->data[$k] / $this->data['out_14']['totalin11'])*100;
					}	
					
					$this->data['out_14']['PEaux'] 	= ($this->data['out_14']['Eaux'] / $this->data['out_14']['totalin11'])*100;
				}else{
					foreach ($totalin11_keys as $k) {
						$this->data['out_14']['P' . $k]	= 0;
					}	
					
					$this->data['out_14']['PEaux'] 	= 0;
				}
			} // End: Ibd1 == 1
		}
    }
    
    
    function out_15() {
    	if(isset($this->data['Q11']) && $this->data['Q11']==3){
			if(isset($this->data['Ibd2']) && $this->data['Ibd2']==1){

				$totalin11_sum_keys = array('Eh_fuel','Es_fuel','Es_air','Eh_el');
				$this->data['out_15']['totalin11'] = 0;
				foreach ($totalin11_sum_keys as $k) {
					if(!isset($this->data[$k])){
						$this->data[$k] = 0;
					}
					$this->data['out_15']['totalin11'] += $this->data[$k];
				}

				$totalout11_keys = array('Eeffect','El_jig_t','El_wall_t','El_cw_t','El_parts_t','El_opening_t','Eexhaust','El_other','Es_atm');
				$this->data['out_15']['totalout11'] = 0;
				foreach ($totalout11_keys as $k) {
					if(!isset($this->data[$k])){
						$this->data[$k] = 0;
					}
					$this->data['out_15']['totalout11'] += $this->data[$k];
				}

				$this->data['DE'] = $this->data['out_15']['totalin11'] - $this->data['out_15']['totalout11'];
				$this->data['El_other'] = $this->data['El_other'] - $this->data['DE'];

				$this->data['out_15']['totalout11'] = $this->data['out_15']['totalin11'];

				$totalin11_keys = array('Eh_fuel','Es_fuel','Es_air','Eh_el','Eeffect','El_jig_t','El_wall_t','El_cw_t','El_parts_t','El_opening_t','Eexhaust','El_other','Es_atm');
				if($this->data['out_15']['totalin11']!=0){
					foreach ($totalin11_keys as $k) {
						$this->data['out_15']['P' . $k]	= 	($this->data[$k] / $this->data['out_15']['totalin11'])*100;
					}
				}else{
					foreach ($totalin11_keys as $k) {
						$this->data['out_15']['P' . $k]	= 0;
					}
				}
			} // End: Ibd2 == 1
		}
    	
    }
    
    function out_16() {
    	if(isset($this->data['Q11']) && $this->data['Q11']==3){
			if(isset($this->data['Ibd3']) && $this->data['Ibd3']==1){

				$totalin11_sum_keys = array('Eh_fuel','Es_fuel','Es_air','Eh_el','Erecovery');
				$this->data['out_16']['totalin11'] = 0;
				foreach ($totalin11_sum_keys as $k) {
					if(!isset($this->data[$k])){
						$this->data[$k] = 0;
					}
					$this->data['out_16']['totalin11'] += $this->data[$k];
				}
				
				$totalout11_keys = array('Eeffect','El_jig_t','El_wall_t','El_cw_t','El_parts_t','El_opening_t','Es_atm','Eexhaust_hc','El_other');
				$this->data['out_16']['totalout11'] = 0;
				foreach ($totalout11_keys as $k) {
					if(!isset($this->data[$k])){
						$this->data[$k] = 0;
					}
					$this->data['out_16']['totalout11'] += $this->data[$k];
				}

				$this->data['DE'] = $this->data['out_16']['totalin11'] - $this->data['out_16']['totalout11'];
				$this->data['El_other'] = $this->data['El_other'] - $this->data['DE'];

				$this->data['out_16']['totalout11'] = $this->data['out_16']['totalin11'] ;
				
				$this->data['out_16']['totalin11']  = $this->data['out_16']['totalin11'];
				$this->data['out_16']['totalout11'] = $this->data['out_16']['totalout11'];

				$totalin11_keys = array('Eh_fuel','Es_fuel','Es_air','Eh_el','Erecovery','Eeffect','El_jig_t','El_wall_t','El_cw_t','El_parts_t','El_opening_t','Es_atm','Eexhaust_hc','El_other');
				if($this->data['out_16']['totalin11']!=0){
					foreach ($totalin11_keys as $k) {
						$this->data['out_16']['P' . $k]	= 	($this->data[$k] / $this->data['out_16']['totalin11'])*100;
					}
				}else{
					foreach ($totalin11_keys as $k) {
						$this->data['out_16']['P' . $k]	= 0;
					}
				}
			} // End: Ibd3 == 1
		}
    	
    }   
        
}
?>