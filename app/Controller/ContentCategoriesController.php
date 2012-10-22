<?php

App::uses('AppController', 'Controller');

/**
 * ContentCategories Controller
 *
 * @property ContentCategory $ContentCategory
 */
class ContentCategoriesController extends AppController {
    
    public $publicActions = array('getList');
    
    public function admin_add() {
        $this->set('title_for_layout', 'افزودن مجموعه مطالب');
        $this->set('parents', $this->ContentCategory->generateTreeList());
        if ($this->request->is('post')) {
            if ($this->ContentCategory->save($this->request->data)) {
                // Save Level for this item
                $path = $this->ContentCategory->getPath();
                // levels starts with 0
                $this->ContentCategory->saveField('level', count($path) - 1);
                
                $this->Session->setFlash('مجموعه با موفقیت ذخیره شد.', 'message', array('type' => 'success'));
                $this->redirect(array('action' => 'index', 'admin' => TRUE));
            } else {
                $this->Session->setFlash(SettingsController::read('Error.Code-13'), 'message', array('type' => 'error'));
            }
        }
    }

    public function admin_index() {
        $this->set('title_for_layout', 'مدیریت مجموعه مطالب');
        $contentCategories = $this->paginate('ContentCategory');
        
        for ($i = 0; $i < count($contentCategories); $i++) {
            $contentCategories[$i]['ContentCategory']['contentCount'] = $this->_haveContent($contentCategories[$i]['ContentCategory']['id']);
        }
        
        // add this helper for using FilterHelper in Filter Form
        $this->helpers[] = 'AdminForm';
        $this->set(compact('contentCategories'));
    }

    public function admin_delete($id = NULL) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException(SettingsController::read('Error.Code-12'));
        }
        
        $id = $this->request->data['id']; // we recieve id via posted data
        $count = count($id);
        if ($count == 1) {
            $id = current($id);
            $this->ContentCategory->id = $id;

            if ($this->_haveContent($id) || $this->ContentCategory->childCount($id) ) {
                $this->Session->setFlash(SettingsController::read('Error.Code-15'), 'message', array('type' => 'error'));
            } elseif ($this->ContentCategory->delete()) {
                $this->Session->setFlash('مجموعه با موفقیت حذف شد.', 'message', array('type' => 'success'));
            } else {
                $this->Session->setFlash(SettingsController::read('Error.Code-16'), 'message', array('type' => 'error'));
            }
        } elseif ($count > 1) {
            $countAffected = 0;
            foreach ($id as $i) {
                $this->ContentCategory->id = $i;
                if ($this->_haveContent($i)) {
                    continue;
                }
                if ($this->ContentCategory->childCount($i)) {
                    continue;
                }
                
                if ($this->ContentCategory->delete()) {
                    $countAffected++;
                }
            }
            $this->Session->setFlash($countAffected . ' مجموعه با موفقیت حذف شد.', 'message', array('type' => 'success'));
        }
        $this->redirect($this->referer());
    }

    public function admin_edit($id = NULL) {
        $this->set('title_for_layout', 'ویرایش مجموعه مطلب');
        $this->ContentCategory->id = $id;
        if (!$this->ContentCategory->exists()) {
            throw new NotFoundException(SettingsController::read('Error.Code-14'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->ContentCategory->save($this->request->data)) {
                // Save Level for this item
                $path = $this->ContentCategory->getPath();
                // levels starts with 0
                $this->ContentCategory->saveField('level', count($path) - 1);
                // Update level of childrens
                $this->ContentCategory->updateChildrenLevel();
                
                $this->Session->setFlash('مجموعه با موفقیت ویرایش شد', 'message', array('type' => 'success'));
                $this->redirect(array('action' => 'index', 'admin' => TRUE));
            } else {
                $this->Session->setFlash(SettingsController::read('Error.Code-13'), 'message', array('type' => 'error'));
            }
        } else {
            $this->set('parents', $this->ContentCategory->generateTreeList());
            $this->request->data = $this->ContentCategory->read();
        }
    }

    private function _haveContent($id) {
        return $this->ContentCategory->Content->find('count', array('conditions' => array('content_category_id' => $id)));
    }
    
    public function admin_publish() {
        $this->_changeStatus('ContentCategory', 'published', 1, 'مجموعه مطلب با موفقیت منتشر شد.');
        $this->redirect($this->referer());
    }

    public function admin_unPublish() {
        $this->_changeStatus('ContentCategory', 'published', 0, 'مجموعه مطلب با موفقیت از حالت انتشار خارج شد.');
        $this->redirect($this->referer());
    }
    
    public function admin_getLinkItem(){
        $conditions = array('ContentCategory.published' => true);
        if(!empty($this->request->query['q'])){
            $conditions['ContentCategory.name LIKE'] = "%{$this->request->query['q']}%";
        }
        $this->paginate['conditions'] = $conditions;
        $this->paginate['limit'] = 10;
        $this->paginate['recursive'] = -1;
        $this->set('categories',$this->paginate());
    }
    
    /**
     * Return all categories in array
     * 
     * @return
     */
    public function getList(){
        $categories = $this->ContentCategory->find('all',array('conditions' => array('published' => true),'contain' => false));
        return $categories;
    }

}
