<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array('Actions' => array('actionPath' => 'controllers'),),
        ),
        'Session',
        'GilasAcl',
        //TODO: we have an error in ajax forms and some forms e: UsersController::admin_add
        //'Security',
    );
    public $helpers = array(
        'Form',
        'Html',
        'Session',
        'Validator',
    );

    /**
     * default paginate options
     */
    public $paginate = array('limit' => 20, 'paramType' => 'named');

    /**
     * this variable used for filtering in admin List
     * all fields that used in filter form must be come here
     * use 'type' index if you want use LIKE method
     */
    public $paginateConditions = array();
    
    public $publicActions = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->__initializeAuth();
        $this->set('isLogedIn', $this->_isLogedIn());
    }
    
    private function __initializeAuth(){
        $this->Auth->authError = 'اجازه دسترسی به آدرس درخواستی را ندارید.';
        $this->Auth->loginAction =    array('plugin' => null,'controller' => 'users','action' => 'login');
        $this->Auth->logoutRedirect = array('plugin' => null,'controller' => 'users','action' => 'login');
        $this->Auth->authenticate =   array(
            //AuthComponent::ALL => array('scope' => array('User.is_active' => 1)),
            'Form',
        );
        $this->Auth->flash =  array('element' => 'message','key' => 'auth','params' => array('type' => 'warning  no-margin-login top',));
        $this->Auth->allow($this->publicActions);
    }

    function _isLogedIn() {
        $logedIn = FALSE;
        if ($this->Auth->user()) {
            $logedIn = TRUE;
        }
        return $logedIn;
    }

    public function beforeRender() {
        parent::beforeRender();
        $this->theme = SettingsController::read('Site.Template');
        if ($this->request['prefix']) {
            // read count of online users for admin
            $this->loadModel('GilasSession');
            $this->set('onlineUsersCount', $this->GilasSession->onlineUsers());
            $this->theme = 'Admin.Bootstrap';
        }
        if ($this->request->is('ajax')) {
            $this->layout = 'ajax';
        }
    }

    /**
     * Override paginate method for adding conditions fields 
     * 
     * @param mixed $object
     * @param mixed $scope
     * @param mixed $whitelist
     * @return
     */
    public function paginate($object = null, $scope = array(), $whitelist = array()) {
        if (@$this->paginate['paramType'] == 'querystring') {
            $query = $this->request->query;
        } else {
            $query = $this->request->named;
        }
        // we won't use this fields
        unset($query['page'], $query['limit']);
        if ($query) {
            $keys = array();
            // get paginateConditions and format it
            foreach ($this->paginateConditions as $i => $keyName) {
                $options = array();
                if (!is_int($i)) {
                    $options = (array) $keyName;
                    $keyName = $i;
                }
                $keys[$keyName] = $options;
            }

            foreach ($query as $key => $value) {
                $field = $key;
                if (!empty($keys[$key]['field'])) {
                    $field = $keys[$key]['field'];
                }
                // used only query keys that becomes in paginateConditions
                if (!in_array($key, array_keys($keys))) {
                    continue;
                }

                // we may have more than one named param with one key, so we recieve first param
                if (is_array($value)) {
                    $value = array_shift($value);
                }

                // escape empty values
                if (strlen($value) == 0) {
                    continue;
                }

                // no option for this key
                if (empty($keys[$key]['type'])) {
                    $this->paginate['conditions'][$field] = $value;
                    continue;
                } elseif (strtoupper(@$keys[$key]['type']) == 'LIKE') {
                    $this->paginate['conditions'][$field . ' LIKE'] = '%' . $value . '%';
                    continue;
                }
            }
        }

        // add this helper for using FilterHelper in Filter Form
        $this->helpers[] = 'Filter';
        // call parent method and return it
        return parent::paginate($object, $scope, $whitelist);
    }

    /**
     * choose action for given action via adminForm
     * all sent data for admin form will be recieve by this action and this action choose requested action
     * @return void
     */
    public function admin_dispatch() {
        if (empty($this->request->data['action'])) {
            $this->Session->setFlash('اشکال در پردازش اطلاعات', 'alert', array('type' => 'error'));
            $this->redirect($this->referer());
        }
        $action = $this->request->data['action'];
        unset($this->request->data['action']);
        //with prefix
        $this->setAction('admin_' . $action);
    }

    /**
     * Specify row can move Up or move down, by adding 'hasRight' and 'hasLeft' indexes
     *  if row has right brother so can move down
     *  if row has left brother so can move up
     * @param mixed $rows
     * @param mixed $model : model Name
     * @return void
     */
    protected function _recognizeMoving(&$rows, $model) {
        if ($rows) {
            // Check the item can move to up or down
            //      rght = lft - 1    lft  rght     lft = rght + 1
            //     ----------        ----------      -----------
            //     left child         current        right child   
            //
            foreach ($rows as &$row) {
                $left = $row[$model]['lft'];
                $right = $row[$model]['rght'];
                foreach ($rows as $r) {
                    // escape own
                    if ($r[$model]['id'] == $row[$model]['id']) {
                        continue;
                    }
                    // right item so item can move to down 
                    if ($r[$model]['lft'] == ($right + 1)) {
                        $row[$model]['hasRight'] = true;
                    }

                    // left item so item can move to up
                    if ($r[$model]['rght'] == ($left - 1)) {
                        $row[$model]['hasLeft'] = true;
                    }
                }
            }
        }
    }

    /**
     * Change value for field from model by given id and show flash message
     * This action used for AdminForms that send id of rows via post
     * 
     * @param mixed $model
     * @param mixed $field
     * @param mixed $value
     * @param mixed $flashMessage
     * @return void
     */
    protected function _changeStatus($model, $field, $value, $flashMessage) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException(SettingsController::read('Error.Code-12'));
        }
        $id = $this->request->data['id'];
        $count = count($id);
        if ($count == 1) {
            $id = current($id);
            $this->{$model}->id = $id;

            if ($this->{$model}->saveField($field, $value)) {
                $this->Session->setFlash($flashMessage, 'message', array('type' => 'success'));
            } else {
                $this->Session->setFlash(SettingsController::read('Error.Code-17'), 'message', array('type' => 'error'));
            }
        } elseif ($count > 1) {
            $countAffected = 0;
            foreach ($id as $i) {
                $this->{$model}->id = $i;
                if ($this->{$model}->saveField($field, $value)) {
                    $countAffected++;
                }
            }
            $this->Session->setFlash($countAffected . ' ' . $flashMessage, 'message', array('type' => 'success'));
        }
    }

    /**
     * Move up or down for given id via post for specified $model then show $flashMessage
     * 
     * @param mixed $model
     * @param mixed $flashMessage
     * @return void
     */
    protected function _move($model, $flashMessage) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException(SettingsController::read('Error.Code-12'));
        }
        $id = $this->request->data['id'];
        $type = $this->request->data['type'];
        $type = ($type == 'Up') ? 'Up' : 'Down';
        // moveUp or moveDown
        $type = 'move' . $type;
        $count = count($id);
        if ($count == 1) {
            $id = current($id);
            // moveUp or moveDown
            if ($this->{$model}->{$type}($id)) {
                $this->Session->setFlash($flashMessage, 'message', array('type' => 'success'));
            } else {
                $this->Session->setFlash(SettingsController::read('Error.Code-17'), 'message', array('type' => 'error'));
            }
        } elseif ($count > 1) {
            $countAffected = 0;
            foreach ($id as $i) {
                if ($this->{$model}->{$type}($i)) {
                    $countAffected++;
                }
            }
            $this->Session->setFlash($countAffected . ' ' . $flashMessage, 'message', array('type' => 'success'));
        }
    }

}
