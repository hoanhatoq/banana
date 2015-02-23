<?php 
/**
 * @author Ha Manh Linh
 */
class EndController extends AppController{ 

		public $layout = 'innovation_input';
		
		/**
		* End page
		* @return void
		*/
		public function index(){
		$title_for_layout = __('エネルギー効率評価システム | 一般社団法人 日本工業炉協会');
		$this->set('title_for_layout', $title_for_layout);
		}
	}
