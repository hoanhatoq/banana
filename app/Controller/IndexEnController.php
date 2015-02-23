<?php
/**
 * @author Nguyen Duy Linh
 */
class IndexEnController extends AppController{ 
	/**
	 * Các component được sử dụng
	 */
	public $components = array('Cookie');

	/**
	 * Trang login tiếng anh
	 *
	 * Truyền username, password qua Cookie sang cho trang login xử lý
	 * nếu thành công thì chuyển sang trang menu, ngược lại báo lỗi login
	 * 
	 */
	public function index(){
		$title_for_layout = __('エネルギー効率評価システム | 一般社団法人 日本工業炉協会');
		$this->set('title_for_layout', $title_for_layout);
		
		if($this->request->is('post')){						
			$this->Session->write('IndexEn', $this->request->data['MstUser']);
			return $this->redirect(array('controller' => 'index', 'action' => 'index'));
		}
	}
}