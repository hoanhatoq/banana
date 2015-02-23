<?php
/**
 * @author Ha Manh Linh
 * Model Admin, table: mst_admin
 */
	App::uses('AppModel','Model');
	App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
	
	class MstAdmin extends AppModel{				
		/**
		 * PK table
		 */
		public $primaryKey = 'id';

		/**
		 * DB table
		 */
		public $useTable = 'mst_admin';

		/**
		 * if not set password when edit > keep old password
		 */
	    public function saves($data = null, $validate = true, $fieldList = array()) {
	        // Clear modified field value before each save
	        
	        $this->set($data);
	        if (empty($this->data[$this->alias]['password']) && empty($this->data[$this->alias]['password_confirmation'])) {
	            unset($this->data[$this->alias]['password']);
	            unset($this->data[$this->alias]['password_confirmation']);
	        }
	        return parent::save($this->data, $validate, $fieldList);
	    }
		/**
		*
		*	passwordHasher
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
		*	Validate
		*
		*/
		public $validate = array(
			'email' => array(
				'rule1' => array(
					'rule' => 'email',true,
					'allowEmpty' => false,
					'message' => ''
				)
			),
			'username' => array(
				'rule1' => array(
					'rule' => 'notEmpty',
					'message' => "ログインIDを入力してください"
				),
				'rule2' => array(
					'rule' => '/^[a-zA-Z0-9]{1,50}$/i',
					'message' => '半角英数字で入力してください'
				)
			),
			'password' => array(
				'rule1' => array(
					'rule' => 'notEmpty',
					'message' => 'パスワードを入力してください'
				),
				'rule2' => array(
					'rule' => '/^[a-z0-9]{8,16}$/i', 
					'message' => 'パスワードを入力してください'
				),
				'rule3' => array(
					'rule' => 'matchPasswords',
					'message' => 'パスワードを入力してください'
				)
			),
			'password_confirmation' => array(
				'rule1' => array(
					'rule' => 'notEmpty',
					'message' => '確認パスワードを入力してください'
				),
	        'compare'    => array(
	           'rule'      => array('matchPasswords'),
	           'message'   => '確認パスワードを入力してください'
	        ),
			),
		);
		/**
		*	Match password
		*	
		*/
		public function matchPasswords(){
			return $this->data[$this->alias]['password'] === $this->data[$this->alias]['password_confirmation'];
		}

		  /**
		  * password random (passwordremind)
		  * 
		  */
		  public function createTempPassword() {
		        $pass = rand(100000,999999);
		        return $pass;
		  }
	}