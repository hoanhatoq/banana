<?php
App::uses('Component', 'Controller/Component');

/**
 * @author NDL
 * Component process page order
 */
class InnovationFlowComponent extends Component{
	/**
	 * Usage some components
	 */	
	public $components = array('Session');
		
	public function pushPage($page){
		$pages = $this->Session->read('Session_Innovation_Flow_Page');
		if (!$pages) {
			$pages = array();
		}
		
		//avoid recursive
		if ($page == end($pages)) {
			return;
		}
		
		//track a page which is not tracked.
		if(!in_array($page, $pages)) {
			$pages[] = $page;
		}
		
		$this->Session->write('Session_Innovation_Flow_Page', $pages);
	}

	public function popPage() {
		$pages = $this->Session->read('Session_Innovation_Flow_Page');
		if(!$pages){		
			return;
		}
		
		$cnt = count($pages);
		$last = $pages[$cnt-1];
		unset($pages[$cnt-1]);
		
		$this->Session->write('Session_Innovation_Flow_Page', $pages);
		return $last;
		
	}

	public function getPageFlow(){
		$pages = $this->Session->read('Session_Innovation_Flow_Page');
		if($pages){
			return $pages;
		}else{
			return null;
		}		
	}
	
	public function getLastPage(){
		$pages = $this->Session->read('Session_Innovation_Flow_Page');
		if(!$pages){
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
		$pages = $this->Session->read('Session_Innovation_Flow_Page');
		if(!$pages){			
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
		$this->Session->delete('Session_Innovation_Flow_Page');
	}
	
	/**
	 * clear from page
	 * remove all page from page
	 * @param: $page: remove all page from this page
	 * @return void
	 */
	public function clearFromPage($page){
		$pages = $this->Session->read('Session_Innovation_Flow_Page');
		if(!$pages){			
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
			$this->Session->write('Session_Innovation_Flow_Page', $pages);
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
		$pages = $this->Session->read('Session_Innovation_Flow_Page');
		if(!$pages){
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

		$key = array('IND1', 'radioPgB01', 'radioPgB10', 'menu02Next');
		$data = array();
		foreach ($key as $k) {
			if($k=='radioPgB01'){
				$data[$k] = isset($fork['page_b01'][$k]) ? $fork['page_b01'][$k] : -999;
			}
			else if($k=='radioPgB10'){
				$data[$k] = isset($fork['page_b10'][$k]) ? $fork['page_b10'][$k] : -999;
			}else{
				$data[$k] = isset($fork[$k]) ? $fork[$k] : -999;
			}		
		}
		if($lastPage=='index') {
			if($data['IND1'] == 2 && $data['menu02Next'] == 1){
				return 'page_b01';
			}else if($data['IND1'] == 1 && $data['menu02Next'] == 10){
				return 'page_b10';
			}else{

				if($data['menu02Next'] == 1){ // 1
					return 'page_b01';
				}
				
				if($data['menu02Next'] == 10){ // 10
					return 'page_b10';
				}
			}	
		}

		if($lastPage=='page_b01') {
			if($data['radioPgB01'] == 1){
				return 'page_b02';
			}
		}

		if($lastPage=='page_b02') {
			return 'out_b01';
		}

		if($lastPage=='page_b10') {
			if($data['radioPgB10'] == 1){
				return 'page_b11';
			}	
		}
	
		if($lastPage=='page_b11') {
			return 'out_b02';
		}

		//exception.
		return '';
	}
}