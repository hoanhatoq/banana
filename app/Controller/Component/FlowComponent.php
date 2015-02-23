<?php
App::uses('Component', 'Controller/Component');

/**
 * @author NDL
 * Component process page order
 */
class FlowComponent extends Component{
	/**
	 * Usage some components
	 */	
	public $components = array('Session');
		
	public function pushPage($page){
		$pages = $this->Session->read('Session_Flow_Page');
		if (!$pages) {
			$pages = array();
			// $pages[0] = 'page02';
		}
		
		//avoid recursive
		if ($page == end($pages)) {
			return;
		}
		
		//track a page which is not tracked.
		if(!in_array($page, $pages)) {
			$pages[] = $page;
		}
		
		$this->Session->write('Session_Flow_Page', $pages);
	}

	public function popPage() {
		$pages = $this->Session->read('Session_Flow_Page');
		if(!$pages){
			// return 'page02';
			return;
		}
		
		$cnt = count($pages);
		$last = $pages[$cnt-1];
		unset($pages[$cnt-1]);
		
		$this->Session->write('Session_Flow_Page', $pages);
		return $last;
		
	}

	public function getPageFlow(){
		$pages = $this->Session->read('Session_Flow_Page');
		if($pages){
			return $pages;
		}else{
			// return array('page02');
			return null;
		}		
	}
	
	public function getLastPage(){
		$pages = $this->Session->read('Session_Flow_Page');
		if(!$pages){
			// return 'page02';
			return;
		}else{
			return end($pages);
		}
	}
	/**
	 * previous page
	 * @return pages: previous page
	 */
	public function getPreviousPage(){
		$pages = $this->Session->read('Session_Flow_Page');
		if(!$pages){
			// return 'page02';
			return false;
		}else{
			$ct = count($pages);
			return $pages[$ct-2];
		}
	}
	/**
	 * clear flow page
	 * @return void
	 */
	public function clearFlowPage(){
		$this->Session->delete('Session_Flow_Page');
	}
	
	
	/**
	 * Check allow sankey page
	 * 
	 * @param: $Q11: Q11 variable
	 * @param: $Ibd1: Ibd1 variable
	 * @param: $Ibd2: Ibd2 variable
	 * @param: $Ibd3: Ibd3 variable
	 * @param: $currentPage: Current page
	 * 
	 * @return : 1: Current page is allowed => return current page, $allowPages[0]: The first sankey page is allowed.
	 */
	public function checkPageSankey($Q11, $Ibd1, $Ibd2, $Ibd3, $currentPage){
		$allowPages = array();

		if(isset($Q11) && $Q11==1){					
			if(isset($Ibd1) && $Ibd1==1){
				$allowPages[] = 'out_08';
			} 
			if(isset($Ibd2) && $Ibd2==1){
				$allowPages[] = 'out_09';	
			} 
			if(isset($Ibd2) && $Ibd3==1){
				$allowPages[] = 'out_10';
			} 
		}

		if(isset($Q11) && $Q11==2){
			if(isset($Ibd1) && $Ibd1==1){
				$allowPages[] = 'out_11';
			} 
			if(isset($Ibd2) && $Ibd2==1){
				$allowPages[] = 'out_12';	
			} 
			if(isset($Ibd2) && $Ibd3==1){
				$allowPages[] = 'out_13';
			} 
		}

		if(isset($Q11) && $Q11==3){
			if(isset($Ibd1) && $Ibd1==1){
				$allowPages[] = 'out_14';
			} 
			if(isset($Ibd2) && $Ibd2==1){
				$allowPages[] = 'out_15';	
			} 
			if(isset($Ibd2) && $Ibd3==1){
				$allowPages[] = 'out_16';
			} 
		}		
		if(in_array($currentPage, $allowPages)){
			return 1;			
		}else{
			return $allowPages[0];
		}
	}

