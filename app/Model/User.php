<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Role $Role
 * @property Content $Content
 * @property GalleryItem $GalleryItem
 * @property GilasSession $GilasSession
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'این فیلد نمی تواند خالی باشد',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'unique'=>array(
                    'rule'=>array('isUnique'),
                    'message' => 'این نام کاربری قبلا ثبت شده است',
                  )
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'این فیلد نمی تواند خالی باشد',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'این فیلد نمی تواند خالی باشد',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
  		'lname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'این فیلد نمی تواند خالی باشد',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            ),
     		'mobile' => array(
             	'between' => array(
    				'rule' => array('between', 11, 11),
    				'message' => 'شماره معتبر نمی باشد',
    				'allowEmpty' =>true,
    				//'required' => false,
    				//'last' => false, // Stop validation after this rule
    				//'on' => 'create', // Limit validation to 'create' or 'update' operations
    			),  
		),
		'email' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'این فیلد نمی تواند خالی باشد',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
       		'email' => array(
				'rule' => array('email'),
				'message' => 'ایمیل معتبر نمی باشد',
		),
            'unique'=>array(
            'rule'=>array('isUnique'),
            'message' => 'این ایمیل قبلا ثبت شده است',
          ),
        ),
   		'grade' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'این فیلد نمی تواند خالی باشد',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
        ),
     	'major' => array(
	     	'notempty' => array(
    			'rule' => array('notempty'),
    			'message' => 'این فیلد نمی تواند خالی باشد',
    			//'allowEmpty' => false,
    			//'required' => false,
    			//'last' => false, // Stop validation after this rule
    			//'on' => 'create', // Limit validation to 'create' or 'update' operations
		), 
        ), 
       	'city' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'این فیلد نمی تواند خالی باشد',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
   
        ),
            
	);
    

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
   		'State' => array(
			'className' => 'State',
			'foreignKey' => 'city',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Content' => array(
			'className' => 'Content',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'GalleryItem' => array(
			'className' => 'GalleryItem',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);
        public function beforeSave() {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
    
    public function bindNode($user) {
            return array('model' => 'Role', 'foreign_key' => $user['User']['role_id']);
    }

}
