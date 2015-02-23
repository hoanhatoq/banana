<?php
App::uses('AppModel', 'Model');
/**
 * @author Nguyen Duy Linh
 * Model Data, table: mst_data
 */
class MstData extends AppModel{
	/**
	 * Table name
	 */
	public $useTable = 'mst_data';
	
	/**
	 * Primary key of table
	 */
	public $primaryKey = 'id';
	
	/**
	 * Return all data for each kbn
	 *
	 * @param $kbn : kbn name
	 * @param $order : order data
	 * 
	 * @return $DATA : all data for each $kbn
	 */
	public function getAllData($kbn, $order='row ASC'){
		$tDATA = $this->find('all', array(
				'conditions' => array(
					'kbn' => $kbn
				),
				'order' => $order
			)
		);

		$DATA = array();		
		foreach($tDATA as $vDATA){			
			$row_id = $vDATA['MstData']['row'];
			$col_id = $vDATA['MstData']['column'];
			$col_val = $vDATA['MstData']['value'];

			$DATA[$row_id][$col_id] = $col_val;
		}
		return $DATA;
	}

	
	/**
	 * Return the value of row, column of kbn
	 *
	 * @param $kbn : kbn name
	 * @param $row : row index
	 * @param $column : column index
	 *
	 * @return $value : value of $row, $column of $kbn
	 */
	public function getRowColumn($kbn, $row, $column){
		$tValue = $this->find('all', array(
				'conditions' => array(
					'kbn' => $kbn,
					'row' => $row,
					'column' => $column
				)
			)
		);		
		$value = $tValue[0]['MstData']['value'];
		return $value;
	}
}