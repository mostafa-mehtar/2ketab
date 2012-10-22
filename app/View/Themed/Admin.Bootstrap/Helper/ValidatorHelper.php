<?php

class ValidatorHelper extends AppHelper{
    
    public $helpers = array('Html');
/**
 *  Contain field and his rule and message
 * 
 * Index Order : FormID.Model.Field.Rule
 * for example :
 *   array(
 *      'FormID' => array(
 *          'Post' => array(
 *              'title' => array(
 *                  'notempty' => array(
 *                      'rule' => array('notempty'),
 *                      'message' => 'Not Empty',
 *                  ),
 *                  'numric' => array(
 *                      'rule' => array('numric'),
 *                      'message' => 'It must be number',
 *                  ),
 *              ),
 *          ),
 *      ),
 *   )
 */
    protected $_fields = array();

/**
 *  Hold output script
 */
    protected $_output = array();
    
/**
 *  Hold id for current form
 */
    protected $_formID = null;
    
    public function __construct(View $View, $settings = array()) {
		parent::__construct($View, $settings);
        
        // Choose Form tag by cake rule
        $model = null;
        if (!empty($this->request->params['models'])) {
			$model = key($this->request->params['models']);
		}
        // example : ModelActionForm
        $this->_formID = $model . Inflector::camelize($this->request->params['action']).'Form'; 
	}
    
/**
 * Return validation jquery script
 * 
 * @return script block
 */
    public function validate(){
        
        $this->setDefaults();
        
        // only show func without option
        if(empty($this->_fields[$this->_formID])){
            $this->_output[] = '$("#'.$this->_formID.'").validate()';
            return $this->output();
        }
        
        
        $options = $this->_fields[$this->_formID];
        $rules = $messages = array();
        
        // for any Model
        foreach($options as $model => $fields){
            
            //for any fields for current Model
            foreach($fields as $field => $fieldRules){
                $id = "data[$model][$field]";
                
                // for any rule of current field
                foreach($fieldRules as $ruleWithMessage){
                    $rule = $ruleWithMessage['rule'];
                    $ruleValue = true;
                    
                    // if rule is array, such as: array('notempty') or array('maxLenght', 10)
                    if(is_array($rule)){
                        
                        // get value for current rule (if is specified)
                        if(! empty($rule[1])){
                            $ruleValue = $rule[1];
                        }
                        
                        // the first index is rule
                        $rule = $rule[0];
                    }
                    if(!in_array($rule, array('notempty', 'minlength', 'maxlength', 'url', 'email'))){
                        continue;
                    }
                    switch($rule){
                        case 'notempty':
                            $rule = 'required';
                            break;
                    }
                    $rules[$id][$rule] = $ruleValue;
                    if(! empty($ruleWithMessage['message'])){
                        $messages[$id][$rule] = $ruleWithMessage['message'];   
                    }
                }   
            }      
        }
        // generate script
        
        $script = '$("#'.$this->_formID.'").validate({ rules :'.json_encode($rules);
        if(! empty($messages)){
            $script .= ', messages : '.json_encode($messages);
        }
        $script .= '});';
        
        // add to output
        $this->_output[] = $script;
        return $this->output();
             
    }
    
/**
 * Add Rule from Model
 * 
 * @param array $fields : fields for custom validation rules
 *      example : 
 *          string : 'Model' or 'Model.field'
 *          array : array('Model', 'Model.field', 'Model' => array('field1', 'field2'))
 * @return void
 */
    public function addRule($fields = array()){

        // only write validate without option
        if(empty($fields)){
            $this->_fields[$this->_formID] = array();
            return;
        }
        
        if(is_string($fields)){
            $this->fetchValidate($fields);
        }
        
        if(is_array($fields)){
            foreach($fields as $key => $value){
                if(is_int($key)){
                    $this->fetchValidate($value);
                    continue;
                }
                
                foreach($value as $val){
                    $this->fetchValidate($key .'.'.$val);
                }
            }
        }
    }
    