	/**
	 * clear from page
	 * remove all page from page
	 * @param: $page: remove all page from this page
	 * @return void
	 */
	public function clearFromPage($page){
		$pages = $this->Session->read('Session_Flow_Page');
		if(!$pages){
			// return 'page02';
			return;
		}
		
		if(in_array($page, $pages)){
			$ct = count($pages);
			$kitem = array_search($page, $pages);
			if(!($kitem == $ct-1)){
				for($i=$ct-1 ; $i>$kitem ; $i--){
					unset($pages[$i]);
				}
			}
			$this->Session->write('Session_Flow_Page', $pages);
			return true;
		}else{
			return false;
		}		
	}

	/**
	 * Check page in flow page
	 * 
	 * @param: $page: page
	 * @return true: in flow, false: not in flow
	 */
	public function checkPageInFlow($page){
		$pages = $this->Session->read('Session_Flow_Page');
		if(!$pages){
			// $pages = array('page02');
			return false;
		}
		if(in_array($page, $pages)){			
			return true;
		}else{
			return false;
		}
	}

	/**
	 * Check page in flow page
	 * 
	 * @param: $currentPage: current page (action)
	 * @param: $lastPage: last page accessed (action)
	 * @param: $data: data of user
	 * @return true: allow access, page: page will be redirect
	 */
	public function checkPageFlow($lastPage, $data, $currentPage){
		$nextPage = $this->getNextPage($lastPage, $data);
		if ($currentPage == $nextPage) {
			return true;
		}
		return false;
	}
	
	
	/**
	 * get next-page in flow
	 * 
	 * @param string $lastPage last page (action)
	 * @param mixed $fork: data of user has inputed. 
	 * @return string next-page
	 */
	public function getNextPage($lastPage, $fork) {
		$key = array('IND1', 'IND3', 'Q3', 'Q4', 'Q1', 'Q11', 'Q13', 'Ibd1', 'Ibd2', 'Ibd3', 'Pg20Choose');
		$data = array();
		foreach ($key as $k) {
			$data[$k] = isset($fork[$k]) ? $fork[$k] : -999;
		}
		
		if($lastPage=='page02') {
			return 'page03';
		}

		if($lastPage=='page03') {
			return 'page04';
		}

		if($lastPage=='page04') {
			return 'page05';
		}

		if($lastPage=='page05') {
			if($data['IND1'] != 1){
				return 'page06';
			}
			
			if ($data['Q3'] != 1 && $data['IND3'] != 1 && $data['Q4'] != 1 && $data['Q11'] != 3 ) {
				return 'page15';
			}
			
			if ($data['Q3'] != 1 && $data['IND3'] != 1 && $data['Q4'] != 1) {
				return 'page13';
			}
			
			if ($data['Q3'] != 1 && $data['IND3'] != 1) {
				return 'page12';
			}
			
			if ($data['Q3'] != 1) {
				return 'page11';
			}
			
			if ($data['Q3'] == 1) {
				return 'page10';
			}
			
		}

		if($lastPage=='page06') {
			return 'page07';
		}

		if($lastPage=='page07') {
			if($data['Q1'] == 'B'){ 
				return 'page09';
			}
			if($data['Q1'] != 'B'){ 
				return 'page08';
			}
		}

		if($lastPage=='page08') {
			if($data['Q3'] == 1) {
				return 'page10';
			}
			if ($data['Q3'] != 1 && $data['IND3'] != 1 && $data['Q4'] != 1 && $data['Q11'] != 3 ) {
				return 'page15';
			}
			
			if ($data['Q3'] != 1 && $data['IND3'] != 1 && $data['Q4'] != 1) {
				return 'page13';
			}
			
			if ($data['Q3'] != 1 && $data['IND3'] != 1) {
				return 'page12';		
			}
			
			if ($data['Q3'] != 1) {
				return 'page11';
			}
			
		}

		if($lastPage=='page09') {
			if($data['Q3'] == 1){
				return 'page10';
			}
			
			if ($data['Q3'] != 1 && $data['IND3'] != 1 && $data['Q4'] != 1 && $data['Q11'] != 3 ) {
				return 'page15';
			}	
			
			if ($data['Q3'] != 1 && $data['IND3'] != 1 && $data['Q4'] != 1) {
				return 'page13';
			}
			
			if ($data['Q3'] != 1 && $data['IND3'] != 1) {
				return 'page12';
			}
			
			if ($data['Q3'] != 1) {
				return 'page11';
			}
			
		}

		if($lastPage=='page10') {
			if($data['IND3'] == 1){
				return 'page11';
			}
			
			if ($data['IND3'] != 1 && $data['Q4'] != 1 && $data['Q11'] != 3 ) {
				return 'page15';
			}
			
			if ($data['IND3'] != 1 && $data['Q4'] != 1) {
				return 'page13';
			}
			
			if ($data['IND3'] != 1) {
				return 'page12';
			}
			
		}

		if($lastPage=='page11') {
			if($data['Q4'] == 1){				
				return 'page12';
			}
			
			if ($data['Q4'] != 1 && $data['Q11'] != 3 ) {
				return 'page15';
			}
			
			if ($data['Q4'] != 1) {					 
				return 'page13';
			}
			
		}

		if($lastPage=='page12') {			
			if($data['Q11'] == 3){
				return 'page13';
			}
			if ($data['Q11'] != 3) {
				return 'page15';
			}
			
		}

		if($lastPage=='page13') {			
			return 'page15';
		}	

		if($lastPage=='page15') {			
			if ($data['Q11'] == 1) {
				return 'page16';
			}
			
			if( $data['Q11'] != 1 && $data['Q11'] != 2 ){				
				return 'page14';
			}
			if ($data['Q11'] == 2) {
				return 'page17';
			}
			
		}

		if($lastPage=='page16') {			
			return 'page14';
		}


		if($lastPage=='page17') {			
			return 'page14';
		}	

		if($lastPage=='page14') {
			if($data['Q13'] != 1){				
				return 'page20';
			}
			
			return 'page18';
		}

		if($lastPage=='page18') {			
			return 'page20';
		}

		if($lastPage=='page20') {
			if($data['Pg20Choose'] == 1){ 				
				return 'page21';
			}
			
			if($data['Ibd1'] == 1){					
				return 'page31';
			}
			
			if($data['IND1'] == 1 || $data['IND1'] == 3){						
				return 'page31';
			}
			
			return 'out';
			
		}
		
		if($lastPage=='page21') {			
			if($data['Ibd1'] == 1){					
				return 'page31';
			}
			
			if($data['IND1'] == 1 || $data['IND1'] == 3){						
				return 'page31';
			}
			
			return 'out';
		}

		if($lastPage=='page31') {			
			return 'page32';
		}

		if($lastPage=='page32') {			
			return 'page41';
		}

		/* OUT OLD *\/
		if($lastPage=='page41') {			
			if($data['IND1'] == 1){
				if($data['Ibd1'] == 1){
					return 'out';
				}				
				if($data['Ibd3'] == 1){
					return 'out';
				}
			}

			if($data['IND1'] == 2){
				return 'out';
			}

			if($data['IND1'] == 3){
				return 'out';
			}			
		}
		
		if($lastPage=='out') {	
			if($data['IND1'] == 1){
				if($data['Ibd1'] == 1){
					return 'out_02';
				}								
				if($data['Ibd3'] == 1){
					return 'out_04';
				}
			}

			if($data['IND1'] == 2){
				if($data['Ibd1'] == 1){
					return 'out_02';
				}								
				if($data['Ibd2'] == 1){
					return 'out_05';
				}
				if($data['Ibd3'] == 1){
					return 'out_07';
				}
			}

			if($data['IND1'] == 3){
				if($data['Ibd1'] == 1){
					return 'out_02';
				}								
				if($data['Ibd2'] == 1){
					return 'out_04';
				}
				if($data['Ibd3'] == 1){
					return 'out_04';
				}
			}		
		}

		if($lastPage=='out_02') {	
			if($data['IND1'] == 1){
				if($data['Ibd1'] == 1){
					return 'out_03';
				}								
				if($data['Ibd3'] == 1){
					return 'out_04';
				}
			}

			if($data['IND1'] == 2){
				if($data['Ibd1'] == 1){
					return 'out_03';
				}								
				if($data['Ibd2'] == 1){
					return 'out_05';
				}
				if($data['Ibd3'] == 1){
					return 'out_07';
				}
			}

			if($data['IND1'] == 3){
				if($data['Ibd1'] == 1){
					return 'out_03';
				}								
				if($data['Ibd2'] == 1){
					return 'out_04';
				}
				if($data['Ibd3'] == 1){
					return 'out_04';
				}
			}		

		}

		if($lastPage=='out_03') {	
			if($data['IND1'] == 1){
				if($data['Ibd3'] == 1){
					return 'out_04';
				}
			}

			if($data['IND1'] == 2){											
				if($data['Ibd2'] == 1){
					return 'out_05';
				}
				if($data['Ibd3'] == 1){
					return 'out_07';
				}
			}

			if($data['IND1'] == 3){		
				if($data['Ibd2'] == 1){
					return 'out_04';
				}
				if($data['Ibd3'] == 1){
					return 'out_04';
				}
			}	
		}

		if($lastPage=='out_04') {	
			// IND1 = 3
			if($data['IND1'] == 3){		
				if($data['Ibd2'] == 1){
					return 'out_05';
				}
				if($data['Ibd3'] == 1){
					return 'out_06';
				}
			}	
		}

		if($lastPage=='out_05') {
			if($data['IND1'] == 3){
				if($data['Ibd3'] == 1){
					return 'out_06';
				}
			}	
		}			

		if($lastPage=='page41') {
			if($data['IND1'] == 1){					
				return $this->getFirstSankey($Q11, $Ibd1, $Ibd2, $Ibd3);			
			}
		}
		
		if($lastPage=='out') {
			if($data['IND1'] == 1){
				return $this->getFirstSankey($Q11, $Ibd1, $Ibd2, $Ibd3);
			}
		}

		if ($lastPage=='out_02' ) {
			if($data['IND1'] == 1){
				return $this->getFirstSankey($Q11, $Ibd1, $Ibd2, $Ibd3);			
			}
		}

		if ($lastPage=='out_03' ) {
			return $this->getFirstSankey($Q11, $Ibd1, $Ibd2, $Ibd3);
		}
		

		if ($lastPage=='out_04' ) {
			return $this->getFirstSankey($Q11, $Ibd1, $Ibd2, $Ibd3);
		}

		if ($lastPage=='out_05' ) {
			return $this->getFirstSankey($Q11, $Ibd1, $Ibd2, $Ibd3);
		}

		if ($lastPage=='out_06' ) {
			return $this->getFirstSankey($Q11, $Ibd1, $Ibd2, $Ibd3);
		}
		/* END OUT (OK) */
		/* NEW */

		$Q11 = $data['Q11'];
		$Ibd1 = $data['Ibd1'];
		$Ibd2 = $data['Ibd2'];
		$Ibd3 = $data['Ibd3'];
		$IND1 = $data['IND1'];
		
		if($lastPage=='page41') {
			$pageOut = $this->getFirstPageOut($lastPage, $Ibd1, $Ibd2, $Ibd3, $IND1);
			if($pageOut=='sankey'){
				return $this->getFirstSankey($Q11, $Ibd1, $Ibd2, $Ibd3);			
			}else{
				return $pageOut;
			}
		}

		if($lastPage=='out') {
			$pageOut = $this->getFirstPageOut($lastPage, $Ibd1, $Ibd2, $Ibd3, $IND1);
			if($pageOut=='sankey'){
				return $this->getFirstSankey($Q11, $Ibd1, $Ibd2, $Ibd3);			
			}else{
				return $pageOut;
			}
		}

		if($lastPage=='out_02') {
			$pageOut = $this->getFirstPageOut($lastPage, $Ibd1, $Ibd2, $Ibd3, $IND1);
			if($pageOut=='sankey'){
				return $this->getFirstSankey($Q11, $Ibd1, $Ibd2, $Ibd3);			
			}else{
				return $pageOut;
			}
		}

		if($lastPage=='out_03') {
			$pageOut = $this->getFirstPageOut($lastPage, $Ibd1, $Ibd2, $Ibd3, $IND1);
			if($pageOut=='sankey'){
				return  $this->getFirstSankey($Q11, $Ibd1, $Ibd2, $Ibd3);			
			}else{
				return $pageOut;
			}
		}
		

		if($lastPage=='out_04') {
			$pageOut = $this->getFirstPageOut($lastPage, $Ibd1, $Ibd2, $Ibd3, $IND1);
			if($pageOut=='sankey'){
				return $this->getFirstSankey($Q11, $Ibd1, $Ibd2, $Ibd3);			
			}else{
				return $pageOut;
			}
		}

		if($lastPage=='out_05') {
			$pageOut = $this->getFirstPageOut($lastPage, $Ibd1, $Ibd2, $Ibd3, $IND1);
			if($pageOut=='sankey'){
				return $this->getFirstSankey($Q11, $Ibd1, $Ibd2, $Ibd3);			
			}else{
				return $pageOut;
			}
		}

		if($lastPage=='out_06') {
			$pageOut = $this->getFirstPageOut($lastPage, $Ibd1, $Ibd2, $Ibd3, $IND1);
			if($pageOut=='sankey'){
				return $this->getFirstSankey($Q11, $Ibd1, $Ibd2, $Ibd3);			
			}else{
				return $pageOut;
			}
		}
		/* END NEW */

		/* SANKEY */			

		if ($lastPage == 'out_07' ) {
			return $this->getFirstSankey($Q11, $Ibd1, $Ibd2, $Ibd3);
		}
		
		if ($lastPage == 'out_08' ) {
			if ($Q11 == 1) {				
				if ($Ibd2 == 1) {
					return 'out_09';
				}
				if ($Ibd3 == 1) {
					return 'out_10';
				}
			}
		}

		if ($lastPage == 'out_09' ) {
			if ($Q11 == 1) {								
				if ($Ibd3 == 1) {
					return 'out_10';
				}
			}
		}

		if ($lastPage == 'out_11' ) {			
			if ($Q11 == 2) {				
				if ($Ibd2 == 1) {
					return 'out_12';
				}
				if ($Ibd3 == 1) {
					return 'out_13';
				}
			}			
		}

		if ($lastPage == 'out_12' ) {			
			if ($Q11 == 2) {								
				if ($Ibd3 == 1) {
					return 'out_13';
				}
			}			
		}

		if ($lastPage == 'out_14' ) {			
			if ($Q11 == 3) {				
				if ($Ibd2 == 1) {
					return 'out_15';
				}
				if ($Ibd3 == 1) {
					return 'out_16';
				}
			}
		}

		if ($lastPage == 'out_15' ) {			
			if ($Q11 == 3) {				
				if ($Ibd3 == 1) {
					return 'out_16';
				}
			}
		}
		/* END SANKEY */

		//exception.
		return '';
	}

