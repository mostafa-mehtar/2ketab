<?php
class GilasSession extends AppModel{
    
    public function beforeSave(){
        $request = Router::getRequest();
        $this->data[$this->alias]['ip'] = $request->clientIp();
        $this->data[$this->alias]['path'] = $request->here(false);
        $this->data[$this->alias]['user_id'] = AuthComponent::user('id');
        $this->deleteAll(array($this->alias . ".expires <" => time()), false, false);
        return parent::beforeSave();
    }
    
    public function onlineUsers(){
        return $this->find('count');
    }
    
    public function isOnline($userID){
        $row = $this->find('first',array('conditions' => array('user_id' => $userID) ));
        return (bool)$row;
    }
}
?>