    /**
     * Read validate array for specified Model and field(s)
     * 
     * @param mixed $fields : 'Model' or 'Model.field'
     * @return
     */
    public function fetchValidate($fields){
            $fields = $this->extract($fields);
            $model = $fields['model'];
            // Create Object for this model
            App::import('Model', $model);
            $modelObject = new $model;
            $validate = $modelObject->validate;
            
            //no validation
            if(empty($validate)){
                $this->_fields[$this->_formID] = array();
                return ;
            }
                
            // if has no field so submit all fields
            if(empty($fields['field'])){
                foreach($validate as $field => $validation){
                    $this->_fields[$this->_formID][$model][$field] = $validation;
                }
            }else{
                $this->_fields[$this->_formID][$model][$fields['field']] = $validate[$fields['field']];
            }
    }
    
    
/**
 * Extracting
 * 
 * @param string $modelWithField : 'Model' or 'Model.field'
 * @return array('model' => 'Model', 'field' => 'field')
 */
    public function extract($modelWithField){
        $return = array();
        $array = explode('.',$modelWithField);

        if(! empty($array[0])){
            $return['model'] = $array[0];    
        }
        
        if(! empty($array[1])){
            $return['field'] = $array[1];    
        }
        return $return;
    }
    
/**
 * Add custom rule that isn't in Model
 * 
 * @param string $element : id of specified input
 * @param string $rule : rule
 * @param string $message : message
 * @return void
 */
    public function addCustomRule($element, $rule, $message){
        $this->_fields[$this->_formID][$element] = compact('rule', 'message');
    }
    
    public function setDefaults (){
        $this->_output[] = '
            $.validator.setDefaults({
            	errorClass : "alert-input-error",
                errorElement : "div",
            });
        ';
    }
    
    public function beforeRender(){
        $this->Html->script('validation',false);
    }
    
    public function chooseForm($formID){
        $this->_formID = $formID;
        return true;
    }
    
    public function output(){
        if(empty($this->_output)){
            return;
        }
        $script = '';
        foreach($this->_output as $output){
            $script .= $output;
        }
        return $this->Html->scriptBlock('$(function(){'.$script.'});',array('inline' => false));
    }
}

/*
	// validate signup form on keyup and submit
	$("#signupForm").validate({
		rules: {
			firstname: "required",
			lastname: "required",
			username: {
				required: true,
				minlength: 2
			},
			password: {
				required: true,
				minlength: 5
			},
			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			email: {
				required: true,
				email: true
			},
			topic: {
				required: "#newsletter:checked",
				minlength: 2
			},
			agree: "required"
		},
		messages: {
			firstname: "Please enter your firstname",
			lastname: "Please enter your lastname",
			username: {
				required: "Please enter a username",
				minlength: "Your username must consist of at least 2 characters"
			},
			password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			confirm_password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Please enter the same password as above"
			},
			email: "Please enter a valid email address",
			agree: "Please accept our policy"
		}
	});

       required: "تکمیل این فیلد اجباری است.",
       remote: "لطفا این فیلد را تصحیح کنید.",
       email: ".لطفا یک ایمیل صحیح وارد کنید",
       url: "لطفا آدرس صحیح وارد کنید.",
       date: "لطفا یک تاریخ صحیح وارد کنید",
       dateISO: "لطفا تاریخ صحیح وارد کنید (ISO).",
       number: "لطفا عدد صحیح وارد کنید.",
       digits: "لطفا تنها رقم وارد کنید",
       creditcard: "لطفا کریدیت کارت صحیح وارد کنید.",
       equalTo: "لطفا مقدار برابری وارد کنید",
       accept: "لطفا مقداری وارد کنید که ",
       maxlength: jQuery.validator.format("لطفا بیشتر از {0} حرف وارد نکنید."),
       minlength: jQuery.validator.format("لطفا کمتر از {0} حرف وارد نکنید."),
       rangelength: jQuery.validator.format("لطفا مقداری بین {0} تا {1} حرف وارد کنید."),
       range: jQuery.validator.format("لطفا مقداری بین {0} تا {1} حرف وارد کنید."),
       max: jQuery.validator.format("لطفا مقداری کمتر از {0} حرف وارد کنید."),
       min: jQuery.validator.format("لطفا مقداری بیشتر از {0} حرف وارد کنید.")
       
*/
