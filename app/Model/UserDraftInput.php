<?php
/**
 * @author Nguyen Duy Linh
 * Model UserDraftInput, table: user_draft_input
 */
class UserDraftInput extends AppModel{
	/**
	 * Table name
	 */
	public $useTable = 'user_draft_input';
	
	/**
	 * Primary key of table
	 */
	public $primaryKey = 'id';

	/**
	 * Validate input data
	 */		
	public $validate = array(		
		'creator_email' => array(
			'email' => array(
				'rule' => 'email',
				'required' => true,
				'message' => '電子メールを入力してください'			
			)
		),		
		'memo' => array(
			'rule' => 'notEmpty',
			'message' => '半角英数字で入力してください'			
		)
	);

}