	/**
	 * get all sankey page
	 * 
	 * @param: $data: data of user	 
	 * 
	 * @return : return all sankey page
	 */
	public function getAllPageSankey($data){
		$Q11 = (isset($data['Q11']))? $data['Q11']: 0;
		$Ibd1 = (isset($data['Ibd1']))? $data['Ibd1']: 0;
		$Ibd2 = (isset($data['Ibd2']))? $data['Ibd2']: 0;
		$Ibd3 = (isset($data['Ibd3']))? $data['Ibd3']: 0;

		$sankeyPages = array();

		if($Q11==1){					
			if($Ibd1==1){
				$sankeyPages[] = 'out_08';
			} 
			if($Ibd2==1){
				$sankeyPages[] = 'out_09';	
			} 
			if($Ibd3==1){
				$sankeyPages[] = 'out_10';
			} 
		}

		if($Q11==2){
			if($Ibd1==1){
				$sankeyPages[] = 'out_11';
			} 
			if($Ibd2==1){
				$sankeyPages[] = 'out_12';	
			} 
			if($Ibd3==1){
				$sankeyPages[] = 'out_13';
			} 
		}

		if($Q11==3){
			if($Ibd1==1){
				$sankeyPages[] = 'out_14';
			} 
			if($Ibd2==1){
				$sankeyPages[] = 'out_15';	
			} 
			if($Ibd3==1){
				$sankeyPages[] = 'out_16';
			} 
		}		
		return $sankeyPages;
	}

