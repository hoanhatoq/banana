<?php
/**
 * @author Do Tung
 * Model MstUser, table: mst_user
 */
App::uses('AppModel', 'Model');
// App::uses('AdminAppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class MstUser extends AppModel{
	/**
	 * Table
	 */
	public $useTable = 'mst_user';
	
	/**
	 * primaryKey
	 */
	public $primaryKey = 'id';
	/**
	 * if not set password when edit > keep old password
	 */
    public function saves($data = null, $validate = true, $fieldList = array()) {
    	
        // Clear modified field value before each save
        $this->set($data);
        if (empty($this->data[$this->alias]['password']) && empty($this->data[$this->alias]['password_repeat'])) {
            unset($this->data[$this->alias]['password']);
            unset($this->data[$this->alias]['password_repeat']);
        }
        return parent::save($this->data, $validate, $fieldList);
    }
	/**
	* passwordHasher before insert or update
	*/		
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
			);
		}
		return true;
	}

	/**
	 * Validate
	 */		
	public $validate = array(
		'fullname' => array(
				'rule' => array('between',0,50),
				'message' => "全角50文字以内で入力してください"
		),
		'email' => array(
			'rule1' => array(
				'rule' => 'email',true,
				'allowEmpty' => true,
				'message' => '電子メールを入力してください'
			)
		),
		'username' => array(
			'rule1' => array(
				'rule' => 'notEmpty',
				'message' => '半角英数字で入力してください'
			),
			'rule2' => array(
				'rule' => '/^[a-zA-Z0-9]{1,50}$/i',
				'message' => '半角英数字で入力してください'
			)
		),
		'password' => array(
			'rule2' => array(
				'rule' => '/^[a-zA-Z0-9]{8,16}$/i', 
				'message' => '8文字以上16文字以内の半角英数字で入力してください'
			),
			'rule3' => array(
				'rule' => array('validate_passwords'),
				'message' => '8文字以上16文字以内の半角英数字で入力してください'
			),

		),
		'password_repeat' => array(
			'rule2' => array(
				'rule' => '/^[a-zA-Z0-9]{8,16}$/i', 
				'message' => '8文字以上16文字以内の半角英数字で入力してください'
			),
	        'compare'    => array(
	           'rule'      => array('validate_passwords'),
	           'message'   => '8文字以上16文字以内の半角英数字で入力してください'
	        ),
	    ),

	);


	/**
	 * Hàm so sánh password
	 */		
	public function validate_passwords() {
		return $this->data[$this->alias]['password'] === $this->data[$this->alias]['password_repeat'];
	}

	public function createTempPassword() {
	      $pass = rand(100000,999999);
	      return $pass;
	}
}