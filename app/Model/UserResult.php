<?php
/**
 * @author
 * Model Result, table: 
 */
App::uses('AppModel', 'Model');
class UserResult extends AppModel{
	/**
	 * Table
	 */
	public $useTable = 'user_result';
	
 /**
  * primaryKey
  */
 public $primaryKey = 'id';

 /**
  * user_result + mst_user
  */
    public $belongsTo = array(
        'MstUser' => array(
            'className' => 'MstUser',
            'foreignKey' => 'user_id'
        )
    );

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