	/**
	 * get the first sankey page
	 * 
	 * @param: $Q11: variable $Q11
	 * @param: $Ibd1: variable $Ibd1
	 * @param: $Ibd2: variable $Ibd2
	 * @param: $Ibd3: variable $Ibd3
	 * 
	 * @return : return the first sankey page
	 */
	public function getFirstSankey($Q11, $Ibd1, $Ibd2, $Ibd3){
		if ($Q11 == 1) {
			if ($Ibd1 == 1) {
				return 'out_08';
			}
			if ($Ibd2 == 1) {
				return 'out_09';
			}
			if ($Ibd3 == 1) {
				return 'out_10';
			}
		}
		
		if ($Q11 == 2) {
			if ($Ibd1 == 1) {
				return 'out_11';
			}
			if ($Ibd2 == 1) {
				return 'out_12';
			}
			if ($Ibd3 == 1) {
				return 'out_13';
			}
		}
		
		if ($Q11 == 3) {
			if ($Ibd1 == 1) {
				return 'out_14';
			}
			if ($Ibd2 == 1) {
				return 'out_15';
			}
			if ($Ibd3 == 1) {
				return 'out_16';
			}
		}
	}

	/**
	 * get the first sankey page
	 * 
	 * @param: $lastPage: last page accessed (action)	 
	 * @param: $Ibd1: variable $Ibd1
	 * @param: $Ibd2: variable $Ibd2
	 * @param: $Ibd3: variable $Ibd3
	 * @param: $IND1: variable $IND1
	 * 
	 * @return : return the first sankey page
	 */
	public function getFirstPageOut($lastPage, $Ibd1, $Ibd2, $Ibd3, $IND1){
		$out_of_ibd = array();
	
		$out_of_ibd[1] = array(); // ibd1
		$out_of_ibd[2] = array(); // ibd2
		$out_of_ibd[3] = array(); // ibd3
		
		$out_of_ibd[1][1] = array('out', 'out_02', 'out_03'); 
		$out_of_ibd[1][2] = array('out', 'out_02', 'out_03'); 
		$out_of_ibd[1][3] = array('out', 'out_02', 'out_03'); 
			
		$out_of_ibd[2][2] = array('out', 'out_05'); 
		$out_of_ibd[2][3] = array('out'); 
		
		$out_of_ibd[3][1] = array('out', 'out_04'); 
		$out_of_ibd[3][2] = array('out', 'out_07'); 
		$out_of_ibd[3][3] = array('out', 'out_06'); 
		
		$out1 = array();
		$out2 = array();
		$out3 = array();
		if($Ibd1==1){
			$out1 = $out_of_ibd[1][$IND1];
		}
		
		if($Ibd2==1 && $IND1!=1){
			$out2 = $out_of_ibd[2][$IND1];
		}
		
		if($Ibd3==1){
			$out3 = $out_of_ibd[3][$IND1];
		}
		
		$tListOut = array_unique(array_merge($out1,$out2,$out3));

		$listOut = array();
		foreach($tListOut as $vOut){
			$listOut[] = $vOut;
		}
		
		$nPageOut = count($listOut);

		if($nPageOut>0){ // have numbers page out
			if($nPageOut==1){ // have only one page out
				if($listOut[0]==$lastPage){ // lastPage==page out -> sankey
					return 'sankey';
				}else{ // lastPage != page out
					return $listOut[0];
				}
			}else{	// have numbers page out
				if(in_array($lastPage, $listOut)){ // lastPage in page out array
					if($lastPage == $listOut[$nPageOut-1]){ // lastPage is the last page of page out array 
						return 'sankey';
					}else{
						$kLastPage = array_search($lastPage, $listOut);
						return $listOut[$kLastPage+1];
					}
				}else{ // if lastPage not in page out array 
					return $listOut[0]; 
				}
			}
		}else{ // don't have page out
			return 'sankey';
		}
	}
}